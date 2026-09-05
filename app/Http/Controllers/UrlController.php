<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * GET /
     * Show the homepage with the "shorten a URL" form.
     */
    public function home()
    {
        return view('home');
    }

    /**
     * POST /shorten
     * Validate the submitted URL, create a short code, save it.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'original_url' => ['required', 'url', 'max:2048'],
        ], [
            'original_url.required' => 'Please enter a URL.',
            'original_url.url' => 'Please enter a valid URL (e.g. https://example.com).',
            'original_url.max' => 'That URL is too long.',
        ]);

        $url = Url::create([
            // auth()->id() returns the logged-in user's id,
            // or null if nobody is logged in (guest shortening).
            'user_id' => auth()->id(),
            'original_url' => $validated['original_url'],
            'short_code' => Url::generateUniqueShortCode(),
        ]);

        // "back()" returns the user to the homepage they came from,
        // carrying flash data with it (only available for the next request).
        return back()->with('short_url', $url->short_url);
    }

    /**
     * GET /{shortCode}
     * Look up the short code, count the click, send the visitor onward.
     */
    public function redirect(string $shortCode)
    {
        // firstOrFail() automatically throws a 404 (ModelNotFoundException)
        // if no matching row exists, which Laravel turns into a
        // proper 404 error page — no manual "if not found" needed.
        $url = Url::where('short_code', $shortCode)->firstOrFail();

        // Atomic increment: this runs a single SQL statement like
        // "UPDATE urls SET clicks = clicks + 1 WHERE id = ?"
        // instead of reading the value, adding 1 in PHP, then saving.
        // That avoids race conditions if two people click at once.
        $url->increment('clicks');

        return redirect()->away($url->original_url);
    }

    /**
     * GET /dashboard
     * Show only the logged-in user's own URLs and simple stats.
     */
    public function index()
    {
        $urls = auth()->user()->urls()->latest()->get();

        $totalUrls = $urls->count();
        $totalClicks = $urls->sum('clicks');

        return view('dashboard', compact('urls', 'totalUrls', 'totalClicks'));
    }

    /**
     * DELETE /urls/{url}
     * Delete a URL — but only if it belongs to the logged-in user.
     */
    public function destroy(Url $url)
    {
        // Authorization check: never trust the ID in the request.
        // Even if someone edits the form and submits another user's
        // URL id, this check blocks it with a 403 Forbidden.
        abort_if($url->user_id !== auth()->id(), 403);

        $url->delete();

        return back()->with('status', 'Short URL deleted.');
    }
}
