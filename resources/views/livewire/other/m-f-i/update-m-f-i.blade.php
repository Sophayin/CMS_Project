<div wire:ignore.self class="modal fade" id="openModalUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form wire:submit.prevent="submit_update_MFI">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text fw-semibold">{{__('Edit Co')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="text fw-semibold">{{__('Full Name (English)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('name Name')}}">
                            @error('name') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label class="text fw-semibold">{{__('Full Name (Khmer)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="name_translate" class="form-control @error('name_translate') is-invalid @enderror" placeholder="{{__('name Name')}}">
                            @error('name_translate') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label class="text fw-semibold">{{__('Phone')}}</label>
                            <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{__('phone')}}">
                            @error('phone') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label class="text fw-semibold">{{__('Telegram')}}</label>
                            <input type="text" wire:model="telegram" class="form-control @error('telegram') is-invalid @enderror" placeholder="{{__('Telegram')}}">
                            @error('telegram') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <label class="form-label text fw-semibold">{{__('Description')}} </label>
                            <textarea type="text" class="form-control" wire:model="description" placeholder="{{__('Type here...')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class=" btn btn-primary button_save">{{__('Create')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>