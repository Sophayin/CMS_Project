<?php

namespace App\Livewire\Sales\Applications;

use App\Models\Address;
use App\Models\Application;
use App\Models\ApplicationStatus;
use Livewire\Component;

class ViewApplication extends Component
{

    public $application = [];
    public $address = [];
    public $appstatus = [];
    public $application_id;
    public $status;
    public $application_status;
    public $application_code;
    public function mount($id)
    {
        $this->application_id = $id;
        $this->application = Application::find($this->application_id);
        $this->address = Address::find($this->application_id);
    }
    public function render()
    {
        return view('livewire.sales.applications.view-application')->title("View Application ID " . $this->application_code);
    }
}
