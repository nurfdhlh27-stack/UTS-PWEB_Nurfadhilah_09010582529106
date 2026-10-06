<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_before_viewing_books(): void
    {
        $this->get(route('books.index'))->assertRedirect(route('login'));
    }

    public function test_database_seeder_creates_at_least_three_categories_and_five_books(): void
    {
        $this->seed();

        $this->assertGreaterThanOrEqual(3, Category::count());
        $this->assertGreaterThanOrEqual(5, Book::count());
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    public function test_user_can_create_view_update_and_delete_a_book(): void
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'Fiksi']);
        $bookData = [
            'category_id' => $category->id,
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer',
            'publisher' => 'Hasta Mitra',
            'year' => 1980,
            'stock' => 3,
        ];

        $this->actingAs($user)
            ->post(route('books.store'), $bookData)
            ->assertRedirect();

        $book = Book::firstOrFail();
        $this->assertSame('Fiksi', $book->category->name);
        $this->assertTrue($category->books->contains($book));

        $this->get(route('books.show', $book))
            ->assertOk()
            ->assertSee('Bumi Manusia')
            ->assertSee('Pramoedya Ananta Toer');

        $this->put(route('books.update', $book), [...$bookData, 'title' => 'Bumi Manusia Edisi Baru'])
            ->assertRedirect(route('books.show', $book));
        $this->assertDatabaseHas('books', ['id' => $book->id, 'title' => 'Bumi Manusia Edisi Baru']);

        $this->delete(route('books.destroy', $book))->assertRedirect(route('books.index'));
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_user_can_log_in_and_invalid_book_data_is_rejected(): void
    {
        $user = User::factory()->create(['password' => 'password']);
        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('books.index'));

        $category = Category::create(['name' => 'Pendidikan']);
        $this->actingAs($user)
            ->post(route('books.store'), [
                'category_id' => $category->id,
                'title' => '',
                'author' => 'Penulis',
                'publisher' => 'Penerbit',
                'year' => now()->year,
                'stock' => -1,
            ])
            ->assertSessionHasErrors(['title', 'stock']);
    }
}
