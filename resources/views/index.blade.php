@extends('layouts.app')

@section('title', '')

@section('css')
    <link rel="stylesheet" href="css/home.css">
@endsection

@section('js')
    <script src="js/search.js"></script>
@endsection

@section('content')
    <x-navbar></x-navbar>

    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-md-8">
                <x-tambah_pertanyaan/>

                <div class="card">
                    <div class="card-header head-home">
                        Diskusi
                    </div>
                    <div class="card-body questions-list">
                        @if($topics->isEmpty())
                            @if(request()->query('search') && request()->query('categorie'))
                                <p>Tidak ada hasil untuk pencarian "{{ request()->query('search') }}" dalam kategori yang dipilih.</p>
                            @elseif(request()->query('search'))
                                <p>Tidak ada hasil untuk pencarian "{{ request()->query('search') }}".</p>
                            @elseif(request()->query('categorie'))
                                <p>Tidak ada topik dalam kategori yang dipilih.</p>
                            @else
                                <p>Belum ada topik diskusi.</p>
                            @endif
                        @else
                            @foreach($topics as $topic)
                                @if((request()->query('categorie') != null && request()->query('categorie') != $topic->categorie_id) || (request()->query('search') != null && !str_contains(strtolower($topic->title), strtolower(request()->query('search'))) && !str_contains(strtolower($topic->body), strtolower(request()->query('search')))))
                                    @continue
                                @endif
                                <div class="mb-4">
                                    <h5 class="card-title">{{ $topic->title }}</h5>
                                    <p class="card-text">{{ substr($topic->body, 0, 50) }}...</p>
                                    <a href="{{ route('question', $topic->id) }}" class="detail-btn">Lihat</a>
                                </div>
                            @endforeach
                        @endif                    
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header head-home">
                        Pencarian
                    </div>
                    <div class="card-body">
                        <form id="search_form" action="" method="get">
                            <div class="mb-3">
                                <label for="search" class="form-label">Cari Pertanyaan</label>
                                <input type="text" class="form-control" id="search" name="search" placeholder="Cari di forum" value="{{ request()->query('search') }}">
                            </div>
                            <button type="submit" class="btn btn-success">Cari</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header head-home">
                        Kategori
                    </div>
                    <div class="list-group list-group-flush">
                        @forelse ($categories as $categorie)
                            <a href="{{ request()->query('search') != null ? '?search='.request()->query('search').'&categorie='.$categorie->id : '?categorie='.$categorie->id }}" class="list-group-item list-group-item-action">{{ $categorie->name }}</a>
                        @empty
                            <p class="list-group-item">Tidak ada kategori tersedia</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
@endsection