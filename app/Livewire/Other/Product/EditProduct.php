<?php

namespace App\Livewire\Other\Product;

use App\Models\Product;
use Illuminate\Queue\Listener;
use Livewire\Component;

class EditProduct extends Component
{
    public $title, $condition, $price, $year_of_manufacture, $code, $description;
    public $products;
    protected $listeners = ['edit_product'];
    protected $rules = [
        'title' => 'required',
        'condition' => 'required',
        'price' => 'required',
        'year_of_manufacture' => 'required',
        'code' => 'required',
    ];
    public function render()
    {
        return view('livewire.other.product.edit-product');
    }

    public function edit_product($productId)
    {
        $products = Product::find($productId);
        $this->products = $products;
        $this->title = $products->title;
        $this->condition = $products->condition;
        $this->price = $products->price;
        $this->year_of_manufacture = $products->year_of_manufacture;
        $this->code = $products->code;
        $this->description = $products->description;
    }
    public function updateProduct()
    {
        $this->validate();
        $errors = $this->getErrorBag();
        $products = Product::find($this->products->id);
        if ($this->code != $products->code && Product::where('code', $this->code)->where('id', '!=', $products->id)->exists()) {
            $errors->add('code', 'The Code already exists');
            return $errors;
        } else {
            $products->title = $this->title;
            $products->condition = $this->condition;
            $products->price = $this->price;
            $products->year_of_manufacture = $this->year_of_manufacture;
            $products->code = $this->code;
            $products->description = $this->description;
            $products->save();
            create_transaction_log(__('update product') . ' : ' . $this->title, 'updated', __('This user update product') . ' ' . $this->title . ' ' . __('successfully') . ' ', $this->title);
            $this->dispatch('alert.message', [
                'type' => 'success',
                'message' => __('Updated successfully')
            ]);
            $this->dispatch('modal.closeModal');
        }
    }
}
