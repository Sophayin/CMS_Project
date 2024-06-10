<div wire:ignore.self class="modal fade" id="openModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class=" modal-dialog modal-xl">
        <form wire:submit.prevent="createCo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text fw-semibold">{{__('Add New CO')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="text" class="form-label text fw-semibold"><i class="bi bi-person-lines-fill" style="margin-right: 5px;"></i>{{__('Information')}}</label>
                        <div class="col-lg-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Full Name (English)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="full_name" class="form-control @error('full_name') is-invalid @enderror" placeholder="{{__('Full Name (English)')}}">
                            @error('full_name') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="text fw-semibold">{{__('Full Name (Khmer)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="full_name_translate" class="form-control @error('full_name_translate') is-invalid @enderror" placeholder="{{__('Full Name (Khmer)')}}">
                            @error('full_name_translate') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <!-- Date of Birth -->
                        <div class="col-lg-4">
                            <label for="date_of_birth" class="form-label text fw-semibold">{{__('Date of Birth')}}</label>
                            <div class="row d-flex" style="margin-top: -7px;">
                                <div class="col-lg-4">
                                    <select class="form-select form-select-lg" wire:model="date_of_birth.day">
                                        <option value="">--{{__('Day')}}--</option>
                                        @foreach ($getDays as $day)
                                        <option value="{{ $day }}">{{ $day }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select class="form-select form-select-lg" wire:model="date_of_birth.month">
                                        <option value="">--{{__('Month')}}--</option>
                                        @foreach ($getMonth as $month)
                                        <option value="{{ $month }}">{{__($month) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select class="form-select form-select-lg" wire:model.live="selectedYear" wire:model="date_of_birth.year">
                                        <option value="">--{{__('Year')}}--</option>
                                        @foreach ($getYears as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="text fw-semibold">{{__('Age')}} </label>
                            <input type="text" wire:model="age" class="form-control" placeholder="{{__('Age')}}">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="text fw-semibold">{{__('Gender')}} </label>
                            <select wire:model="gender" class="form-control form-select form-select-lg">
                                <option value="Male">{{__('Male')}}</option>
                                <option value="Female">{{__('Female')}}</option>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Khmer Identity Card')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="khmer_identity_card" class="form-control @error('khmer_identity_card') is-invalid @enderror" placeholder="{{__('Khmer Identity Card')}}">
                            @error('khmer_identity_card') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Phone Number')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{__('Phone Number')}}">
                            @error('phone') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4">
                            <label for="" class="text fw-semibold">{{__('Telegram')}} </label>
                            <input type="text" wire:model="phone_telegram" class="form-control" placeholder="{{__('Telegram')}}">

                        </div>
                        <div class="col-2 mb-3">
                            <label for="" class="text fw-semibold">{{__('Occupation')}}</label>
                            <select wire:model="occupation_id" class="form-control form-select form-select-lg">
                                <option value="">--{{__('Choose')}}--</option>
                                @foreach ($occupations as $occupation )
                                <option value="{{$occupation->id}}">{{get_translation($occupation)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="" class="text fw-semibold">{{__('Income')}}</label>
                            <select class="form-select form-select-lg" aria-label="Default select example" wire:model="income">
                                <option value="0">--{{__('Choose Income')}}--</option>
                                <option value="N/A">N/A</option>
                                <option value="<$150">&nbsp; <$150 </option>
                                <option value="$151-$300">$151-$300</option>
                                <option value="$301-$500">$301-$500</option>
                                <option value="$501-$700">$501-$700</option>
                                <option value="$701-$1000">$701-$1000</option>
                                <option value="> $1000"> >$1000 </option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="text fw-semibold">{{__('Loan Company')}} <small class="text-danger">*</small></label>
                            <select wire:model="loan_company_id" class="form-control form-select form-select-lg @error('loan_company_id') is-invalid @enderror">
                                <option value="">--{{__('Choose')}}--</option>
                                @foreach ($loan_companies as $loan )
                                <option value="{{$loan->id}}">{{$loan->name}}</option>
                                @endforeach
                            </select>
                            @error('loan_company_id') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label for="text" class="form-label text fw-semibold"><i class="bi bi-house-add-fill" style="margin-right: 5px;"></i>{{__('Address')}}</label>
                        <div class="row d-flex">
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                                <label for="text" class="form-label fw-semibold">{{__('City')}}</label>
                                <select wire:change="onChange('city', $event.target.value)" wire:model="city_id" class="form-select form-select-lg @error('city_id') is-invalid @enderror">
                                    <option value="">--{{__('Choose City')}}--</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">
                                        {{get_translation($city)}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('city_id') <small class="fw-light text-danger">{{__($message)}}</small> @enderror
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                <label for="exampleFormControlInput1" class="form-label fw-semibold">{{__('District')}} </label>
                                <select wire:change="onChange('district', $event.target.value)" wire:model="district_id" class="form-select form-select-lg @error('district_id') is-invalid @enderror">
                                    <option value="">--{{__('Choose District')}}--</option>
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}">
                                        {{get_translation($district)}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('district_id') <small class="fw-light text-danger">{{__($message)}}</small> @enderror
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                <label for="" class="form-label fw-semibold">{{__('Commune')}} </label>
                                <select wire:change="onChange('commune', $event.target.value)" wire:model="commune_id" class=" form-select form-select-lg @error('commune_id') is-invalid @enderror" aria-label="Default select example">
                                    <option selected value="">--{{__('Choose Commune')}}--</option>
                                    @foreach($communes as $commune)
                                    <option value="{{$commune->id}}">
                                        {{get_translation($commune)}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('commune_id') <small class="fw-light text-danger">{{__($message)}}</small> @enderror
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label fw-semibold">{{__('Village')}}</label>
                                <select wire:model="village_id" class="form-select form-select-lg" aria-label="Choose Village">
                                    <option selected value="">--{{__('Choose Village')}}--</option>
                                    @foreach($villages as $village)
                                    <option value="{{$village->id}}">
                                        {{get_translation($village)}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('village_id') <small class="fw-light text-danger">{{__($message)}}</small> @enderror
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label class="form-label text">{{__('House No.')}}</label>
                                <input type="text" class="form-control" wire:model="house_no" placeholder="{{__('House No.')}}">
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-12 mb-2">
                                <label class="form-label text">{{__('Street No.')}}</label>
                                <input type="text" class="form-control" wire:model="street_no" placeholder="{{__('Street No.')}}" />
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 mt-2">
                            <label for="text" class="form-label text fw-semibold">{{__('Remark')}} </label>
                            <textarea type="text" class="form-control" wire:model="remark" placeholder="{{__('Type here...')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" wire:click="createCo" class=" btn btn-primary button_save">{{__('Create')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>