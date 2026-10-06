<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
        ]);
        $search = $request->string('search')->trim()->toString();
        $categoryId = $filters['category_id'] ?? null;

        $books = Book::with('category')
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%");
                });
            })
            ->when($categoryId, fn ($query) => $query->where('category_id', $categoryId))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('books.index', [
            'books' => $books,
            'search' => $search,
            'categories' => Category::orderBy('name')->get(),
            'categoryId' => $categoryId,
            'totalBooks' => Book::count(),
            'totalCategories' => Category::count(),
            'totalStock' => Book::sum('stock'),
        ]);
    }

    public function create(): View
    {
        return view('books.create', ['categories' => Category::orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $book = Book::create($this->validatedBook($request));

        return redirect()->route('books.show', $book)->with('status', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book): View
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $book->update($this->validatedBook($request));

        return redirect()->route('books.show', $book)->with('status', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')->with('status', 'Buku berhasil dihapus.');
    }

    /**
     * @return array{category_id: int, title: string, author: string, publisher: string, year: int, stock: int}
     */
    private function validatedBook(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1000', 'max:'.now()->year],
            'stock' => ['required', 'integer', 'min:0'],
        ]);
    }
}
