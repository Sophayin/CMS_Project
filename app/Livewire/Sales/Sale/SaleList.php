<?php

namespace App\Livewire\Sales\Sale;

use App\Models\Application;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SaleList extends Component
{
    use WithPagination;
    public $getCities = [];
    public $getShops = [];
    public $search;
    public $selected_application_ids = [];
    public $shop_id;
    public $start_date;
    public $end_date;
    public $applicationFilter;
    public $city_id;
    public $getpositions, $position_id;

    public function mount()
    {
        $this->start_date = now()->startOfMonth()->toDateString();
        $this->end_date = today()->toDateString();
        $shopIds = auth()->user()->shops->pluck('id')->toArray();
        if (!empty($shopIds)) {
            $this->getShops = Shop::whereIn('id', $shopIds)->get();
        } else {
            $this->getShops = DB::table('shops')
                ->join('applications', 'shops.id', '=', 'applications.shop_id')
                ->select('shops.*')
                ->distinct()
                ->get();
        }

        $this->getCities = DB::table('cities')
            ->join('addresss', 'addresss.city_id', '=', 'cities.id')
            ->whereNotNull('addresss.application_id')
            ->select("cities.*")
            ->groupBy('cities.id')
            ->get();
    }
    public function render()
    {
        $applications = Application::query();
        $shopIds = auth()->user()->shops->pluck('id')->toArray();
        if (!empty($shopIds)) {
            $applications->whereIn('shop_id', $shopIds)->where('status', 2);
        }
        if ($this->search) {
            $applications = $applications->where('client_name', 'like', '%' . $this->search . '%');
        }
        if ($this->shop_id) {
            $applications = $applications->where('shop_id', $this->shop_id);
        }
        if ($this->position_id) {
            $applications = $applications->whereHas('agency.position', function ($query) {
                $query->where('id', $this->position_id);
            });
        }
        if ($this->city_id) {
            $applications = $applications->whereHas('address', function ($query) {
                return $query->where('city_id', $this->city_id);
            });
        }
        $applications = $applications->whereBetween('created_at', [$this->start_date . ' 00:00:00', $this->end_date . ' 23:59:59 '])
            ->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.sales.sale.sale-list', ['applications' => $applications]);
    }

    public function onChangeCity($value)
    {
        $this->city_id = $value;
    }
    public function onChangeShop($value)
    {
        $this->shop_id = $value;
    }
    public function filterByPosition($position_id)
    {
        $this->position_id = $position_id;
    }

    public function previewSelected()
    {
        if (count($this->selected_application_ids) > 0)
            return redirect()->route('sale.preview')->with(['selected_application_ids' => $this->selected_application_ids]);

        //return redirect()->route('sale.preview', ['id' => $this->selected_application_ids]);
    }
}
