@csrf
<p class="form-intro">Lengkapi informasi buku dengan teliti. Kolom bertanda wajib diisi.</p>
<div class="form-grid">
    <div class="form-row">
        <label for="title">Judul buku <span style="color:#c16f50">*</span></label>
        <input id="title" name="title" value="{{ old('title', $book->title ?? '') }}" placeholder="Contoh: Laskar Pelangi" required maxlength="255">
        @error('title') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-row">
        <label for="category_id">Kategori <span style="color:#c16f50">*</span></label>
        <select id="category_id" name="category_id" required>
            <option value="">Pilih kategori buku</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) old('category_id', $book->category_id ?? '') === (string) $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-row">
        <label for="author">Penulis <span style="color:#c16f50">*</span></label>
        <input id="author" name="author" value="{{ old('author', $book->author ?? '') }}" placeholder="Nama penulis" required maxlength="255">
        @error('author') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-row">
        <label for="publisher">Penerbit <span style="color:#c16f50">*</span></label>
        <input id="publisher" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}" placeholder="Nama penerbit" required maxlength="255">
        @error('publisher') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-row">
        <label for="year">Tahun terbit <span style="color:#c16f50">*</span></label>
        <input id="year" type="number" name="year" min="1000" max="{{ now()->year }}" value="{{ old('year', $book->year ?? '') }}" placeholder="Contoh: 2024" required>
        @error('year') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-row">
        <label for="stock">Jumlah stok <span style="color:#c16f50">*</span></label>
        <input id="stock" type="number" name="stock" min="0" value="{{ old('stock', $book->stock ?? 0) }}" placeholder="Jumlah buku tersedia" required>
        @error('stock') <div class="error">{{ $message }}</div> @enderror
    </div>
</div>
<div class="actions" style="margin-top:8px;padding-top:18px;border-top:1px solid #eeede7">
    <button class="button" type="submit">{{ $submitLabel }}</button>
    <a class="button secondary" href="{{ route('books.index') }}">Batal</a>
</div>
