
@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if($post)
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->body }}</p>
                    <p class="text-muted">Pengirim: {{ $post->name ? $post->name : 'Tidak Ada Pengirim' }}</p>
                    <p class="text-muted">Dibuat pada: {{ $post->created_at }}</p>
                @else
                    <p>Post tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
