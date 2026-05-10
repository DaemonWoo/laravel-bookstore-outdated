<?php

namespace App\Http\Livewire\Workers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WorkersList extends Component
{
    public function deleteWorker($id)
    {
        if (Auth::user()->id !== $id) {
            User::destroy($id);
        }

    }

    public function render()
    {
        $users = User::all();
        $workers = [];
        foreach ($users as $user) {
            if ($user->isWorker()) {
                $workers[] = $user;
            }
        }

        return view('livewire.worker.workers-list', [
            'workers' => $workers,
        ]);
    }
}
