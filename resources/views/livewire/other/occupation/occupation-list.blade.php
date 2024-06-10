<div>
    <section class="section">
        <div class="col col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="d-flex mb-3 justify-content-between">
                <div class=" d-flex">
                    <h6 class="text fw-semibold mt-3">{{__('Product List')}}</h6>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="p-2">
                        <div class="col-lg-12 col-sm-6">
                            <a wire:click="addOccupation">
                                <button class="btn btn-primary button_addnew ">
                                    <i class="bi bi-plus-circle"></i>
                                    {{__('Add New')}}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row mt-1 p-3">
                    <div class="col-lg-3 mb-2">
                        <input class="form-control input_search " placeholder="{{__('Type Search...')}}" type="search" wire:model.live="search">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-sm">{{__('No.')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Full Name (English)')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Full Name (Khmer)')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Description')}}</th>
                                    <th width="89" class="text-center text-secondary text-sm">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($occupation_list as $i => $item)
                                <tr style="vertical-align: middle;" class="text-center">
                                    <td class="text-sm  text-center index-id">{{++$i}}</td>
                                    <td class="text-sm">{{$item->name}}</td>
                                    <td class="text-sm">
                                        <?php $khmerName = json_decode($item->languages, true); ?>
                                        @if(!empty($khmerName) )
                                        <nobr>{{ $khmerName['name'] }}</nobr>
                                        @endif
                                    </td>
                                    <td class="text-sm">{{$item->description}}</td>
                                    <td class="text-center">
                                        <a style="border-color:transparent;" wire:click="updateOccupation({{$item->id}})" class="rounded-pill btn btn-sm btn btn-outline-success">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a style=" border-color:azure;" wire:click="deleteOccupation({{ $item->id }})" class="rounded-pill btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($occupation_list->count())
                        <div class="col-sm-1" style="width: 90px;">
                            <select class="form-select" wire:model.live="limit" aria-label="Default">
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        @else
                        {{$occupation_list->links('livewire.customer-pagination')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal delete-->
    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="text-danger text-center">
                        <h5>{{__('Are you sure, You want to delete this ?')}}</h5>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary button_save" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="button" wire:click="confirmDelete" class="btn btn-danger delete">{{__('Delete')}}</button>
                </div>
            </div>
        </div>
    </div>
    @livewire('other.occupation.create-occupation')
    @livewire('other.occupation.update-occupation')

</div>