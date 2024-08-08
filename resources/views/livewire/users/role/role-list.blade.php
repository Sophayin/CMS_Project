<div>
    @if($apply === 'role-apply-permission')
    @livewire('users.role.role-apply-permission', ['role_id'=>$role_id])
    @else
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mt-3">
                            <h5>{{__('Role List')}}</h5>
                            <a wire:click="create_role_modal" class="button_addnew btn btn-primary">
                                <i class="bi bi-plus-circle"></i>
                                {{__('Add New')}}
                            </a>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-sm-3">
                                <input type="text" class="form-control" wire:model.live="search" placeholder="{{__('Type Search...')}}">
                            </div>
                        </div>
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th width="30" class="text-center text-secondary text-sm opacity-7">{{__('No.')}}</th>
                                    <th class="text-center text-secondary text-sm opacity-7">{{__('Title')}}</th>
                                    <th class="text-center text-secondary text-sm opacity-7">{{__('Description')}}</th>
                                    <th width="90" class=" text-secondary text-sm opacity-7">{{__('Status')}}</th>
                                    <th width="90" class="text-center text-secondary text-sm opacity-7">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 1; ?>
                                @foreach($roles as $key => $item)
                                <tr style="vertical-align:middle">
                                    <td class="text-sm">{{$n++}}</td>
                                    <td class="text-sm text-center">{{$item->name}}</td>
                                    <td class="text-sm">{{$item->description}}</td>
                                    <td class="text-sm">{{$item->status ? __("Active") : __("Inactive")}}</td>
                                    <td class="text-center">
                                        <a style="border-color:azure;" wire:click="apply_role_permission({{$item->id}})" class="rounded-pill btn btn-sm btn-outline-secondary">
                                            <svg width="16px" height="18px" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.0489 6.28202C10.2929 6.28202 10.5298 6.31073 10.7667 6.34662V2.88693L5.38333 0.539795L0 2.88693V6.41122C0 9.66993 2.29689 12.7205 5.38333 13.4598C5.77811 13.3665 6.15854 13.2301 6.53178 13.065C6.03651 12.3616 5.74222 11.5074 5.74222 10.5887C5.74222 8.21284 7.67305 6.28202 10.0489 6.28202Z" fill="currentColor"></path>
                                                <path d="M10.0503 7.71802C8.46402 7.71802 7.1792 9.00284 7.1792 10.5891C7.1792 12.1754 8.46402 13.4602 10.0503 13.4602C11.6366 13.4602 12.9214 12.1754 12.9214 10.5891C12.9214 9.00284 11.6366 7.71802 10.0503 7.71802ZM10.0503 8.70855C10.4953 8.70855 10.8542 9.07462 10.8542 9.51246C10.8542 9.95031 10.4882 10.3164 10.0503 10.3164C9.61247 10.3164 9.2464 9.95031 9.2464 9.51246C9.2464 9.07462 9.60529 8.70855 10.0503 8.70855ZM10.0503 12.563C9.38278 12.563 8.80138 12.2328 8.44249 11.7232C8.47838 11.2064 9.52633 10.948 10.0503 10.948C10.5743 10.948 11.6222 11.2064 11.6581 11.7232C11.2992 12.2328 10.7178 12.563 10.0503 12.563Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <a style="border-color:azure;" wire:click="edit_role({{ $item->id }})" class="rounded-pill btn btn-sm btn btn-outline-success">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row  mb-3 mt-3">
                            <div class="col">
                                {{$roles->links('livewire.customer-pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @livewire('users.role.role-create')
    @livewire('users.role.role-update')
    @endif
</div>