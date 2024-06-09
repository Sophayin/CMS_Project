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
                    <th colspan="13" style="border:none; font-size: 15px;padding-bottom: 15px">
                        <h3 style="color: blue;">{{ __('Co List') }}</h3>
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
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Khmer Identity Card')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Phone')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Telegram')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Gender')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Age')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Occupation')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Income')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Status')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Date of Birth')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">{{__('Loan Company')}}</th>
                    <th class="text-center text-secondary text-sm opacity-7">
                        <nobr>{{__('Remark')}}</nobr>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($Colist as $i => $co)
                <tr class="text text-center">
                    <td class="text-secondary text-sm index-id">
                        {{$co->id}}
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->full_name}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">{{$co->full_name_translate}}</td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->khmer_identity_card}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->phone}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->phone_telegram}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->gender}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->age}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->occupation->name}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->income}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->status}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>
                            <?php $getDob = json_decode($co->date_of_birth, true); ?>
                            @if(!empty($getDob))
                            <small>{{ $getDob['day']}} {{ $getDob['month']}} {{$getDob['year'] }}</small>
                            @endif
                        </nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->loan_company->name}}</nobr>
                    </td>
                    <td class="text-secondary text-sm">
                        <nobr>{{$co->remark}}</nobr>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <htmlpagefooter name="page-footer">

    </htmlpagefooter>
</div>