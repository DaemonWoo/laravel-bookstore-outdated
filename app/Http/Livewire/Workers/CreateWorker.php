<?php

namespace App\Http\Livewire\Workers;

use App\Jobs\SendWorkerCreatedEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateWorker extends Component
{
    public $name = '';

    public $email = '';

    public $password = '';

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function create()
    {
        $this->validate();

        $newWorker = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => 1,
        ]);
        SendWorkerCreatedEmail::dispatch($newWorker);

        return redirect()->intended(route('workers'))->with('status', 'Worker added successfully!');
    }

    public function render()
    {
        return view('livewire.worker.create-worker');
    }
}
