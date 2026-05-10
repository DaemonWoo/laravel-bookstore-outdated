<?php

namespace App\Http\Livewire\BookCategories;

use App\Models\Category;
use Livewire\Component;

class EditBookCategory extends Component
{
    /** @var string */
    public $title = '';

    /** @var string */
    public $slug = '';

    protected $rules = [
        'title' => ['required'],
        'slug' => ['required'],
    ];

    public $categoryId;

    public function mount($id)
    {
        $this->categoryId = $id;
    }

    protected $queryString = ['id'];

    public function updateCategory()
    {
        $this->validate();
        Category::where('id', $this->categoryId)->update([
            'title' => $this->title,
            'slug' => $this->slug,
        ]);

        return redirect('/');
    }

    public function render()
    {
        $cat = Category::findOrFail($this->categoryId);

        return view('livewire.bookCategory.edit-book-category', [
            'cat' => $cat,
        ])->extends('layouts.auth');
    }
}
