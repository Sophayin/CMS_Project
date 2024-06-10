<div>
    <section class="section">
        <div class="card">
            <div class="row p-3">
                <div class="d-flex mb-3 justify-content-between border-bottom">
                    <div class="d-flex">
                        <h5 class="mt-1">{{ __('Import') }}{{__('Data')}}</h5>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="p-2">
                            <div class="col-lg-12 col-sm-6">
                                <a wire:click="downloadChannel">
                                    <button class="btn btn-secondary button_save">
                                        <i class="bi bi-box-arrow-up"></i>
                                        {{__('Download Channels')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="col-lg-12 col-sm-6">
                                <a wire:click="downloadCO">
                                    <button class="btn btn-secondary button_save">
                                        <i class="bi bi-box-arrow-up"></i>
                                        {{__('Download CO')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="col-lg-12 col-sm-6">
                                <a wire:click="downloadMFI">
                                    <button class="btn btn-secondary button_save">
                                        <i class="bi bi-box-arrow-up"></i>
                                        {{__('Download MFI')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="col-lg-12 col-sm-6">
                                <a wire:click="downloadProduct">
                                    <button class="btn btn-secondary button_save">
                                        <i class="bi bi-box-arrow-up"></i>
                                        {{__('Download Product')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="col-lg-12 col-sm-6">
                                <a wire:click="downloadShop">
                                    <button class="btn btn-secondary button_save">
                                        <i class="bi bi-box-arrow-up"></i>
                                        {{__('Download Shop')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="col-lg-12 col-sm-6">
                                <a wire:click="downlaodExcelFile">
                                    <button class="btn btn-secondary button_save">
                                        <i class="bi bi-box-arrow-up"></i>
                                        {{__('Download Sample Excel')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="">{{__('Import File')}}</label>
                    <input type="file" wire:model="import_file" class="form-control mt-2">
                </div>
                <div class="col-3 mt-3">
                    <button type="submit" wire:click="importFile" class="btn btn-primary button_save">{{__('Preview')}}</button>
                </div>
                @if (\Session::has('status'))
                <div class="container">
                    {{ session('message') }}
                    @if (session('imported'))
                    <div class="alert alert-success text mt-3">
                        <div class="text d-flex">
                            <div class="text"> {{__('imported Data')}} : ({{count(session('imported'))}}) </div>
                        </div>
                    </div>
                    @endif
                    @if (session('unimported'))
                    <div class="alert alert-warning text mt-3">
                        <div class="row text d-flex">
                            <div class="text">{{__('unimported Data')}} : ({{ count(session('unimported')) }})
                                {{__('Khmer Identity Card')}} : {{json_encode(session('unimported'))}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            <div class="table-responsive p-3 border-top">
                <div class="table-responsive">
                    @if (!empty($previewData))
                    <div class="mt-2 mb-2">{{__('Data Preview')}} ({{count($previewData)}})</div>
                    <form wire:submit.prevent="saveApplicationFile">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-sm">
                                        <input type="checkbox" wire:model="checkbox_main" wire:click="SelectAll" style="width: 15px; height: 15px;">
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Client Full Name (English)")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Client Full Name (Khmer)")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Gender")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Khmer Identity Card")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Phone")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Occupation")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Income")}}</nobr>
                                    </th>
                                    <th colspan="3" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Guarantor")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Shop Name")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Product")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Price")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__('Respond By')}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__('Channel')}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__('Loan Company')}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__('Co')}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__('Register Date')}}</nobr>
                                    </th>
                                    <th colspan="6" class="text-center text-secondary text-sm">
                                        <nobr>{{__('Address')}}</nobr>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center text-secondary text-sm">
                                        <nobr>{{__("Full Name (English)")}}</nobr>
                                    </th>
                                    <th class="text-center text-secondary text-sm">
                                        <nobr>{{__("Full Name (Khmer)")}}</nobr>
                                    </th>
                                    <th class="text-center text-secondary text-sm">
                                        <nobr>{{__("Phone Number")}}</nobr>
                                    </th>
                                    <th class="text-center text-secondary text-sm">
                                        <nobr>{{__("City")}}</nobr>
                                    </th>
                                    <th class="text-center text-secondary text-sm">
                                        <nobr>{{__("District")}}</nobr>
                                    </th>
                                    <th class="text-center text-secondary text-sm">
                                        <nobr>{{__("Commune")}}</nobr>
                                    </th>
                                    <th class="text-center text-secondary text-sm">
                                        <nobr>{{__("Village")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("House No.")}}</nobr>
                                    </th>
                                    <th rowspan="2" class="text-center text-secondary text-sm">
                                        <nobr>{{__("Street No.")}}</nobr>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($previewData as $index => $row)
                                <tr>
                                    <td>
                                        <input type="checkbox" wire:model="selectedRow.{{$row['id']}}" value="{{$row['id']}}" style="width: 15px; height: 15px;">
                                    </td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['client_name']}}</nobr>
                                    </td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['client_name_translate']}}</nobr>
                                    </td>
                                    <td class="text-sm text">{{__($row['gender'])}}</td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['khmer_identity_card']}}</nobr>
                                    </td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['phone']}}</nobr>
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $occupation = \App\Models\Occupation::find($row['occupation_id']);
                                        @endphp
                                        @if($occupation)
                                        <nobr>{{get_translation($occupation)}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">{{$row['income']}}</td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['guarantor_name']}}</nobr>
                                    </td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['guarantor_name_translate']}}</nobr>
                                    </td>
                                    <td class="text-sm text">{{$row['guarantor_phone']}}</td>
                                    <td class="text-sm text">
                                        <nobr>
                                            @php
                                            $shop = \App\Models\Shop::find($row['shop_id']);
                                            @endphp
                                            @if($shop)
                                            {{$shop->shop_name}}
                                            @endif
                                        </nobr>
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $product = \App\Models\Product::find($row['product_id']);
                                        @endphp
                                        @if($product)
                                        <nobr>{{$product->title}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">${{number_format($row['product_price'],2)}}</td>
                                    <td class="text-sm text">{{$row['respond_by']}}</td>
                                    <td class="text-sm text">
                                        @php
                                        $channel = \App\Models\Channel::find($row['channel_id'])
                                        @endphp
                                        @if($channel)
                                        <nobr> {{$channel->title}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $loan_company = \App\Models\Loan_company::find($row['loan_company_id'])
                                        @endphp
                                        @if($loan_company)
                                        <nobr> {{$loan_company->name}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $co = \App\Models\Co::find($row['co_id'])
                                        @endphp
                                        @if($co)
                                        <nobr> {{$co->full_name}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">
                                        <nobr>
                                            {{$row['register_year']}},
                                            {{$row['register_month']}},
                                            {{$row['register_day']}}
                                        </nobr>
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $city = \App\Models\City::find($row['city_id']);
                                        @endphp
                                        @if($city)
                                        <nobr>{{get_translation($city)}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $district = \App\Models\District::find($row['district_id']);
                                        @endphp
                                        @if($district)
                                        <nobr>{{get_translation($district)}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $commune = \App\Models\Commune::find($row['commune_id']);
                                        @endphp
                                        @if($commune)
                                        <nobr>{{get_translation($commune)}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">
                                        @php
                                        $village = \App\Models\Village::find($row['village_id']);
                                        @endphp
                                        @if($village)
                                        <nobr>{{get_translation($village)}}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['house_no']}}</nobr>
                                    </td>
                                    <td class="text-sm text">
                                        <nobr>{{$row['street_no']}}</nobr>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary button_save" type="submit">{{__('Upload')}}</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
</div>
</section>
</div>