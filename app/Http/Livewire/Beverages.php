<?php

namespace App\Http\Livewire;

use App\Models\Beverage;
use Livewire\Component;
use Livewire\WithPagination;

class Beverages extends Component
{
    use WithPagination;

    public $showModal = false;

    public $productId;

    public $product;

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'product.name' => 'required',
        'product.selling_price' => 'required|numeric',
        'product.purchase_price' => 'numeric',
    ];

    public function render()
    {
        return view('livewire.beverages', [
            'products' => Beverage::latest()->paginate(5),
        ]);
    }

    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product = Beverage::find($productId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->product = null;
        $this->productId = null;
    }

    public function save()
    {
        $this->validate();

        if (! is_null($this->productId)) {
            $this->product->save();
        } else {
            Beverage::create($this->product);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {
        $product = Beverage::find($productId);
        if ($product) {
            $product->delete();
        }
    }
}
