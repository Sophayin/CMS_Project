<?php

namespace App\Livewire\Other\Occupation;

use App\Models\Occupation;
use Livewire\Component;

class OccupationList extends Component
{
    public $limit = 15;
    public $search = '';
    public $occupation, $occupationId;
    public function render()
    {
        $occupation_list = Occupation::query();
        if ($this->search) {
            $occupation_list = $occupation_list->where('name', 'ilike', '%' . $this->search . '%')
                ->orWhere('languages', 'ilike', '%' . $this->search . '%');
        }
        $occupation_list = $occupation_list->paginate($this->limit);
        return view('livewire.other.occupation.occupation-list', ['occupation_list' => $occupation_list]);
    }
    public function addOccupation()
    {
        $this->dispatch('modal.openModal');
    }
    public function updateOccupation($id)
    {
        $this->dispatch('updateOccupation', occuId: $id);
        $this->dispatch('modal.openModalUpdate');
    }
    public function deleteOccupation($occupationId)
    {
        $this->occupationId = $occupationId;
        $this->dispatch('modal.confirmDelete');
    }
    public function confirmDelete()
    {
        if ($this->occupationId) {
            $occupation = Occupation::findOrFail($this->occupationId);
            $occupation->delete();
            create_transaction_log(__('Delete occupation') . ' : ' . $occupation->name, 'Delete', __('This user delete occupation') . ' ' . $occupation->name . ' ' . __('successfully') . ' ', $occupation->name);
            $this->dispatch('modal.closeDelete');
            $this->dispatch('alert.message', [
                'type' => 'success',
                'message' => __("Deleted Successfully")
            ]);
        }
    }
}
