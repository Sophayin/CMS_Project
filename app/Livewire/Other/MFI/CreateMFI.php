<?php

namespace App\Livewire\Other\MFI;

use App\Models\Loan_company;
use Livewire\Component;

class CreateMFI extends Component
{
    public $name, $name_translate, $phone, $description, $telegram, $contact_person;
    protected $rules = [
        'name' => 'required',
        'name_translate' => 'required',
        'phone' => 'required',
    ];
    public function messages()
    {
        return [
            'name_translate.required' => 'The full name (Khmer) field is required.',
        ];
    }
    public function render()
    {
        return view('livewire.other.m-f-i.create-m-f-i');
    }
    public function createMFI()
    {
        $this->validate();
        $mfi = new Loan_company();
        $mfi->name = $this->name;
        $mfi->name_translate = $this->name_translate;
        $mfi->phone = $this->phone;
        $mfi->telegram = $this->telegram;
        $mfi->contact_person = $this->contact_person;
        $mfi->description = $this->description;
        $mfi->save();
        create_transaction_log(__('Created MFI') . ' : ' . $this->name, 'Created', __('This user created MFI') . ' ' . $this->name . ' ' . __('successfully') . ' ', $this->name);
        $this->dispatch('modal.closeModal');
        $this->dispatch('alert.message', [
            'type' => 'success',
            'message' => 'Created successfully',
        ]);
    }
}
