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
                    <th colspan="5" style="border:none; font-size: 15px;padding-bottom: 15px">
                        <h3 style="color: blue;">{{ __('Channel List') }}</h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="7" style="border:none; font-size: 12px;padding-bottom: 10px"></th>
                </tr>
                <tr class="text_header">
                    <th class="text-center text-secondary text-sm opacity-7">
                        {{__('No.')}}
                    </th>
                    <th class="text-center text-secondary text-sm opacity-7">
                        <nobr>{{__('Full Name (English)')}}</nobr>
                    </th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Full Name (Khmer)')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">
                        <nobr>{{__('Remark')}}</nobr>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($channellist as $i => $chalist)
                <tr class="text text-center">
                    <td class="text-secondary text-sm index-id">
                        {{$chalist->id}}
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$chalist->title}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>
                            <?php $khname = json_decode($chalist->languages, true); ?>
                            @if(!empty($khname))
                            <small>{{ $khname['name']}}</small>
                            @endif
                        </nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$chalist->description}}</nobr>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <htmlpagefooter name="page-footer">

    </htmlpagefooter>
</div>