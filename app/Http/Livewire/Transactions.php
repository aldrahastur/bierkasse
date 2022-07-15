<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
    use WithPagination;

    public $showModal = false;

    public $productId;

    public $product;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'product.type' => 'required',
        'product.value' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.transactions', [
            'products' => Transaction::latest()->paginate(5),
        ]);
    }

    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product = Transaction::find($productId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->product = null;
        $this->productId = null;
    }

    public function save()
    {
        if (! is_null($this->productId)) {
            $this->product->save();
        } else {
            Transaction::create($this->product);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {
        $product = Transaction::find($productId);
        if ($product) {
            $product->delete();
        }
    }
}
