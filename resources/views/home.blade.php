@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="hero">
        <h1>Shorten your URL</h1>
        <p>Turn long, messy links into short ones you can share anywhere.</p>
    </section>

    <section class="card shorten-card">
        <form method="POST" action="{{ route('urls.store') }}" class="shorten-form">
            @csrf
            <input
                type="url"
                name="original_url"
                placeholder="https://example.com/very/long/url..."
                value="{{ old('original_url') }}"
                required
            >
            <button type="submit" class="btn">Shorten URL</button>
        </form>

        @error('original_url')
            <div class="alert alert-error">{{ $message }}</div>
        @enderror

        @if (session('short_url'))
            <div class="result-box">
                <p class="result-label">Your shortened URL:</p>
                <div class="result-row">
                    <input type="text" id="shortUrlInput" value="{{ session('short_url') }}" readonly>
                    <button type="button" class="btn btn-outline" onclick="copyShortUrl(this)">Copy URL</button>
                </div>
                <a href="{{ session('short_url') }}" target="_blank" class="visit-link">Visit link →</a>
            </div>
        @endif
    </section>

    <section class="features">
        <div class="feature">
            <h3>⚡ Fast</h3>
            <p>Generate a short link in a fraction of a second.</p>
        </div>
        <div class="feature">
            <h3>📊 Tracked</h3>
            <p>See how many times each link has been clicked.</p>
        </div>
        <div class="feature">
            <h3>🔒 Secure</h3>
            <p>Short codes are generated with cryptographically secure randomness.</p>
        </div>
    </section>

@endsection
