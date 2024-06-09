<?php

namespace App\Livewire;

use App\Livewire\Setting\SystemLog;
use App\Models\Agency;
use App\Models\City;
use App\Models\Commune;
use App\Models\District;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $cities = [];
    public $districts = [];
    public $communes = [];
    public $villages = [];
    public $city_id, $district_id, $commune_id;
    public $start_date, $end_date;

    public function render()
    {
        $user = auth()->user();
        //--query only agencies that has children--
        $shops = DB::table('shops')
            ->join('applications', 'shops.id', '=', 'applications.shop_id')
            ->select('shops.*', DB::raw('COUNT(applications.id) as applications_count'))
            ->groupBy('shops.id')
            ->orderByDesc('applications_count')
            ->limit(5)
            ->get();

        $products = DB::table('products')
            ->join('applications', 'products.id', '=', 'applications.product_id')
            ->select('products.*', DB::raw('COUNT(applications.id) as applications_count'))
            ->groupBy('products.id')
            ->orderByDesc('applications_count')
            ->limit(5)
            ->get();

        $latestActions = DB::table('transaction_logs')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();
        return view(
            'livewire.dashboard',
            [
                'user' => $user,
                'shops' => $shops,
                'products' => $products,
                'latestActions' => $latestActions,
            ]
        )->title('Dashboard');
    }
    public function mount()
    {
        $this->start_date = now()->startOfMonth()->toDateString();
        $this->end_date = now()->endOfMonth()->toDateString();
    }
}
