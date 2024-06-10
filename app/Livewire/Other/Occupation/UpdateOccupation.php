<?php

namespace App\Livewire\Other\Occupation;

use App\Models\Occupation;
use Livewire\Component;

class UpdateOccupation extends Component
{
    public $name, $description, $occu;
    public $languages = [
        'lang' => 'kh',
        'name' => '',
    ];
    protected $listeners = ['updateOccupation'];
    public function render()
    {
        return view('livewire.other.occupation.update-occupation');
    }
    public function updateOccupation($occuId)
    {
        $occu = Occupation::find($occuId);
        $this->occu = $occu;
        $this->name = $occu->name;
        $this->languages = json_decode($occu->languages, true);
        $this->description = $occu->description;
    }
    public function submit_update_occupation()
    {
        $occu = Occupation::find($this->occu->id);
        $occu->name = $this->name;
        $occu->languages = json_encode($this->languages, JSON_UNESCAPED_UNICODE);
        $occu->description = $this->description;
        $occu->save();
        create_transaction_log(__('update Occupation') . ' : ' . $this->name, 'updated', __('This user update Occupation') . ' ' . $this->name . ' ' . __('successfully') . ' ', $this->name);
        $this->dispatch('alert.message', [
            'type' => 'success',
            'message' => __('Updated successfully')
        ]);
        $this->dispatch('modal.closeModalUpdate');
    }
}
