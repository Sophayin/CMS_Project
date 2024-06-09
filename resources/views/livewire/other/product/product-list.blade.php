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
                            <a wire:click="addProduct">
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
                                    <th class="text-center text-secondary text-sm">{{__('Code')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Product Name')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Year of Manufacture')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Condition')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Price')}}</th>
                                    <th class="text-center text-secondary text-sm">{{__('Description')}}</th>
                                    <th width="89" class="text-center text-secondary text-sm">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_list as $i => $item)
                                <tr style="vertical-align: middle;" class="text-center">
                                    <td class="text-sm  text-center index-id">{{++$i}}</td>
                                    <td class="text-sm">{{$item->code}}</td>
                                    <td class="text-sm">{{$item->title}}</td>
                                    <td class="text-sm">{{$item->year_of_manufacture}}</td>
                                    <td class="text-sm">{{__($item->condition)}}</td>
                                    <td class="text-sm text-end">${{number_format($item->price, 2)}}</td>
                                    <td class="text-sm">{{$item->description}}</td>
                                    <td class="text-center">
                                        <a style="border-color:transparent;" wire:click="editProduct({{$item->id}})" class="rounded-pill btn btn-sm btn btn-outline-success">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a style=" border-color:azure;" wire:click="deleteProduct({{ $item->id }})" class="rounded-pill btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal delete document-->
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
        @livewire('other.product.edit-product')
        @livewire('other.product.create-product')
    </section>
</div>