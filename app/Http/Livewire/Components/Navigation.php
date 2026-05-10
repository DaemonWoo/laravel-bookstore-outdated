<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigation extends Component
{
    public $cats;

    public function categoryRedirect()
    {
        return redirect()->route('categories', ['cats' => $this->cats]);
    }

    public function render()
    {
        $user = Auth::user();

        return view('livewire.components.navigation', [
            'user' => $user,
        ]);
    }
}
