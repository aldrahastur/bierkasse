<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $team = auth()->user()->currentTeam;

        return view('livewire.members', [
            'members' => Team::find(Auth::user()->current_team_id)->users()->paginate(5),
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

    public function addAmount()
    {
        $this->showAmountModal = true;
    }

    public function saveAmount()
    {
        $this->showAmountModal = false;
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
