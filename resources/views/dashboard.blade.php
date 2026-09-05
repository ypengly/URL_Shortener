@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1>Your Dashboard</h1>

    <section class="stats">
        <div class="stat-card">
            <span class="stat-number">{{ $totalUrls }}</span>
            <span class="stat-label">Total URLs</span>
        </div>
        <div class="stat-card">
            <span class="stat-number">{{ $totalClicks }}</span>
            <span class="stat-label">Total Clicks</span>
        </div>
    </section>

    <section class="card">
        @if ($urls->isEmpty())
            <div class="empty-state">
                <p>You haven't shortened any URLs yet.</p>
                <a href="{{ route('home') }}" class="btn">Shorten your first URL</a>
            </div>
        @else
            <div class="table-wrapper">
                <table class="url-table">
                    <thead>
                        <tr>
                            <th>Original URL</th>
                            <th>Short URL</th>
                            <th>Clicks</th>
                            <th>Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($urls as $url)
                            <tr>
                                <td class="truncate" title="{{ $url->original_url }}">
                                    {{ $url->original_url }}
                                </td>
                                <td>
                                    <a href="{{ $url->short_url }}" target="_blank">{{ $url->short_code }}</a>
                                </td>
                                <td>{{ $url->clicks }}</td>
                                <td>{{ $url->created_at->diffForHumans() }}</td>
                                <td class="actions">
                                    <button
                                        type="button"
                                        class="btn btn-small btn-outline"
                                        onclick="copyText(this, '{{ $url->short_url }}')"
                                    >Copy</button>

                                    <a href="{{ $url->short_url }}" target="_blank" class="btn btn-small btn-outline">Visit</a>

                                    <form method="POST" action="{{ route('urls.destroy', $url) }}" class="inline-form"
                                          onsubmit="return confirm('Delete this short URL?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-small btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

@endsection
