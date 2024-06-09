<?php

namespace App\Livewire\Other\Co;

use App\Models\CO;
use Livewire\Component;
use Livewire\WithPagination;

class CoList extends Component
{
    use WithPagination;
    public $limit = 10;
    public $search;
    public $coId;
    protected $listeners = ['refresh_shop' => 'render'];

    public function render()
    {
        $co_list = CO::query();
        if ($this->search) {
            $co_list = $co_list->where('full_name', 'ilike', '%' . $this->search . '%')
                ->orWhere('full_name_translate', 'ilike', '%' . $this->search . '%')
                ->orWhere('phone', 'ilike', '%' . $this->search . '%');
        }
        $co_list = $co_list->paginate($this->limit);
        return view('livewire.other.co.co-list', ['co_list' => $co_list])->title('Co-list');
    }
    public function addCo()
    {
        $this->dispatch('modal.openModal');
    }
    public function updateCo($id)
    {
        $this->dispatch('updateCo', coId: $id);
        $this->dispatch('modal.openModalUpdate');
    }
    public function deleteShop($coId)
    {
        $this->coId = $coId;
        $this->dispatch('modal.confirmDelete');
    }
    public function confirmDelete()
    {
        if ($this->coId) {
            $co = CO::findOrFail($this->coId);
            $co->delete();
            create_transaction_log(__('Delete co') . ' : ' . $co->full_name, 'Delete', __('This user delete co') . ' ' . $co->full_name . ' ' . __('successfully') . ' ', $co->full_name);
            $this->dispatch('modal.closeDelete');
            $this->dispatch('alert.message', [
                'type' => 'success',
                'message' => __("Deleted Successfully")
            ]);
        }
    }
}
