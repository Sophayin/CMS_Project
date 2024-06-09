<?php

namespace App\Livewire\Other\Shop;

use App\Models\Shop;
use Illuminate\Cache\RateLimiting\Limit;
use Livewire\Component;
use Livewire\WithPagination;

class ShopList extends Component
{
    use WithPagination;
    public $limit = 10;
    public $search;
    public $shopId;
    protected $listeners = ['refresh_shop' => 'render', 'confirmDelete'];

    public function render()
    {
        $shop_list = Shop::query();
        if ($this->search) {
            $shop_list = $shop_list->where('shop_name', 'ilike', '%' . $this->search . '%')
                ->orWhere('abbreviation', 'ilike', '%' . $this->search . '%')
                ->orWhere('shop_name_translate', 'ilike', '%' . $this->search . '%')
                ->orWhere('phone', 'ilike', '%' . $this->search . '%');
        }
        $shop_list = $shop_list->paginate($this->limit);
        return view('livewire.other.shop.shop-list', ['shop_list' => $shop_list])->title('Shop-list');
    }
    //--open add new shop pop up--
    public function addShops()
    {
        if (in_array('Create Shop', session('user_permission')['Shop'])) {
            $this->dispatch('modal.openModal');
        } else {
            $this->dispatch("alert.message", [
                'type' => 'warning',
                'message' => __("Access Denied! You don't have permission to access this function. Request access from your administrator")
            ]);
        }
    }
    //--open update shop pop up--
    public function get_edit_shop($id)
    {
        if (in_array('Edit Shop', session('user_permission')['Shop'])) {
            $this->dispatch('get_edit_shop', shopId: $id);
            $this->dispatch('modal.openModalUpdate');
        } else {
            $this->dispatch("alert.message", [
                'type' => 'warning',
                'message' => __("Access Denied! You don't have permission to access this function. Request access from your administrator")
            ]);
        }
    }
    public function deleteShop($shopId)
    {
        $this->shopId = $shopId;
        $this->dispatch('modal.confirmDelete');
    }
    public function confirmDelete()
    {
        if ($this->shopId) {
            $shop = Shop::findOrFail($this->shopId);
            $shop->delete();
            create_transaction_log(__('Delete shop') . ' : ' . $shop->shop_name, 'Delete', __('This user delete shop') . ' ' . $shop->shop_name . ' ' . __('successfully') . ' ', $shop->shop_name);
            $this->dispatch('modal.closeDelete');
            $this->dispatch('alert.message', [
                'type' => 'success',
                'message' => __("Deleted Successfully")
            ]);
        }
    }
}
