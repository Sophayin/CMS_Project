<div wire:ignore.self class="modal fade" id="openModalUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl ">
        <form wire:submit.prevent="updateUser">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Staff Update')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            Hello Shop
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary button_save">{{__('Save')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>