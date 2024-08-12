<?php

namespace App\Livewire\Other\MFI;

use App\Models\LoanCompany;
use Livewire\Component;

class UpdateMFI extends Component
{
    public $mfi, $phone, $name, $name_translate, $telegram, $contact_person, $description;
    protected $listeners = ['updateMFI'];

    public function render()
    {
        return view('livewire.other.m-f-i.update-m-f-i');
    }
    public function updateMFI($mfiId)
    {
        $mfi = LoanCompany::find($mfiId);
        $this->mfi = $mfi;
        $this->name = $mfi->name;
        $this->name_translate = $mfi->name_translate;
        $this->phone = $mfi->phone;
        $this->telegram = $mfi->telegram;
        $this->description = $mfi->description;
    }
    public function submit_update_MFI()
    {
        $mfi = LoanCompany::find($this->mfi->id);
        $mfi->name = $this->name;
        $mfi->name_translate = $this->name_translate;
        $mfi->phone = $this->phone;
        $mfi->telegram = $this->telegram;
        $mfi->description = $this->description;
        $mfi->save();
        create_transaction_log(__('updated MFI') . ' : ' . $this->name, 'Updated', __('This user updated MFI') . ' ' . $this->name . ' ' . __('successfully') . ' ', $this->name);
        $this->dispatch('alert.message', [
            'type' => 'success',
            'message' => __('Updated successfully')
        ]);
        $this->dispatch('modal.closeModalUpdate');
    }
}
