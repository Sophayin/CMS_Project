<div wire:ignore.self class="modal fade" id="openModalUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form wire:submit.prevent="submit_update_occupation">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text fw-semibold">{{__('Edit Co')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="text fw-semibold">{{__('Full Name (English)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Full Name')}}">
                            @error('name') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label class="text fw-semibold">{{__('Full Name (Khmer)')}} <small class="text-danger">*</small></label>
                            <input type="text" wire:model="languages.name" class="form-control @error('languages.name') is-invalid @enderror" placeholder="{{__('Full Name')}}">
                            @error('langauges.name') <small class="invalid-feedback">{{__($message)}}</small> @enderror
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
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