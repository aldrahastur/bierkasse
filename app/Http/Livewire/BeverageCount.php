<?php

namespace App\Http\Livewire;

use App\Models\Beverage;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class BeverageCount extends Component
{
    public $invoiceProducts = [];
    public $allProducts = [];
    public $taxes = 20;
    public $user_id;
    public $invoiceSaved = false;
    public $invoiceableUser ;

    public function mount()
    {
        $this->invoiceableUser = User::whereNull('last_counted_at')
            ->orWhere('last_counted_at', '<', date('Y-m-d 00:00:00'))
            ->where('status', '=', 1)
            ->first();
        if($this->invoiceableUser === null) {
            return redirect()->route('dashboard');
        }
        $this->allProducts = Beverage::all();
    }

    public function render()
    {
        $total = 0;

        foreach ($this->invoiceProducts as $invoiceProduct) {
            if ($invoiceProduct['is_saved'] && $invoiceProduct['product_price'] && $invoiceProduct['quantity']) {
                $total += $invoiceProduct['product_price'] * $invoiceProduct['quantity'];
            }
        }

        return view('livewire.beverage-count', [
            'subtotal' => $total,
            'total' => $total * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100)
        ]);
    }

    public function addProduct()
    {
        foreach ($this->invoiceProducts as $key => $invoiceProduct) {
            if (!$invoiceProduct['is_saved']) {
                $this->addError('invoiceProducts.' . $key, 'This line must be saved before creating a new one.');
                return;
            }
        }

        $this->invoiceProducts[] = [
            'product_id' => '',
            'quantity' => 1,
            'is_saved' => false,
            'product_name' => '',
            'product_price' => 0
        ];

        $this->invoiceSaved = false;
    }

    public function editProduct($index)
    {
        foreach ($this->invoiceProducts as $key => $invoiceProduct) {
            if (!$invoiceProduct['is_saved']) {
                $this->addError('invoiceProducts.' . $key, 'This line must be saved before editing another.');
                return;
            }
        }

        $this->invoiceProducts[$index]['is_saved'] = false;
    }

    public function saveProduct($index)
    {
        $this->resetErrorBag();
        $product = $this->allProducts->find($this->invoiceProducts[$index]['product_id']);
        $this->invoiceProducts[$index]['product_name'] = $product->name;
        $this->invoiceProducts[$index]['product_price'] = $product->price;
        $this->invoiceProducts[$index]['is_saved'] = true;
    }

    public function removeProduct($index)
    {
        unset($this->invoiceProducts[$index]);
        $this->invoiceProducts = array_values($this->invoiceProducts);
    }

    public function saveInvoice()
    {
        $total = 0;
        $lineItems = [];

        foreach ($this->invoiceProducts as $product) {
            $total += $product['product_price'] * $product['quantity'];
            $lineItems[] = $product;
        }

        $invoice = Transaction::create([
            'user_id' => $this->invoiceableUser->id,
            'value' => $total,
            'type' => 1,
            'lineItems' => json_encode($lineItems)
        ]);

        $user = User::find($this->invoiceableUser->id);
        $user->last_counted_at = date('Y-m-d H:i:s');
        $user->save();

        $this->reset('invoiceProducts', 'user_id');
        $this->invoiceSaved = true;
    }

}
