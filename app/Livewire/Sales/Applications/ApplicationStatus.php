<?php

namespace App\Livewire\Sales\Applications;

use App\Models\Application;
use App\Models\ApplicationStatus as ModelsApplicationStatus;
use App\Models\LoanCompany;
use App\Models\Reason;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplicationStatus extends Component
{
    public $id;
    public $applications, $application, $status;
    public $reason_text, $respond_by, $reason_id;
    public $application_id, $registration_date;
    public $appstatus = '';
    protected $listeners = ['edit_application_status', 'render'];
    public $loan_companies = [];
    public $name;
    public $loan_company_id;
    public $appid;
    public $label = 'Approved By';
    public $status_type = false;
    public $reasons = [];

    public function render()
    {
        return view('livewire.sales.applications.application-status');
    }

    protected $rules = [
        'status' => 'required',
        'respond_by' => 'required',
        'loan_company_id' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit_application_status($appid)
    {
        $app = Application::find($appid);
        $this->application_id = $appid;
        $this->status = $app->status;
        $this->respond_by = Auth::user()->username;
        $this->reason_text = $app->reason_text;
        $this->reason_id = $app->reason_id;
        $this->loan_company_id = $app->loan_company_id;
        if ($this->status == 0) {
            $this->status_type = true;
        } else {
            $this->status_type = false;
        }
    }

    public function submit()
    {
        $this->validate();
        $appstatus = new ModelsApplicationStatus();
        $appstatus->application_id = $this->application_id;
        $appstatus->status = $this->status;
        $appstatus->respond_by = $this->respond_by;
        $appstatus->reason_text = $this->reason_text;
        $appstatus->reason_id = $this->reason_id;
        $appstatus->loan_company_id = $this->loan_company_id;
        $appstatus->created_at = $this->registration_date . ' ' . date("h:i:s");
        if ($appstatus->save()) {
            $application = Application::find($this->application_id);
            $application->status = $this->status;
            $application->respond_by = $this->respond_by;
            $application->loan_company_id = $this->loan_company_id;
            $application->save();
        }
        create_transaction_log(__('Updated status') . ' : ' . __(get_application_status($this->status)['label']), 'Update', __('This user update Status') . ' ' . __(get_application_status($this->status)['label']) . ' ' . __('successfully'), $this->status);
        $this->dispatch("alert.message", [
            'type' => 'success',
            'message' => __("Application changed to") .  __(get_application_status($this->status)['label'])
        ]);

        $this->resetExcept('registration_date');
        $this->reset();

        $this->dispatch('modal.closeModal');
        $this->dispatch('refresh_application');
    }

    // change Label aprove or reject on modal status
    public function statusChange($selectedStatus)
    {
        if ($selectedStatus == 0) {
            $this->label = 'Rejected By';
            $this->status_type = true;
        } else {
            $this->status_type = false;
        }
    }
    public function mount()
    {
        $this->respond_by = Auth::user()->username;
        $this->loan_companies = LoanCompany::all();
        $this->reasons = Reason::all();
        $this->registration_date = date('Y-m-d');
    }
}
