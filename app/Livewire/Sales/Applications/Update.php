<?php

namespace App\Livewire\Sales\Applications;

use App\Models\Address;
use App\Models\Agency;
use App\Models\Application;
use App\Models\Channel;
use App\Models\City;
use App\Models\CO;
use App\Models\Commune;
use App\Models\District;
use App\Models\Loan_company;
use App\Models\Occupation;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $application_id,
        $client_name, $client_name_translate, $client_profile, $phone, $approved_by, $gender, $guarantor_name,
        $guarantor_name_translate, $guarantor_phone, $reason, $code,
        $occupation_id, $income, $status, $condition, $client_facebook,
        $loan_company_id, $name, $latitude, $longitude, $product_name, $khmer_identity_card,
        $channel_id;

    public $referrer;
    public $city_id, $district_id, $commune_id, $village_id;
    public $city, $district, $commune, $village;
    public $cities = [];
    public $districts = [];
    public $communes = [];
    public $villages = [];
    public $application = [];
    public $agencies = [], $agency, $agency_name, $agency_phone, $agency_id, $agency_code, $leader, $leader_code;
    public $occupation;
    public $product, $product_title, $product_price, $product_id;
    public $shops = [], $shop_name, $shop_id;
    public $address = [];
    public $guarantor = false;
    public $city_name, $district_name, $commune_name, $village_name;
    public $house_no, $street_no;
    public $client_facebook_name = false;
    public $registration_date;
    public $channels = [];
    public $co = [];
    public $mfi = [];
    public $co_id, $mfi_id;

    protected $rules = [
        //'client_name' => 'required|string|max: 255',
        'client_name_translate' => 'required|string|max: 255',
        'phone' => 'required|string|min:6',
        'occupation' => 'required',
        'income' => 'required',
        'product_id' => 'required',
        'condition' => 'required',
        'product_price' => 'required',
        'city_id' => 'required',
        'shop_id' => 'required',
        'channel_id' => 'required',

    ];
    public function messages()
    {
        return [
            'product_id.required' => 'The product field is required',
            'phone.required' => 'The phone field must be at least 6 characters.',
            'city_id.required' => 'The city field is required.',
            'product_price.required' => "The price field is required.",
            'agency_id.required' => "The agency field is required.",
            "client_name_translate.required" => "The client name (khmer) field is required.",
            "shop_id.required" => "The Shop name field is required.",
            'channel_id.required' => "The channel field is required."
        ];
    }
    public function selectMFI($type, $value)
    {
        if ($type == 'mfi') {
            $this->loan_company_id = $value;
            $this->co_id = $this->co_id;
        }
        $this->co = CO::where('loan_company_id', $this->loan_company_id)->orderBy('full_name', 'asc')->get();
    }

    public function mount($id)
    {
        $this->application_id = $id;
        $application = Application::find($this->application_id);
        $this->code = $application->code;
        $this->channel_id = $application->channel_id;
        $this->shop_id = $application->shop_id;
        $this->client_name = $application->client_name;
        $this->client_name_translate = $application->client_name_translate;
        $this->khmer_identity_card = $application->khmer_identity_card;
        $this->phone = $application->phone;
        $this->loan_company_id = $application->loan_company_id;
        $this->product_price = $application->product_price;
        $this->gender = $application->gender;
        $this->guarantor_name = $application->guarantor_name;
        $this->guarantor_name_translate = $application->guarantor_name_translate;
        $this->guarantor_phone = $application->guarantor_phone;
        $this->occupation_id = $application->occupation_id;
        $this->income = $application->income;
        $this->status = $application->status;
        $this->product_id = $application->product_id;
        $this->mfi_id = $application->loan_company_id;
        $this->co_id = $application->co_id;
        $this->condition = $application->condition;
        $this->client_facebook = $application->client_facebook;
        $this->registration_date = $application->created_at->format('Y-m-d');
        if ($application->address) {
            $this->address = Address::where('application_id', $this->application_id)->first();
            $this->city_id = $application->address->city_id ?? 0;
            $this->city = $application->address->city ?? '';
            $this->district_id = $application->address->district_id ?? 0;
            $this->district = $application->address->district ?? '';
            $this->commune_id = $application->address->commune_id ?? 0;
            $this->commune =  $application->address->commune ?? '';
            $this->village_id = $application->address->village_id ?? 0;
            $this->village = $application->address->village ?? '';
            $this->house_no = $application->address->house_no ?? '';
            $this->street_no = $application->address->street_no ?? '';
            $this->latitude = $application->address->latitude ?? '';
            $this->longitude = $application->address->longitude ?? '';
        }
        if ($this->loan_company_id) {
            $this->co = CO::where('loan_company_id', $this->loan_company_id)->orderBy('full_name', 'asc')->get();
        }
        $shopIds = auth()->user()->shops->pluck('id')->toArray();

        if (!empty($shopIds)) {
            $this->shops = Shop::whereIn('id', $shopIds)->get();
        } else {
            $this->shops = Shop::all();
        }
    }

    public function edit()
    {
        $this->validate();
        $app = Application::find($this->application_id);
        $app->code = $this->code;
        $app->channel_id = $this->channel_id;
        $app->product_id = $this->product_id;
        $app->product_name = $this->product_name;
        $app->shop_id = $this->shop_id;
        $app->client_name = $this->client_name;
        $app->client_name_translate = $this->client_name_translate;
        $app->khmer_identity_card = $this->khmer_identity_card;
        $app->phone = $this->phone;
        $app->loan_company_id = $this->loan_company_id;
        $app->product_price = $this->product_price;
        $app->gender = $this->gender;
        $app->guarantor_name = $this->guarantor_name;
        $app->guarantor_name_translate = $this->guarantor_name_translate;
        $app->guarantor_phone = $this->guarantor_phone;
        $app->occupation_id = $this->occupation_id;
        $app->loan_company_id = $this->loan_company_id;
        $app->co_id = $this->co_id;
        $app->income = $this->income;
        $app->condition = $this->condition;
        $app->client_facebook = $this->client_facebook;
        $app->updated_by = Auth()->user()->username;
        if ($app->save()) {
            if ($app->address) {
                $address = Address::find($app->address->id);
                $address->city_id = $this->city_id;
                $address->district_id = $this->district_id;
                $address->commune_id = $this->commune_id;
                $address->village_id = $this->village_id;
                $address->house_no = $this->house_no;
                $address->street_no = $this->street_no;
                $address->latitude = $this->latitude;
                $address->longitude = $this->longitude;
                $address->save();
            } else {
                $address = new Address;
                $address->city_id = $this->city_id;
                $address->district_id = $this->district_id;
                $address->commune_id = $this->commune_id;
                $address->village_id = $this->village_id;
                $address->house_no = $this->house_no;
                $address->street_no = $this->street_no;
                $address->latitude = $this->latitude;
                $address->longitude = $this->longitude;
                $address->application_id = $app['id'];
                $address->save();
            }
        }
        create_transaction_log(__('Updated Application') . ' : ' . $this->client_name, __('Updated'), __('This user updated application') . ' ' . $this->client_name . __('successfully') . ' ', $this->client_name);
        $this->dispatch('alert.message', [
            'type' => 'success',
            'message' => __('Application has been successfully updated'),
        ]);
    }
    // Select product & show price
    public function FilterProduct($product_id)
    {
        $product = Product::Find($product_id);
        $this->product_name = $product->title ?? '';
    }

    public function onChange($type, $value)
    {
        if ($type == 'city') {
            $this->city_id = $value;
        } elseif ($type == 'district') {
            $this->district_id = $value;
        } elseif ($type == 'commune') {
            $this->commune_id = $value;
        }
    }

    public function addressModal()
    {
        $this->dispatch('modal.addressModal');
    }
    public function guarantorModal()
    {
        $this->dispatch('modal.guarantorModal');
    }
    //-- Add impermanent Guarantor--
    public function updateGuarantor()
    {
        $this->guarantor_name = $this->guarantor_name;
        $this->guarantor_name = $this->guarantor_name_translate;
        $this->guarantor_phone = $this->guarantor_phone;
    }
    // Add impermanent Address
    public function saveAddress()
    {
        $this->city = City::find($this->city_id);
        $this->district = District::find($this->district_id);
        $this->commune = Commune::find($this->commune_id);
        $this->village = Village::find($this->village_id);
        $this->house_no = $this->house_no;
        $this->street_no = $this->street_no;
    }

    // Show Media Field
    public function mediaShow()
    {
        $this->client_facebook_name = !$this->client_facebook_name;
    }

    public function render()
    {
        $this->dispatch('loadAgency');
        $this->cities = City::orderBy('name', 'asc')->orderBy('name', 'asc')->get();
        $this->districts = District::where('city_id', $this->city_id)->orderBy('name', 'asc')->get();
        $this->communes = Commune::where('district_id', $this->district_id)->orderBy('name', 'asc')->get();
        $this->villages = Village::where('commune_id', $this->commune_id)->orderBy('name', 'asc')->get();
        $this->occupation = Occupation::all();
        $this->product = Product::all();
        $this->channels = Channel::all();
        $this->mfi = Loan_company::all();
        return view('livewire.sales.applications.update');
    }
}
