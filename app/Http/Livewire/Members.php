<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class Members extends Component
{
    use WithPagination;

    public $showModal = false;
    public $memberId;
    public $member;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'user.firstname' => 'required',
        'user.lastname' => 'required',
        'user.email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.members', [
            'members' => Member::latest()->paginate(5)
        ]);
    }

    public function edit($userId)
    {
        $this->showModal = true;
        $this->userId = $userId;
        $this->user = Member::find($userId);
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

        if (!is_null($this->userId)) {
            $this->product->save();
        } else {
            Member::create($this->user);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($userId)
    {
        $user = Member::find($userId);
        if ($user) {
            $user->delete();
        }
    }
}
