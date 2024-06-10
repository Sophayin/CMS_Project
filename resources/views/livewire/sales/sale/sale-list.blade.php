<div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row p-2">
                    <div class="col-lg-2 d-none d-sm-block p-2 ml-3">
                        <input class="form-control" placeholder="{{__('Type Search...')}}" type="search" wire:model.live.debounce="search">
                    </div>
                    <div class="col-lg-2 d-none d-sm-block p-2 ">
                        <select wire:change="onChangeCity($event.target.value)" class="form-select form-select-lg mb-3">
                            <option value="">--{{__('All City')}}--</option>
                            @foreach ($getCities as $item)
                            <option value="{{ $item->id }}">{{ get_translation($item) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 d-none d-sm-block p-2">
                        <select wire:change="onChangeShop($event.target.value)" class="form-select form-select-lg mb-3">
                            <option value="" class="all_shop">--{{__('All Shop')}}--</option>
                            @foreach ($getShops as $item)
                            <option value="{{ $item->id }}">{{ $item->shop_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Date -->
                    <div class="col-lg-4 d-flex mt-2" id="sandbox-container">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" id="start_date" wire:model="start_date" />
                            <span class="input-group-text" id="basic-addon1" style="height: 40px; margin-top: 1px;"><i class="bi bi-calendar"></i></span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" id="end_date" wire:model="end_date" />
                            <span class="input-group-text" id="basic-addon1" style="height: 40px; margin-top: 1px;"><i class="bi bi-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-secondary text-center text-sm">{{__('No.')}}</th>
                                <th class="text-secondary text-sm">{{__('Shop Name')}}</th>
                                <th class="text-secondary text-sm">
                                    <nobr>{{__('Client Name')}}</nobr>
                                </th>
                                <th class="text-secondary text-sm">{{__('Gender')}}</th>
                                <th class="text-secondary text-sm">{{__('Khmer Identity Card')}}</th>
                                <th class="text-secondary text-sm">{{__('Phone Number')}}</th>
                                <th class="text-secondary text-sm">{{__('Respond By')}}</th>
                                <th class="text-secondary text-center text-sm">{{__('Loan Company')}}</th>
                                <th class="text-secondary text-center text-sm">{{__('Status')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($applications->isEmpty())
                            <tr>
                                <td colspan="12" class="text-center">{{__("No Record Found.!")}}</td>
                            </tr>
                            @else
                            @foreach($applications as $app)
                            <tr>
                                <td class="text-sm text-center index-id">
                                    {{$loop->index+ ($applications->perPage() * ($applications->currentPage() -1)) +1 }}
                                </td>
                                <td class="text-sm">
                                    <nobr>{{$app->shop->shop_name ?? ''}}</nobr>
                                </td>
                                <td class="text-sm">{{$app->client_name}}</td>
                                <td class="text-sm">{{__($app->gender)}}</td>
                                <td class="text-sm">{{$app->khmer_identity_card}}</td>
                                <td class="text-sm">{{$app->phone}}</td>
                                <td class="text-sm">{{$app->respond_by}}</td>
                                <td class="text-center text-sm">
                                    <nobr>{{$app->loan_company->name ?? ''}} </nobr>
                                </td>
                                <?php $color_status = $app->status == 1 ? 'info' : ($app->status == 2 ? 'success' : 'danger'); ?>
                                <td class="text-sm text-center text-{{$color_status}}">{{__(get_application_status($app->status)['label'])}} </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$applications->links('livewire.customer-pagination')}}
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    //--selected date--
    jQuery(document).ready(function() {
        $('#start_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            language: 'XX',
            format: "yyyy-mm-dd",
            minDate: '-12m',
            maxDate: '0',
        });
        $('#end_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            language: 'XX',
            uiLibrary: 'bootstrap5',
            format: "yyyy-mm-dd",
            minDate: '-12m',
            maxDate: '0',
        });
        $('#start_date, #end_date').on('change', function() {
            @this.set('start_date', $('#start_date').val());
            @this.set('end_date', $('#end_date').val());
        });
    });
</script>