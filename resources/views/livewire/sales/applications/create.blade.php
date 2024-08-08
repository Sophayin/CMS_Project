<div>
    <section class="section">
        <form wire:submit="submit">
            <div class="d-flex">
                <h6 class="main_application mt-1 p-1 ">
                    <a wire:navigate href="{{route('application.list')}}"><i class="bi bi-arrow-left-circle-fill"></i> {{__('Back')}}</a>
                </h6>
                <h6 class="main_application mt-1 p-1">
                    <i class="bi bi-chevron-right"></i>
                </h6>
                <h6 class="main_application mt-1 p-1">{{__('Applications')}}</h6>
                <h6 class="main_application mt-1 p-1">
                    <i class="bi bi-chevron-right"></i>
                </h6>
                <h6 class="main_application mt-1 p-1">{{__('New')}}</h6>
                <button type="submit" class="btn btn-primary ">{{__('Save')}}</button>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <!-- Client_section -->
                    <div class="row mb-3">
                        <p class="text_section text-dark mt-3 fw-semibold">{{__('Client Information')}}</p>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label class="form-label fw-semibold">{{__('Client Full Name (Khmer)')}} <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('client_name_translate') is-invalid @enderror" wire:model="client_name_translate" placeholder="{{__('Enter Full Name (Khmer)')}}">
                            @error('client_name_translate') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label class="form-label fw-semibold"> {{__('Client Full Name (English)')}} </label>
                            <input type="text" class="form-control" wire:model="client_name" placeholder="{{__('Enter Full Name (English)')}}">
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <label class="form-label text fw-semibold">{{ __('Gender')}}</label>
                            <select class="form-select form-select-lg" wire:model="gender">
                                <option value="Male">{{__('Male')}}</option>
                                <option value="Female">{{__('Female')}}</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <label class="form-label text fw-semibold">{{__('Registered Date')}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="register_date" wire:model="registration_date" placeholder="{{$registration_date}}" />
                                <span class="input-group-text" style="height: 40px; margin-top: 1px;" id="basic-addon1"><i class="bi bi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label class="form-label fw-semibold"> {{__('Khmer Identity Card')}} </label>
                            <input type="text" class="form-control @error('khmer_identity_card') is-invalid @enderror" wire:model="khmer_identity_card" placeholder="{{__('Khmer identity card')}}">
                            @error('khmer_identity_card') <small class="invalid-feedback">{{ __($message) }}</small> @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label class="form-label fw-semibold"> {{__('Phone Number')}} <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model="phone" placeholder="{{__('Phone Number')}}">
                            @error('phone') <small class="invalid-feedback">{{ __($message) }}</small> @enderror
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <label class="form-label text fw-semibold"> {{__('Occupation')}} <span class="text-danger">*</span></label>
                            <select wire:model="occupation" class="form-select form-select-lg @error('occupation') is-invalid @enderror" aria-label="select occupation">
                                <option value="0">--{{__('Occupation')}}--</option>
                                @foreach($occupations as $occupation)
                                <option value="{{$occupation->id}}">
                                    {{get_translation($occupation)}}
                                </option>
                                @endforeach
                            </select>
                            @error('occupation') <small class="invalid-feedback">{{ __($message) }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 ">
                            <label class="form-label text fw-semibold">{{__('Monthly Income')}}<span class="text-danger">*</span></label>
                            <select wire:model="income" class="form-select form-select-lg @error('income') is-invalid @enderror" aria-label="Monthly Income">
                                <option value="0">--{{__('Monthly Income')}}--</option>
                                <option value="NA"> N/A</option>
                                <option value="<$150">&nbsp; < $150 </option>
                                <option value="$151->$300"> $151->$300</option>
                                <option value="$301->$500"> $301->$500</option>
                                <option value="$501->$700"> $501->$700</option>
                                <option value="$700->$1000"> $701->$1000</option>
                                <option value=">$1000"> >$1000 </option>
                            </select>
                            @error('income') <small class="invalid-feedback">{{ __($message) }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- End Client_section -->

                    <!--Address -->
                    <div class="row mb-3">
                        <div class="col-lg-12 fw-semibold">
                            <span wire:click="addressModal" class="pointer @error('city_id') is-invalid @enderror" style="color: #034c72;">
                                @if(empty($city))
                                <i class="bi bi-plus-circle"></i> {{__('Address')}} <small class="text-danger">*</small>
                                @else
                                {{__('Edit Address')}}
                                <i class="bi bi-pencil-square"></i>
                                @endif
                            </span>
                            @error('city_id') <small class="invalid-feedback">{{__($message)}}</small>@enderror
                        </div>
                        <div class="col-lg-12">
                            <small class="text-body-secondary fs-7">
                                {{ $village ? get_translation($village).',' : ''}}
                                {{ $commune ? get_translation($commune).',' : ''}}
                                {{ $district ? get_translation($district).',' : ''}}
                                {{ $city ? get_translation($city): ''}}
                            </small>
                        </div>
                        <div class="col-lg-12">
                            <small class="text-body-secondary fs-7">
                                {{$house_no ? __('House No.').' : '.$house_no : ''}}
                                {{$street_no ? __('House No.').' : '.$street_no : ''}}
                            </small>
                        </div>
                        <div class="col-lg-12">
                            <small class="text-body-secondary fs-7">
                                {{$latitude ? __('Google Latitude (Optional)').' : '.$latitude : ''}}
                            </small>
                        </div>
                        <div class="col-lg-12">
                            <small class="text-body-secondary fs-7">
                                {{$longitude ? __('Google Longtitude').' : '.$longitude : ''}}
                            </small>
                        </div>
                    </div>
                    <!-- Product_section -->
                    <div class="row mb-3">
                        <p class="text_section bg-white fw-semibold">{{__('Product Information')}}</p>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold"> {{__('Shop Name')}} <small class="text-danger">*</small></label>
                            <select wire:model="shop_name" class="form-select form-select-lg @error('shop_name') is-invalid @enderror" aria-label="Product">
                                <option value="">--{{__('Choose Shop')}}--</option>
                                @foreach($shops as $shop)
                                <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                @endforeach
                            </select>
                            @error('shop_name') <small class="invalid-feedback">{{ __($message) }}</small> @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold">{{__('Product Name')}}<small class="text-danger">*</small></label>
                            <select wire:model="product_id" wire:change="FilterProduct($event.target.value)" class="form-select form-select-lg @error('product_id') is-invalid @enderror " aria-label="Select Product">
                                <option value="">--{{__('Choose Product')}}--</option>
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                                @endforeach
                            </select>
                            @error('product_id') <small class="invalid-feedback">{{ __($message)}}</small>@enderror

                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold">{{__('Condition')}} <small class="text-danger">*</small></label>
                            <select wire:model="condition" class="form-select form-select-lg @error('condition') is-invalid @enderror" aria-label="Default select example">
                                <option value="none">--{{__('Condition')}}--</option>
                                <option value="New">{{__('New')}}</option>
                                <option value="Used">{{__('Used')}}</option>
                            </select>
                            @error('condition') <small class="invalid-feedback">{{ __($message)}}</small>@enderror

                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                            <label class="form-label text fw-semibold"> {{__('Price (USD)')}} <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('product_price') is-invalid @enderror" wire:model="product_price" placeholder="00.00">
                            @error('product_price') <small class="invalid-feedback">{{ __($message)}}</small>@enderror
                        </div>
                    </div>
                    <!--End request_section -->
                    <!-- Channel & MFI & Co -->
                    <div class="row mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="" class="form-label fw-semibold">{{__('Select Channel')}} </label>
                            <select class="form-select form-select-lg @error('channel_id') is-invalid @enderror" wire:model="channel_id">
                                <option value="0">{{__('Channel')}}</option>
                                @foreach ($channels as $channel )
                                <option value="{{$channel->id}}">{{$channel->title}}</option>
                                @endforeach
                            </select>
                            @error('channel_id') <small class="invalid-feedback">{{ __($message) }}</small> @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label for="" class="form-label fw-semibold">{{__('Select MFI')}} </label>
                            <select class="form-select form-select-lg" wire:change="selectMFI('mfi', $event.target.value)" wire:model="loan_company_id" aria-label="Select Product">
                                <option value="0">{{__('Choose')}}</option>
                                @foreach ($mfi as $m )
                                <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold">{{__('Select CO')}} <small class="text-danger">*</small></label>
                            <select wire:model="co_id" class="form-select" id="selectedco" style="width: 100%;">
                                <option value="">--{{__('Choose')}}--</option>
                                @foreach ($co as $c )
                                <option value="{{$c->id}}">{{$c->full_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Guarantor_section -->
                    <div class="row mt-3 mb-3">
                        <div class="col fw-semibold">
                            <span wire:click="guarantorModal" class="pointer w-100" style="color: #034c72;">
                                @if(empty($guarantor_name))
                                <i class="bi bi-plus-circle"></i> {{__('Guarantor')}}
                                @else
                                {{__('Guarantor')}} <i class=" bi bi-pencil-square"></i>
                                @endif
                            </span>
                        </div>
                        <div class="col-md-12">
                            @if($guarantor_name_translate)
                            <small class="text-body-secondary fs-7">{{__('Full Name (Khmer)')}} : {{$guarantor_name_translate}}</small>
                            @endif
                            @if($guarantor_name)
                            <small class="text-body-secondary fs-7">{{__('Full Name (English)')}} : {{$guarantor_name}}</small>
                            @endif
                            @if($guarantor_phone)
                            <small class="text-body-secondary fs-7">{{__('Phone Number')}}: {{$guarantor_phone}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <span wire:click="mediaShow" class="pointer p-2 w-100 fw-semibold" style="color: #034c72;">
                            <i class="bi bi-plus-circle"></i> {{__('Social Media')}}
                        </span>
                        @if($facebook)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold">{{__('Facebook')}}</label>
                            <input type="text" class="form-control " wire:model="client_facebook" placeholder="{{__('Enter')}}">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Addres Modal -->
    <div wire:ignore.self class="modal fade" id="addressModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{__('Address')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('livewire.sales.applications.addressmodal')
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" wire:click="saveAddress" class=" btn btn-primary button_save" data-bs-dismiss="modal">{{__('Done')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Guarantor Modal -->
    <div wire:ignore.self class="modal fade" id="guarantorModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{__('Guarantor')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('livewire.sales.applications.guarantormodal')
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" wire:click="addGuarantor" class=" btn btn-primary button_save" data-bs-dismiss="modal">{{__('Done')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    //--selected date--
    jQuery(document).ready(function() {
        jQuery('#register_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            language: 'XX',
            format: "yyyy-mm-dd",
            minDate: '-12m',
            maxDate: '0',
        });
        jQuery('#register_date').on('change', function() {
            @this.set('registration_date', jQuery('#register_date').val());
        });
    });

    //--selected agency--
    Livewire.on('loadAgency', postId => {
        jQuery(document).ready(function() {
            jQuery('#selectedco').select2();
        });
    })
    jQuery(document).ready(function() {
        jQuery('#selectedco').select2();
        jQuery('#selectedco').on('change', function(e) {
            @this.set('co_id', jQuery(this).val());
        });
    });
</script>
@endpush