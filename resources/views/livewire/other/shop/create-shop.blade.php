<div wire:ignore.self class="modal fade" id="openModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class=" modal-dialog modal-xl">
        <form wire:submit.prevent="createShop">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text fw-semibold">{{__('Add New Shop')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Shop Name (English)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="shop_name" class="form-control @error('shop_name') is-invalid @enderror" placeholder="{{__('Shop Name (English)')}}">
                            @error('shop_name') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4">
                            <label for="" class="text fw-semibold">{{__('Shop Name (Khmer)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="shop_name_translate" class="form-control @error('shop_name_translate') is-invalid @enderror" placeholder="{{__('Shop Name (Khmer)')}}">
                            @error('shop_name_translate') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Owner')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="owner" class="form-control @error('owner') is-invalid @enderror" placeholder="{{__('Owner')}}">
                            @error('owner') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Phone Number')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{__('Phone Number')}}">
                            @error('phone') <small class="invalid-feedback">{{__($message)}}</small> @enderror

                        </div>
                        <div class="col-4">
                            <label for="" class="text fw-semibold">{{__('Telegram')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="{{__('Telegram')}}">
                            @error('telephone') <small class="invalid-feedback">{{__($message)}}</small> @enderror

                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Abbreviation')}}</label>
                            <input type="text" wire:model="abbreviation" class="form-control" placeholder="{{__('Abbreviation')}}">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Post Code')}}</label>
                            <input type="text" wire:model="post_code" class="form-control" placeholder="{{__('Post Code')}}">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="text fw-semibold">{{__('Shop Code')}}</label>
                            <input type="text" wire:model="code" class="form-control" placeholder="{{__('Shop Code')}}">
                        </div>
                        <div class="col-4">
                            <label for="" class="text fw-semibold">{{__('Facebook page')}}</label>
                            <input type="text" wire:model="facebook_page" class="form-control" placeholder="{{__('Facebook page')}}">
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <label for="text" class="form-label text fw-semibold">{{__('Description')}} </label>
                            <textarea type="text" class="form-control" wire:model="description" placeholder="{{__('Type here...')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" wire:click="createShop" class=" btn btn-primary button_save">{{__('Create')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>