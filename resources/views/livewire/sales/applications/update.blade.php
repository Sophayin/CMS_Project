<div>
    <section class="section">
        <form wire:submit.prevent="edit">
            <div class="d-flex pl-3">
                <h6 class="main_application mt-1">
                    <a wire:navigate href="{{route('application.list')}}"><i class="bi bi-arrow-left-circle-fill"></i> {{__('Back')}} </a>
                </h6>
                <h6 class="main_application mt-1">
                    <i class="bi bi-chevron-right"></i>
                </h6>
                <h6 class="main_application mt-1">
                    {{__('Applications')}}
                </h6>
                <h6 class="main_application mt-1">
                    <i class="bi bi-chevron-right"></i>
                </h6>
                <h6 class="main_application mt-1">{{__('Update')}} </h6>
                <button type="submit" class="btn btn-primary button_save">{{__('Update')}} </button>
            </div>
            <div class="card mt-3">
                <div class="card-body mt-3">
                    <!-- Client_section -->
                    <div class="row">
                        <p class="text_section text-dark mt-3 fw-semibold">{{__('Client Information')}}</p>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label fw-semibold">{{__('Client Full Name (Khmer)')}} <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('client_name_translate') is-invalid @enderror" wire:model="client_name_translate" placeholder="{{__('Enter Full Name (Khmer)')}}">
                            @error('client_name_translate') <span class="invalid-feedback">{{ __($message) }}</span> @enderror <br>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label class="form-label fw-semibold">{{__('Client Full Name (English)')}} </label>
                            <input type="text" class="form-control" wire:model="client_name" placeholder="{{__('Enter Full Name (English)')}}">
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <label class="form-label fw-semibold"> {{__('Gender')}} </label>
                            <select class="form-select form-select-lg" wire:model="gender">
                                <option value="Male">{{__('Male')}} </option>
                                <option value="Female">{{__('Female')}} </option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <label class="form-label text fw-semibold">{{__('Registered Date')}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker" wire:model="registration_date" placeholder="{{$registration_date}}" />
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <label class="form-label fw-semibold"> {{__('Khmer Identity Card')}} </label>
                            <input type="text" class="form-control @error('khmer_identity_card') is-invalid @enderror" wire:model="khmer_identity_card" placeholder="{{__('Khmer identity card')}}">
                            @error('khmer_identity_card') <small class="invalid-feedback">{{ __($message) }}</small> @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label fw-semibold">{{__('Phone Number')}} <small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model="phone" placeholder="{{__('Phone Number')}}">
                            @error('phone') <span class="invalid-feedback">{{ __($message) }}</span> @enderror <br>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <label class="form-label fw-semibold">{{__('Occupation')}} </label>
                            <select wire:model="occupation_id" class="form-select form-select-lg " aria-label="Default select occupation">
                                <option value="0">--{{__('Occupation')}}--</option>
                                @foreach($occupation as $occupat)
                                <option value="{{$occupat->id}}">{{get_translation($occupat)}} </option>
                                @endforeach
                            </select>
                            @error('occupation_id') <span class="invalid-feedback">{{ __($message) }}</span> @enderror <br>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <label class="form-label fw-semibold">{{__('Monthly Income')}} <small class="text-danger">*</small></label>
                            <select wire:model="income" class="form-select form-select-lg " aria-label="Monthky Income">
                                <option value="0">--{{__('Monthly Income')}}--</option>
                                <option value="<$150">
                                    < $150 </option>
                                <option value="$151->$300"> $151->$300</option>
                                <option value="$301->$500"> $301->$500</option>
                                <option value="$501->$700"> $501->$700</option>
                                <option value="$700->$1000"> $701->$1000</option>
                                <option value=">$1000"> >$1000 </option>
                            </select>
                            @error('income') <span class="invalid-feedback">{{ __($message) }}</span> @enderror <br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <!-- Address -->
                        <div class="col-lg-12 fw-semibold">
                            <span wire:click="addressModal" class="pointer" style="color: #034c72;">
                                @if(empty($city))
                                <i class="bi bi-plus-circle"></i> {{__('Address')}}
                                @else
                                {{__('Address')}}
                                <i class="bi bi-pencil-square"></i>
                                @endif
                            </span>
                        </div>
                        @if($city)
                        <div class="col-lg-12">
                            <div class="text-body-secondary fs-7">
                                {{ $village ? get_translation($village).',' : ''}}
                                {{ $commune ? get_translation($commune).',' : ''}}
                                {{ $district ? get_translation($district).',' : ''}}
                                {{ $city ? get_translation($city): ''}}
                            </div>

                            <div class="text-body-secondary fs-7">
                                {{$house_no ? __('House No.').' : '.$house_no : ''}}
                                {{$street_no ? __('Street No.').' : '.$street_no : ''}}
                            </div>

                            <div class="text-body-secondary fs-7">
                                {{$latitude ? __('Google Latitude (Optional)').' : '.$latitude : ''}}
                            </div>

                            <div class="text-body-secondary fs-7">
                                {{$longitude ? __('Google Longtitude').' : '.$longitude : ''}}
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- Product info -->
                    <div class="row">
                        <p class=" fs-12 fw-semibold">{{__('Product Information')}}</p>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="shop_id" class="form-label text fw-semibold">{{__('Shop Name')}} <small class="text-danger">*</small></label>
                            <select wire:model="shop_id" class="form-select form-select-lg @error('shop_id') is-invalid @enderror ">
                                <option value="">--{{__('Choose Shop')}}--</option>
                                @foreach($shops as $shop)
                                <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                @endforeach
                            </select>
                            @error('shop_id') <span class="invalid-feedback">{{__($message) }}</span> @enderror <br>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label text fw-semibold">{{__('Product Name')}} <small class="text-danger">*</small></label>
                            <select wire:model="product_id" wire:change="FilterProduct($event.target.value)" class="form-select form-select-lg " aria-label="select product">
                                <option value="">--{{__('Choose Product')}}--</option>
                                @foreach($product as $prod)
                                <option value="{{$prod->id}}" wire:model="product_id">{{$prod->title}}</option>
                                @endforeach
                            </select>
                            @error('product_id') <span class="error text-danger"> {{ __($message) }}</span> @enderror <br>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <label for="condition" class="form-label text fw-semibold">{{__('Condition')}}<small class="text-danger">*</small></label>
                            <select wire:model="condition" class="form-select form-select-lg @error('condition') is-invalid @enderror" aria-label="select condition">
                                <option value="">--{{__('Choose Condition')}}--</option>
                                <option value="New">{{__('New')}}</option>
                                <option value="Used">{{__('Used')}}</option>
                            </select>
                            @error('conditions') <span class="invalid-feedback">{{ __($message) }}</span> @enderror <br>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                            <label class="form-label text fw-semibold">{{__('Price')}} <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" wire:model="product_price" placeholder="Enter amount" value="{{$product_price}}">
                        </div>
                    </div>
                    <!-- channel & MFI & Co -->
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
                            <select class="form-select form-select-lg @error('loan_company_id') is-invalid @enderror" wire:change="selectMFI('mfi', $event.target.value)" wire:model="loan_company_id">
                                <option value="0">{{__('Choose')}}</option>
                                @foreach ($mfi as $m )
                                <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                            @error('loan_company_id') <small class="invalid-feedback">{{ __($message) }}</small> @enderror
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold">{{__('Select CO')}} <small class="text-danger">*</small></label>
                            <select wire:model="co_id" class="form-select @error('agency_id') is-invalid @enderror" id="selectedByAgency" style="width: 100%;">
                                <option value="">--{{__('Choose')}}--</option>
                                @foreach ($co as $c )
                                <option value="{{$c->id}}">{{$c->full_name}}</option>
                                @endforeach
                            </select>
                            @error('co_id') <small class="invalid-feedback"> {{ __($message) }}</small> @enderror
                        </div>
                    </div>
                    <!-- Guarantor -->
                    <div class="row mt-3">
                        <div class="col">
                            <span wire:click="guarantorModal" class="pointer w-100 fw-semibold" style="color: #034c72;">
                                @if(empty($guarantor_name))
                                <i class="bi bi-plus-circle"></i> {{__('Guarantor')}}
                                @else
                                {{__('Guarantor')}} <i class=" bi bi-pencil-square"></i>
                                @endif
                            </span>
                        </div>
                        @if($guarantor_name)
                        <div class="col-lg-12">
                            <small class="text-body-secondary fs-7">{{__('Full Name')}} : </small>
                            <small class=" text-body-secondary fs-7">{{$guarantor_name ?? ''}}</small> <br>
                        </div>
                        @endif
                        @if($guarantor_name_translate)
                        <div class="col-lg-12">
                            <small class="text-body-secondary fs-7">{{__('Full Name (English)')}} : </small>
                            <small class=" text-body-secondary fs-7 justify-content-start">{{$guarantor_name_translate ?? ''}}</small> <br>
                        </div>
                        @endif
                        @if($guarantor_phone)
                        <div class="col-lg-12">
                            <small class="text-body-secondary fs-7">{{__('Phone Number')}} : </small>
                            <small class=" text-body-secondary fs-7">{{$guarantor_phone ?? ''}}</small> <br>
                        </div>
                        @endif
                    </div>
                    <!-- Social media -->
                    <div class="row mt-3">
                        <span wire:click="mediaShow" class="p-2 w-100 fw-semibold" style="color: #034c72;">
                            <i class="bi bi-plus-circle"></i> {{__('Social Media')}}
                        </span>
                        @if($client_facebook_name)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold">{{__('Facebook')}}</label>
                            <input type="text" class="form-control " wire:model="client_facebook" placeholder="{{trans('translations.enter')}}" value="{{old('client_facebook')}}">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- Addres Modal -->
    <div wire:ignore.self class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{__('Edit Address')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('livewire.sales.applications.addressmodal')
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" wire:click="saveAddress" class=" btn btn-primary button_save" data-bs-dismiss="modal">{{__('Save')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Guarantor Modal -->
    <div wire:ignore.self class="modal fade" id="guarantorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{__('Guarantor')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('livewire.sales.applications.guarantormodal')
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" wire:click="updateGuarantor" class=" btn btn-primary button_save" data-bs-dismiss="modal">{{__('Save')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    jQuery('#datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        language: 'XX',
        uiLibrary: 'bootstrap5',
        format: "yyyy-mm-dd",
        minDate: '-12m',
        maxDate: '0',
    });

    jQuery('#datepicker').on('change', function(e) {
        @this.set('registration_date', jQuery(this).val());
    });

    Livewire.on('loadAgency', postId => {
        jQuery(document).ready(function() {
            jQuery('#selectedByAgency').select2();
        });
    })

    jQuery(document).ready(function() {
        jQuery('#selectedByAgency').select2();
        jQuery('#selectedByAgency').on('change', function(e) {
            @this.set('co_id', jQuery(this).val());
        });
    });
</script>
@endpush