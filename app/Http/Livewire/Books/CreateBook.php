<?php

namespace App\Http\Livewire\Books;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBook extends Component
{
    use WithFileUploads;

    public $title = '';

    public $slug = '';

    public $description = '';

    public $author = '';

    public $cover;

    public $rating = 1;

    public $category = 1;

    protected $rules = [
        'title' => ['required'],
        'slug' => ['required'],
        'description' => ['required'],
        'author' => ['required'],
        'cover' => ['required'],
        'rating' => ['required'],
        'category' => ['required'],
    ];

    public function createBook()
    {
        $this->validate();
        $coverPath = $this->cover->store('public/covers');
        Book::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'author' => $this->author,
            'cover' => $coverPath,
            'rating' => $this->rating,
            'category_id' => $this->category,
        ]);

        return redirect('/')->with('message', 'Book created!');
    }

    public function render()
    {
        return view('livewire.book.create-book');
    }
}
