@csrf
<div class="form-row">
    <label for="title">Judul buku</label>
    <input id="title" name="title" value="{{ old('title', $book->title ?? '') }}" required maxlength="255">
    @error('title') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-row">
    <label for="category_id">Kategori</label>
    <select id="category_id" name="category_id" required>
        <option value="">Pilih kategori</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected((string) old('category_id', $book->category_id ?? '') === (string) $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-row">
    <label for="author">Penulis</label>
    <input id="author" name="author" value="{{ old('author', $book->author ?? '') }}" required maxlength="255">
    @error('author') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-row">
    <label for="publisher">Penerbit</label>
    <input id="publisher" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}" required maxlength="255">
    @error('publisher') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-row">
    <label for="year">Tahun terbit</label>
    <input id="year" type="number" name="year" min="1000" max="{{ now()->year }}" value="{{ old('year', $book->year ?? '') }}" required>
    @error('year') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-row">
    <label for="stock">Stok</label>
    <input id="stock" type="number" name="stock" min="0" value="{{ old('stock', $book->stock ?? 0) }}" required>
    @error('stock') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="actions" style="margin-top:20px">
    <button class="button" type="submit">{{ $submitLabel }}</button>
    <a class="button secondary" href="{{ route('books.index') }}">Batal</a>
</div>
