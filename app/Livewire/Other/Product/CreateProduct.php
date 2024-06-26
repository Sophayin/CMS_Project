<?php

namespace App\Livewire\Other\Product;

use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $title, $code, $price, $condition, $year_of_manufacture, $description;
    public $existingCode;

    public function render()
    {
        return view('livewire.other.product.create-product');
    }

    protected $rules = [
        'title' => 'required',
        'condition' => 'required',
        'price' => 'required',
        'year_of_manufacture' => 'required',
        'code' => 'required',
    ];
    public function createNewProduct()
    {
        $this->validate();
        $errors = $this->getErrorBag();
        if (Product::where('code', $this->code)->exists()) {
            $errors->add('code', 'The Code already exists');
            return $errors;
        }
        $product = new Product();
        $product->title = $this->title;
        $product->condition = $this->condition;
        $product->price = $this->price;
        $product->code = $this->code;
        $product->year_of_manufacture = $this->year_of_manufacture;
        $product->save();
        create_transaction_log(__('create product') . ' : ' . $this->title, 'Created', __('This user create product') . ' ' . $this->title . ' ' . __('successfully') . ' ', $this->title);
        $this->dispatch('alert.message', [
            'type' => 'success',
            'message' => __('Created successfully')
        ]);
        $this->dispatch('modal.closeModal');
        $this->dispatch('refresh_product');
        $this->reset();
    }
}
