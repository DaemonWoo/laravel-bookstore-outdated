<?php

namespace App\Http\Livewire\Workers;

use App\Models\Role;
use App\Models\User;
use App\Notifications\WorkerCreatedNotification;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateWorker extends Component
{
    public $name = '';

    public $email = '';

    public $password = '';

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
    ];

    public function create()
    {
        $this->validate();
        $workerRole = Role::where('name', 'worker')->first();
        $newWorker = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $workerRole->id,
        ]);

        $newWorker->notify(new WorkerCreatedNotification($newWorker));

        return redirect()->intended(route('workers'))->with('status', 'Worker added successfully!');
    }

    public function render()
    {
        return view('livewire.worker.create-worker');
    }
}
