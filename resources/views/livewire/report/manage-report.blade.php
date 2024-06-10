<div>
    <?php

    use App\Models\Department;
    use Illuminate\Support\Facades\Request;

    $department = Department::where('slug', '/' . Request::path('/'))->first();
    ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-5">
                <div class="card ">
                    <ul class="p-0">
                        @foreach($department->children as $item)
                        <li class="d-flex ">
                            <a wire:navigate href="{{$item->slug}}" class="daily-sale text">
                                {!! $item->icon !!}
                                <span> {{get_translation($item)}} </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>