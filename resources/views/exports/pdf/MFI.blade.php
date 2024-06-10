<div>
    <style>
        table,
        td {
            justify-content: center;
            border: 1px solid gray;
            border-collapse: collapse;
            font-size: 12px;
            color: gray;
            text-align: center;
        }

        th {
            border: 1px solid grey;
            font-size: 12px;
            color: gray;
            width: 100%;
        }
    </style>
    <div class="table-responsive">
        <table class="table" style="border:none;">
            <thead>
                <tr style="border:none;">
                    <th colspan="6" style="border:none; font-size: 15px;padding-bottom: 15px">
                        <h3 style="color: blue;">{{ __('MFI List') }}</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="7" style="border:none; font-size: 12px;padding-bottom: 10px"></th>
                </tr>
                <tr class="text_header">
                    <th class="text-center text-secondary text-sm opacity-7">
                        {{__('No.')}}
                    </th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Name')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Name (Khmer)')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">
                        <nobr>{{__('Phone')}}</nobr>
                    </th>
                    <th class="text-center text-secondary text-sm opacity-7">
                        <nobr>{{__('Telegram')}}</nobr>
                    </th>
                    <th class="text-center text-secondary text-sm opacity-7">
                        <nobr>{{__('Description')}}</nobr>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($MFI as $M)
                <tr class="text text-center">
                    <td class="text-secondary text-sm index-id">
                        {{$M->id}}
                    </td>
                    <td class="text-secondary text-sm">{{$M->name}}</td>
                    <td class="text-secondary text-sm">
                        <nobr>
                            <!-- <?php $getkhmer = json_decode($M->languages, true); ?>
                            @if(!empty($getkhmer) )
                            <small>{{ $getkhmer['name'] }}</small>
                            @endif -->
                            {{$M->name_translate}}
                        </nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$M->phone}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$M->telegram}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$M->description}}</nobr>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <htmlpagefooter name="page-footer">

    </htmlpagefooter>
</div>