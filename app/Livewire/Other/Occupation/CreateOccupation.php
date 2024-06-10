<?php

namespace App\Livewire\Other\Occupation;

use App\Models\Occupation;
use Livewire\Component;

class CreateOccupation extends Component
{
    public $name, $description;
    public $languages = [
        'lang' => 'kh',
        'name' => '',
    ];
    protected $rules = [
        'name' => 'required',
        'languages.name' => 'required',
    ];
    public function render()
    {
        return view('livewire.other.occupation.create-occupation');
    }
    public function createOccupation()
    {
        $this->validate();
        $occupation = new Occupation();
        $occupation->name = $this->name;
        $occupation->languages = json_encode($this->languages, JSON_UNESCAPED_UNICODE);
        $occupation->description = $this->description;
        $occupation->save();
        create_transaction_log(__('create Occupation') . ' : ' . $this->name, 'Created', __('This user create Occupation') . ' ' . $this->name . ' ' . __('successfully') . ' ', $this->name);
        $this->dispatch('modal.closeModal');
        $this->dispatch('alert.message', [
            'type' => 'success',
            'message' => 'Created successfully',
        ]);
        $this->dispatch('refresh_occupation');
    }
}
