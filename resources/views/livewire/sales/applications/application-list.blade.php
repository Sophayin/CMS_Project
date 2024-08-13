<div>
    @if($action === 'create')
    @livewire('sales.applications.create')

    @elseif($action === 'import')
    @livewire('sales.applications.import-file-application')

    @elseif($action === 'update')
    @livewire('sales.applications.update', ['application_id' => $application_id])

    @elseif($action === 'view')
    @livewire('sales.applications.view-application', ['application_id' => $application_id])

    @else
    <section class="section">
        <div class="d-flex mb-3 justify-content-between">
            <div class="p-2 app_section d-flex">
                <div class="mt-1 text-sm">{{__('Application List')}} - {{__('Status')}}</div>
                <div>
                    <select wire:change="onFilterStatus($event.target.value)" class="form-control form-select border-0 bg-transparent">
                        <option value="">{{__('All')}}</option>
                        @foreach(get_application_status() as $status)
                        <option value="{{$status['id']}}">{{__($status['label'])}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <!-- <div class="p-2">
                    <div class="col-lg-12 col-sm-6">
                        <a wire:click="import_application">
                            <button class="btn btn-secondary">
                                <i class="bi bi-arrow-bar-down"></i>
                                {{__('Import File')}}
                            </button>
                        </a>
                    </div>
                </div> -->
                <div class="p-2">
                    <div class="col-lg-12 col-sm-6">
                        <a wire:click="btn_add_application">
                            <button class="btn btn-primary button_addnew ">
                                <i class="bi bi-plus-circle"></i>
                                {{__('Add New Application')}}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body mt-2">
                <div class="row">
                    <div class="col-lg-2 mt-1">
                        <input class="form-control" placeholder="{{__('Type Search...')}}" type="search" wire:model.live.debounce="search">
                    </div>
                    <div class="col-lg-2 d-none d-sm-block p-2">
                        <select wire:model.live="city_id" class="form-select form-select-lg mb-3">
                            <option value="">--{{__('All City')}}--</option>
                            @foreach ($getCities as $item)
                            <option value="{{ $item->id }}">{{ get_translation($item) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 d-sm-block p-2">
                        <select wire:model.live="shop_id" class="form-select form-select-lg mb-3">
                            <option value="">--{{__('All Shop')}}--</option>
                            @foreach ($getShops as $item)
                            <option value="{{ $item->id }}">{{ $item->shop_name }} ({{$item->abbreviation}})</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Date -->
                    <div class="col-lg-4 d-flex mt-2">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control datepicker" id="start_date" wire:model="start_date" />
                            <span class="input-group-text" id="basic-addon1" style="height: 40px; margin-top: 1px;"><i class="bi bi-calendar"></i></span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="input-sm form-control datepicker" id="end_date" wire:model="end_date" />
                            <span class="input-group-text" id="basic-addon1" style="height: 40px; margin-top: 1px;"><i class="bi bi-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text_header">
                            <th class="text-secondary text-center text-sm">{{__('No.')}}</th>
                            <th class="text-secondary text-sm">
                                <nobr>{{__('Shop Name')}}</nobr>
                            </th>
                            <th class="text-secondary text-sm">
                                <nobr>{{__('Client Name')}}</nobr>
                            </th>

                            <th class="text-secondary text-sm">
                                <nobr>{{__('Khmer Identity Card')}}</nobr>
                            </th>
                            <th class="text-secondary text-sm">
                                <nobr>{{__('Phone Number')}}</nobr>
                            </th>
                            <th class="text-secondary text-center text-sm">
                                <nobr>{{__('Status')}}</nobr>
                            </th>
                            <th class="text-secondary text-center text-sm">
                                <nobr>{{__('Reason')}}</nobr>
                            </th>
                            <th class="text-secondary text-center text-sm">
                                <nobr>{{__('Loan Company')}}</nobr>
                            </th>
                            <th class="text-secondary text-sm">
                                <nobr>{{__('Channel')}}</nobr>
                            </th>
                            <th class="text-secondary text-sm">
                                <nobr>{{__('Co')}}</nobr>
                            </th>
                            <th class="text-secondary text-sm">
                                <nobr>{{__('Submitted Day')}}</nobr>
                            </th>
                            <th class="text-secondary text-center text-sm" width="85px">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($applications->isEmpty())
                        <tr>
                            <td colspan="12" class="text-center">{{__("No Record Found.!")}}</td>
                        </tr>
                        @else
                        @foreach($applications as $app)
                        <tr class="text" style="vertical-align: middle;">
                            <td class="text-sm text-center">
                                {{$loop->index + ($applications->perPage() * ($applications->currentPage() -1)) +1}}
                            </td>
                            <td class="text-sm">
                                <nobr>{{$app->shop->shop_name ?? ''}}</nobr>
                            </td>
                            <td class="text-sm">
                                <nobr>{{$app->client_name}}</nobr>
                            </td>
                            <td class="text-sm">{{$app->khmer_identity_card}}</td>
                            <td class="text-sm">{{$app->phone}}</td>
                            <td class="cursor-pointer">
                                <?php $color_status = $app->status == 1 ? 'info' : ($app->status == 2 ? 'success' : 'danger'); ?>
                                <small wire:click="update_application_status({{$app->id}})" class="border-0 btn btn-outline-secondary rounded-pill btn-sm text text-{{$color_status}} pointer application_status">
                                    <nobr>{{__(get_application_status($app->status)['label'])}}</nobr>
                                </small>
                            </td>
                            <td class="text-secondary text-sm">
                                <ul>
                                    @foreach($app->application_status as $item)
                                    @if($item->reason)
                                    <li>
                                        <nobr>{{ get_translation($item->reason)}}</nobr>
                                    </li>
                                    @else
                                    @if($item->reason_text)
                                    <li>
                                        <nobr>{{ $item->reason_text }} </nobr>
                                    </li>
                                    @endif
                                    @endif
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-sm text-center">
                                <nobr>{{$app->loan_company->name ?? ''}}</nobr>
                            </td>
                            <td class="text-sm">
                                <nobr>{{$app->channel->title}}</nobr>
                            </td>
                            <td class="text-sm">{{$app->co->full_name ?? ''}}</td>
                            <td class="text-sm text-center">
                                <nobr>
                                    <?php $working_day = Carbon\Carbon::parse($app->created_at)->diffInDays(Carbon\Carbon::now()->addDay()->startOfDay()) + 1; ?>
                                    {{$working_day}}
                                    {{($working_day <= 1 ? __('Day') : __('Days'))}}
                                </nobr>
                            </td>
                            <td class="text-sm text-end">
                                <nobr>
                                    @if(!$app->is_payroll)
                                    <a style="border-color:azure;" wire:click="duplicate_application({{$app->id}})" class="rounded-pill btn btn-sm btn-outline-primary">
                                        <i class="bi bi-folder-plus"></i>
                                    </a>
                                    <a style="border-color:azure;" wire:click="btn_edit_application({{$app->id}})" class="rounded-pill btn btn-sm btn-outline-success">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    @endif
                                    <a style=" border-color:azure;" wire:click="btn_preview_application({{$app->id}})" class="rounded-pill btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </nobr>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{$applications->links('livewire.customer-pagination')}}
            </div>
        </div>
    </section>
    @livewire('sales.applications.application-status')
    @endif
</div>
<script type="text/javascript">
    //--selected date--
    jQuery(document).ready(function() {
        jQuery('#start_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            language: 'XX',
            format: "yyyy-mm-dd",
            minDate: '-12m',
            maxDate: '0',
        });
        jQuery('#end_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            language: 'XX',
            uiLibrary: 'bootstrap5',
            format: "yyyy-mm-dd",
            minDate: '-12m',
            maxDate: '0',
        });
        jQuery('#start_date, #end_date').on('change', function() {
            @this.set('start_date', jQuery('#start_date').val());
            @this.set('end_date', jQuery('#end_date').val());
        });
    });
</script>