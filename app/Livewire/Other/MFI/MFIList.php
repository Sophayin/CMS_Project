<?php

namespace App\Livewire\Other\MFI;

use App\Models\Loan_company;
use Livewire\Component;

class MFIList extends Component
{
    public $mfiId, $mfi;
    protected $listeners = ['refresh_mfi' => 'render'];

    public function render()
    {
        $mfi_list = Loan_company::all();
        return view('livewire.other.m-f-i.m-f-i-list', ['mfi_list' => $mfi_list]);
    }
    public function addMFI()
    {
        $this->dispatch('modal.openModal');
    }
    public function updateMFI($id)
    {
        $this->dispatch('updateMFI', mfiId: $id);
        $this->dispatch('modal.openModalUpdate');
    }
    public function deleteMFI($mfiId)
    {
        $this->mfiId = $mfiId;
        $this->dispatch('modal.confirmDelete');
    }
    public function confirmDelete()
    {
        if ($this->mfiId) {
            $mfi = Loan_company::findOrFail($this->mfiId);
            $mfi->delete();
            create_transaction_log(__('Delete mfi') . ' : ' . $mfi->name, 'Delete', __('This user delete mfi') . ' ' . $mfi->name . ' ' . __('successfully') . ' ', $mfi->name);
            $this->dispatch('modal.closeDelete');
            $this->dispatch('alert.message', [
                'type' => 'success',
                'message' => __("Deleted Successfully")
            ]);
        }
    }
}
