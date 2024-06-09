<div class="container-fluid">
    <div class="d-flex pl-3">
        <h6 class="main_application mt-1">
            <a wire:navigate href="{{route('sale.list', 'application')}}"><i class="bi bi-arrow-left-circle-fill"></i> &nbsp;{{__('Back')}}</a>
        </h6>
        <h6 class="main_application mt-1">
            <i class="bi bi-chevron-right"></i>
        </h6>
        <h5 class="main_application">{{__('Application ID')}} : #{{$application->code}} </h5>
    </div>
    <div class="card mt-3">
        <div class="card-body ">
            <div class="row mt-3">
                <div class="col-4">
                    <p>{{__('Client Full Name (Khmer)')}} : {{$application->client_name_translate}} </p>
                </div>
                <div class="col">
                    <p>{{__('Client Full Name (English)')}} : {{$application->client_name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>{{__('Gender')}} </p>
                </div>
                <div class="col">
                    <p> : {{__($application->gender)}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>{{__('Status')}} </p>
                </div>
                <div class="col">
                    <p>:
                        <?php $color_status = $application->status == 1 ? 'info' : ($application->status == 2 ? 'success' : 'danger'); ?>
                        <span class="text-{{$color_status}}">{{__(get_application_status($application->status)['label'])}}</span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>{{__('Phone Number')}} </p>
                </div>
                <div class="col">
                    <p> : {{$application->phone}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>{{__('Address')}} </p>
                </div>
                @if($application->address->city?? '')
                <div class="col">
                    <p>:
                        {{ $application->address ? __('House No.').' :'.$application->address->house_no : ''}}
                        {{ $application->address ? __('Street No.').' :'.$application->address->street_no.',' : ''}}
                        {{ $application->address->village ? get_translation($application->address->village).',' : ''}}
                        {{ $application->address->commune ? get_translation($application->address->commune).',' : ''}}
                        {{ $application->address->district ? get_translation($application->address->district).',' : ''}}
                        {{ $application->address->city ? __("Province")." ".get_translation($application->address->city) : ''}}
                    </p>
                </div>
                @endif
            </div>

            @if($application->guarantor_name)
            <div class="row ">
                <div class="col-12 ">
                    <p class="text_section text-dark mt-3 fw-semibold">{{__('Guarantor')}}
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class=" text-secondary text-sm opacity-7">{{__('Full Name')}}</th>
                            <th class=" text-secondary text-sm opacity-7">{{__('Full Name (English)')}} </th>
                            <th class=" text-secondary text-sm opacity-7">{{__('Phone')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm">
                                {{$application->guarantor_name_translate ?? ''}}
                            </td>
                            <td class="text-sm">
                                {{$application->guarantor_name ?? ''}}
                            </td>
                            <td class="text-sm">
                                {{$application->guarantor_phone ?? ''}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

            <div class="row ">
                <div class="col">
                    <p class="text_section text-dark mt-3 fw-semibold">{{__('Product')}}</p>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="text-secondary text-sm opacity-7">{{__('Product Name')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Condition')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Price')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Shop Name')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Approved By')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm">
                                {{$application->product_name}}
                            </td>
                            <td class="text-sm ">
                                {{__($application->condition)}}
                            </td>
                            <td class="text-sm">
                                ${{number_format($application->product_price,0,2)}}
                            </td>
                            <td class="text-sm">
                                {{$application->shop->shop_name ?? ''}}
                            </td>
                            <td class="text-sm">
                                {{$application->loan_company->name ?? ''}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if($application->agency_code || $application->agency)
            <div class="row ">
                <div class="col-12 ">
                    <p class="text_section text-dark mt-3 fw-semibold">{{__('Agency')}}</p>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="text-secondary text-sm opacity-7">{{__('Agency Code')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Full Name')}} </th>
                            <th class="text-secondary text-sm opacity-7">{{__('Phone Number')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm">
                                {{ $application->agency_code}}
                            </td>
                            <td class="text-sm">
                                {{$application->agency->full_name ?? ''}}
                            </td>
                            <td class="text-sm">
                                {{$application->agency->phone ?? ''}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

            @if($application->application_status->count() > 0)
            <div class="row">
                <div class="col-12 ">
                    <p class="text_section text-dark mt-3 fw-semibold">{{__('Status History')}}</p>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="text-secondary text-sm opacity-7">{{__('Date')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Status')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Respond By')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('Reason')}}</th>
                            <th class="text-secondary text-sm opacity-7">{{__('User')}}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($application->application_status as $status)
                        <tr>
                            <td class="text-sm">
                                {{$status->created_at->format('d')}},
                                {{__($status->created_at->format('M'))}},

                                {{$status->created_at->format('Y H:i A')}}
                            </td>
                            <?php $color_status = $status->status == 1 ? 'info' : ($status->status == 2 ? 'success' : 'danger'); ?>
                            <td class="text-sm text-{{$color_status}}">
                                {{__(get_application_status($status->status)['label'])}}
                            </td>
                            <td class="text-sm">
                                {{$status->respond_by}}
                            </td>
                            <td class="text-sm">
                                <ul class="m-0">
                                    @if($status->reason_text)
                                    <li class="text-break">
                                        <nobr>{{ $status->reason_text }}</nobr>
                                    </li>
                                    @endif
                                    @if($status->reason)
                                    <li class="text-break">
                                        <nobr>{{ get_translation($status->reason) }}</nobr>
                                    </li>
                                    @endif
                                </ul>
                            </td>
                            <td class="text-sm">
                                @if($application->created_by)
                                {{$application->created_by}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>