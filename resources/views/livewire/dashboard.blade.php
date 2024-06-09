<div>
    <section class="section">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <h6 class="mt-2 p-1">{{__('Welcome To')}} {{$user->name}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-2">
            <!-- Date -->
            <p>{{__('Date')}} </p>

            <div class="col-lg-12 d-flex">
                <div class="input">
                    <input type="date" class=" form-control" id="start_date" wire:model.live="start_date" />
                </div>
                <div class="input mt-2">
                    <i class="bi bi-arrow-right-short"></i>
                </div>
                <div class="input">
                    <input type="date" class=" form-control" id="end_date" wire:model.live="end_date" />
                </div>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <div class="row">
                        <div class="col-12">
                            <p class="pt-2 pointer" style="margin-left: 10px;">{{__('Top Shop')}} <i class="bi bi-chevron-down"></i></p>
                            @foreach ($shops as $shop )
                            <div class="d-flex border-bottom">
                                <div class="p-2 flex-grow-1 d-flex">
                                    <div class="sign"></div><small>{{$shop->shop_name}}</small>
                                </div>
                                <div class="p-2"><small>{{$shop->applications_count}}</small></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-4">
                <div class="card">
                    <p class="pt-2 pointer" style="margin-left: 10px;">{{__('Top Product')}}<i class="bi bi-chevron-down"></i></p>
                    @foreach ($products as $product )
                    <div class="d-flex border-bottom">
                        <div class="p-2 flex-grow-1 d-flex">
                            <div class="sign"></div><small>{{$product->title}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card">
                    <p class="pt-2 pointer" style="margin-left: 10px;">{{__('Recent Activities')}}<i class="bi bi-chevron-down"></i></p>
                    @foreach ($latestActions as $actions )
                    <div class="d-flex border-bottom">
                        <div class="p-2 flex-grow-1 d-flex">
                            <div class="sign"></div><small>{{$actions->action}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>