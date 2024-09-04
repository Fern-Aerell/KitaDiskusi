@extends('layouts.app')

@section('title', '')

@section('css')
    <link rel="stylesheet" href="/css/home.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/detail.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
@endsection

@section('content')
    <x-navbar></x-navbar>

    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header head-detail d-flex justify-content-between align-items-center ">
                        <strong><span>Dari {{ $topic->user->name }}</span></strong>
                        <span class="text-muted">{{ $topic->created_at->format('d F Y - H:i') }}</span>
                        @if($topic->user->id === auth()->id())
                            <div>
                                <button onclick="fiturBelumTersedia()" type="submit">Edit</button>
                                <button onclick="fiturBelumTersedia()" type="submit">Hapus</button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $topic->title }}</h5>
                        <p class="card-text">{{ $topic->body }}</p>
                        <hr>
                        <h6>Tanggapan</h6>
                        <div class="answers-container">
                            @if($topic->comments->isEmpty())
                                <p>Belum ada tanggapan untuk topik ini.</p>
                            @else
                                @foreach($topic->comments->sortByDesc(function($comment) {
                                    return $comment->votes->where('vote', 'up')->count() - $comment->votes->where('vote', 'down')->count();
                                }) as $comment)
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="vote-buttons" id="vote1">
                                                <form action="{{ route('comment.vote') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                    <input type="hidden" name="vote" value="up">
                                                    <button type="submit" class="upvote {{ $comment->votes->where('user_id', auth()->id())->where('vote', 'up')->count() > 0 ? 'text-success' : '' }}">
                                                        <i class="fa-solid fa-arrow-up"></i>
                                                    </button>
                                                </form>
                                                <span class="vote-count">{{ $comment->votes->where('vote', 'up')->count() - $comment->votes->where('vote', 'down')->count() }}</span>
                                                <form action="{{ route('comment.vote') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                    <input type="hidden" name="vote" value="down">
                                                    <button type="submit" class="downvote {{ $comment->votes->where('user_id', auth()->id())->where('vote', 'down')->count() > 0 ? 'text-danger' : '' }}">
                                                        <i class="fa-solid fa-arrow-down"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="ms-3">
                                                <p class="mb-1"><strong>{{ $comment->user->name }}:</strong></p>
                                                <p class="text-muted">{{ $comment->created_at->format('d F Y - H:i') }}</p>
                                                <p class="card-text">{{ $comment->body }}</p>
                                                @if($comment->user->id === auth()->id())
                                                    <div>
                                                        <button onclick="fiturBelumTersedia()" type="submit">Edit</button>
                                                        <button onclick="fiturBelumTersedia()" type="submit">Hapus</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header head-detail">
                        <strong>Buat Tanggapan</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <input type="text" name="topic_id" id="topic_id" value="{{ $topic->id }}" hidden>
                            @error('topic_id')
                                <p>{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <textarea name="body" class="form-control" id="answerDetails" rows="4" placeholder="Berikan tanggapan anda tentang diskusi di atas..."></textarea>
                                @error('body')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Buat</button>
                        </form>
                    </div>
                </div>
                
                <a href="{{ route('index') }}" class="btn btn-success mt-3">Kembali</a>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header head-detail">
                        <strong>Diskusi Lainnya</strong>
                    </div>
                    <div class="list-group list-group-flush">
                        @forelse($topics as $topic)
                            <a href="{{ route('question', $topic->id) }}" class="list-group-item list-group-item-action">{{ Str::limit($topic->title, 50) }}...</a>
                        @empty
                            <div class="list-group-item">Tidak ada diskusi lainnya saat ini.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
@endsection