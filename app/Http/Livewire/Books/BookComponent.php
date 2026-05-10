<?php

namespace App\Http\Livewire\Books;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookComponent extends Component
{
    public $commentText = '';

    public $bookId;

    protected $rules = [
        'commentText' => 'required',
    ];

    public function mount($id)
    {
        $this->bookId = $id;
    }

    public function addComment($book_id)
    {
        Comment::create([
            'text' => $this->commentText,
            'user_id' => Auth::user()->id,
            'book_id' => $book_id,
        ]);
    }

    public function deleteComment($id)
    {
        Comment::destroy($id);
    }

    public function render()
    {
        $book = Book::findOrFail($this->bookId);
        $comments = Comment::where('book_id', $this->bookId)->get();

        return view('livewire.book.book-component', [
            'book' => $book,
            'comments' => $comments,
        ]);
    }
}
