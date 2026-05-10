<?php

namespace App\Http\Livewire\Workers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditWorker extends Component
{
    public $name = '';

    public $email = '';

    public $password = '';

    public $workerId;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount($id)
    {
        $this->workerId = $id;
    }

    public function edit()
    {
        $this->validate();
        User::where('id', $this->workerId)->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->intended(route('workers'))->with('status', 'Worker updated successfully!');
    }

    public function render()
    {
        $worker = User::findOrFail($this->workerId);

        return view('livewire.worker.edit-worker', [
            'worker' => $worker,
        ]);
    }
}
