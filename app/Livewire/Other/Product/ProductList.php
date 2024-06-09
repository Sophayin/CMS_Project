<?php

namespace App\Livewire\Other\Product;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $search;
    public $start_date, $end_date, $formatted_end_date, $formatted_start_date;
    public $productId, $title;

    public function render()
    {
        $product_list = Product::query();
        if ($this->search) {
            $product_list = $product_list->where('title', 'ilike', '%' . $this->search . '%')
                ->orWhere('code', 'ilike', '%' . $this->search . '%')
                ->orWhere('year_of_manufacture', 'ilike', '%' . $this->search . '%')
                ->orWhere('condition', 'ilike', '%' . $this->search . '%');
        }
        $product_list = $product_list->get();
        return view('livewire.other.product.product-list', ['product_list' => $product_list])->title('Product-list');
    }
    //--open add new product pop up---
    public function addProduct()
    {
        if (in_array('Create Product', session('user_permission')['Product'])) {
            $this->dispatch('modal.openModal');
        } else {
            $this->dispatch("alert.message", [
                'type' => 'warning',
                'message' => __("Access Denied! You don't have permission to access this function. Request access from your administrator")
            ]);
        }
    }
    //--open edit product pop up---
    public function editProduct($id)
    {
        if (in_array('Edit Product', session('user_permission')['Product'])) {
            $this->dispatch('edit_product', productId: $id);
            $this->dispatch('modal.openEditProductModal');
        } else {
            $this->dispatch("alert.message", [
                'type' => 'warning',
                'message' => __("Access Denied! You don't have permission to access this function. Request access from your administrator")
            ]);
        }
    }
    public function deleteProduct($productId)
    {
        $this->productId = $productId;
        $this->dispatch('modal.confirmDelete');
    }
    public function confirmDelete()
    {
        if ($this->productId) {
            $product = Product::findOrFail($this->productId);
            $product->delete();
            create_transaction_log(__('Delete product') . ' : ' . $product->title, 'Delete', __('This user delete product') . ' ' . $product->title . ' ' . __('successfully') . ' ', $product->title);
            $this->dispatch('modal.closeDelete');
            $this->dispatch('alert.message', [
                'type' => 'success',
                'message' => __("Deleted Successfully")
            ]);
        }
    }
}
