<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $showModal = false;

    public $userId;

    public $user;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'user.firstname' => 'required',
        'user.lastname' => 'required',
        'user.email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.users', [
            'users' => User::latest()->paginate(5),
        ]);
    }

    public function edit($userId)
    {
        $this->showModal = true;
        $this->userId = $userId;
        $this->user = User::find($userId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->user = null;
        $this->userId = null;
    }

    public function save()
    {
        $this->validate();

        if (! is_null($this->userId)) {
            $this->product->save();
        } else {
            User::create($this->user);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
        }
    }
}
