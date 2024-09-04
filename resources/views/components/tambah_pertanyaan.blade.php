<div class="card mb-4">
    <div class="card-header head-home">
        <strong>Buat diskusi</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('topic.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="categorie" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Masukkan kategori">
                @error('categorie')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul pertanyaan">
                    @error('title')
                        <p>{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Isi</label>
                <textarea class="form-control" id="body" name="body" rows="4" placeholder="Jelaskan apa yang ingin anda diskusikan..."></textarea>
                @error('body')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Buat</button>
        </form>
    </div>
</div>