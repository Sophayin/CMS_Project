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

class CreateCo extends Component
{
    public $full_name, $full_name_translate, $gender, $age, $phone, $phone_telegram,
        $khmer_identity_card, $occupation_id, $loan_company_id, $description, $income,
        $remark;
    public $city_id, $district_id, $commune_id, $village_id, $house_no, $street_no;
    public $cities = [], $districts = [], $communes = [], $villages = [];
    public $date_of_birth = [];
    public $getMonth = [], $getDays = [], $getYears = [];
    public $loan_companies = [];
    public $occupations = [];
    public $selectedYear;
    protected $rules = [
        'full_name' => 'required',
        'full_name_translate' => 'required',
        'khmer_identity_card' => 'required',
        'phone' => 'required',
        'loan_company_id' => 'required',
        'city_id' => 'required',
    ];
    public function messages()
    {
        return [
            'full_name.required' => 'The full name (English) field is required.',
            'full_name_translate.required' => 'The full name (Khmer) field is required.',
            'loan_company_id.required' => 'The Loan Company field is required.',
        ];
    }

    public function render()
    {
        return view('livewire.other.co.create-co');
    }

    public function createCo()
    {
        $exist = $this->getErrorBag();
        if (CO::where('khmer_identity_card', $this->khmer_identity_card)->exists()) {
            $exist->add('khmer_identity_card', 'This khmer identity card is already used');
            if ($exist) {
                return $exist;
            }
        } else {
            $this->validate();
            $co = new CO();
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
            create_transaction_log(__('Created Co') . ' : ' . $this->full_name, 'Created', __('This user created Co') . ' ' . $this->full_name . ' ' . __('successfully') . ' ', $this->full_name);
            $this->dispatch('modal.closeModal');
            $this->dispatch('alert.message', [
                'type' => 'success',
                'message' => __('Created successfully'),
            ]);
            $this->reset([
                'full_name',
                'full_name_translate',
                'khmer_identity_card',
                'date_of_birth',
                'phone',
                'phone_telegram',
                'occupation_id',
                'income',
                'loan_company_id',
                'remark',
                'city_id',
                'district_id',
                'commune_id',
                'village_id',
                'house_no',
                'street_no',
            ]);
        }
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
            $this->district_id = 0;
            $this->commune_id = 0;
        } elseif ($type == 'district') {
            $this->district_id = $value;
            $this->commune_id = 0;
        } elseif ($type == 'commune') {
            $this->commune_id = $value;
        }
        $this->cities = City::orderBy('name', 'asc')->orderBy('name', 'asc')->get();
        $this->districts = District::where('city_id', $this->city_id)->orderBy('name', 'asc')->get();
        $this->communes = Commune::where('district_id', $this->district_id)->orderBy('name', 'asc')->get();
        $this->villages = Village::where('commune_id', $this->commune_id)->orderBy('name', 'asc')->get();
    }
}
