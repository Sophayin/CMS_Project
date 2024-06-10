<?php

namespace App\Livewire\Other\Co;

use App\Models\Address;
use App\Models\City;
use App\Models\CO;
use App\Models\Commune;
use App\Models\District;
use App\Models\Loan_company;
use App\Models\Occupation;
use App\Models\Village;
use Livewire\Component;

class UpdateCo extends Component
{
    public $co_id, $co, $full_name, $full_name_translate, $khmer_identity_card,
        $age, $gender, $phone, $phone_telegram, $occupation_id, $loan_company_id,
        $income, $remark;
    public $city_id, $district_id, $commune_id, $village_id, $house_no, $street_no;
    public $cities = [], $districts = [], $communes = [], $villages = [];
    public $date_of_birth = [];
    public $getMonth = [], $getDays = [], $getYears = [];
    public $loan_companies = [];
    public $occupations = [];
    public $selectedYear;
    public $address;
    protected $listeners = ['updateCo'];
    protected $rules = [
        'full_name' => 'required',
        'full_name_translate' => 'required',
        'khmer_identity_card' => 'required',
        'phone' => 'required',
        'loan_company_id' => 'required',
        'city_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.other.co.update-co');
    }
    public function updateCo($coId)
    {
        $co = CO::find($coId);
        $this->co_id = $coId;
        $this->co = $co;
        $this->full_name = $co->full_name;
        $this->full_name_translate = $co->full_name_translate;
        $this->date_of_birth = json_decode($co->date_of_birth, true);
        $this->age = $co->age;
        $this->gender = $co->gender;
        $this->khmer_identity_card = $co->khmer_identity_card;
        $this->phone = $co->phone;
        $this->phone_telegram = $co->phone_telegram;
        $this->occupation_id = $co->occupation_id;
        $this->income = $co->income;
        $this->loan_company_id = $co->loan_company_id;
        $this->remark = $co->remark;
        if ($co->address) {
            $this->address = Address::find($co->address->id);
            $this->city_id = $co->address->city_id;
            $this->district_id = $co->address->district_id;
            $this->commune_id = $co->address->commune_id;
            $this->village_id = $co->address->village_id;
            $this->house_no = $co->address->house_no;
            $this->street_no = $co->address->street_no;
        }
    }
    public function submitUpdateCo()
    {
        $this->validate();
        $co = CO::find($this->co_id);
        $co->full_name = $this->full_name;
        $co->full_name_translate = $this->full_name_translate;
        $co->date_of_birth = json_encode($this->date_of_birth);
        $co->age = $this->age;
        $co->gender = $this->gender;
        $co->khmer_identity_card = $this->khmer_identity_card;
        $co->phone = $this->phone;
        $co->phone_telegram = $this->phone_telegram;
        $co->occupation_id = $this->occupation_id;
        $co->income = $this->income;
        $co->loan_company_id = $this->loan_company_id;
        $co->remark = $this->remark;
        if ($co->save()) {
            $address = new Address();
            $address->city_id = $this->city_id;
            $address->district_id = $this->district_id;
            $address->commune_id = $this->commune_id;
            $address->village_id = $this->village_id;
            $address->house_no = $this->house_no;
            $address->street_no = $this->street_no;
            $address->co_id = $co->id;
            $address->save();
        }
        create_transaction_log(__('Updated Co') . ' : ' . $this->full_name, 'Updated', __('This user update Co') . ' ' . $this->full_name . ' ' . __('successfully') . ' ', $this->full_name);
        $this->dispatch('refresh_co');
        $this->dispatch('modal.closeModalUpdate');
        $this->dispatch('alert.message', [
            'type' => 'success',
            'message' => __('Updated successfully')
        ]);
    }
    public function updated()
    {
        //--Calcualate age--
        if ($this->selectedYear) {
            $this->calculateAge();
        }
    }
    //--Calculate age by selected year--
    public function calculateAge()
    {
        $this->age = abs($this->selectedYear - date('Y'));
    }
    public function mount()
    {
        $this->getMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            $this->getMonth[] = date('F', mktime(0, 0, 0, $month, 1));
        }
        $this->getDays = [];
        for ($day = 1; $day <= 31; $day++) {
            $this->getDays[] = $day;
        }
        $this->getYears = [];

        for ($year = 1960; $year <= date("Y", strtotime("-10 year", time())); $year++) {
            $this->getYears[] = $year;
        }
        $this->loan_companies = Loan_company::all();
        $this->occupations = Occupation::all();
        $this->cities = City::orderBy('name', 'asc')->orderBy('name', 'asc')->get();
        $this->districts = District::where('city_id', $this->city_id)->orderBy('name', 'asc')->get();
        $this->communes = Commune::where('district_id', $this->district_id)->orderBy('name', 'asc')->get();
        $this->villages = Village::where('commune_id', $this->commune_id)->orderBy('name', 'asc')->get();
    }

    public function onChange($type, $value)
    {
        if ($type == 'city') {
            $this->city_id = $value;
            $this->district_id = $this->district_id;
            $this->commune_id = $this->commune_id;
        } elseif ($type == 'district') {
            $this->district_id = $value;
            $this->commune_id = $this->commune_id;
        } elseif ($type == 'commune') {
            $this->commune_id = $value;
        }
        $this->cities = City::orderBy('name', 'asc')->orderBy('name', 'asc')->get();
        $this->districts = District::where('city_id', $this->city_id)->orderBy('name', 'asc')->get();
        $this->communes = Commune::where('district_id', $this->district_id)->orderBy('name', 'asc')->get();
        $this->villages = Village::where('commune_id', $this->commune_id)->orderBy('name', 'asc')->get();
    }
}
