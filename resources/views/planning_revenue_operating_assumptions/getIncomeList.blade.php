@extends('layouts.primary')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card card-body mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row">
                        <p>قائمة الدخل</p>
                    </div>
                    @if ($planningRevenueOperatingAssumptions)
                        <x-revenue-after-operating-assumptions></x-revenue-after-operating-assumptions>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('costs')}}</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('first_year')}}</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('second_year')}}</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('third_year')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td style="text-align: center">مصروفات تشغيلية</td>
                                        <td class="first_year">{{ $calc_total['first_year_operating_expenses_as_string']}}</td>
                                        <td class="second_year">{{ $calc_total['second_year_operating_expenses_as_string'] }}</td>
                                        <td class="third_year">{{ $calc_total['third_year_operating_expenses_as_string'] }}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">مصروفات عمومية</td>
                                        <td class="first_year">{{ $calc_total['first_year_operating_general_as_string'] }}</td>
                                        <td class="second_year">{{ $calc_total['second_year_operating_general_as_string'] }}</td>
                                        <td class="third_year">{{ $calc_total['third_year_operating_general_as_string']}}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">مصروفات تسويقية</td>
                                        <td class="first_year">{{ $calc_total['first_year_operating_marketing_as_string'] }}</td>
                                        <td class="second_year">{{$calc_total['second_year_operating_marketing_as_string']}}</td>
                                        <td class="third_year">{{ $calc_total['third_year_operating_marketing_as_string'] }}</td>
                                    </tr>
                                    <tr style="border-bottom: 5px;">
                                        <td style="text-align: center;">{{__('إجمالى المصروفات')}}</td>
                                        <td id="first_year_total">{{$calc_total['total_cost_first_year_as_string']}}</td>
                                        <td id="second_year_total">{{$calc_total['total_cost_second_year_as_string']}}</td>
                                        <td id="third_year_total">{{$calc_total['total_cost_third_year_as_string']}}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">{{__('yearly_profit_before_zakat')}}</td>
                                        <td>
                                            @if($calc_total['first_year_profit_before_zakat_as_number'] < 0 )
                                                <span class="text-danger"> {{$calc_total['first_year_profit_before_zakat']}}</span>
                                            @else
                                                {{ $calc_total['first_year_profit_before_zakat'] }}
                                            @endif

                                        </td>
                                        <td>
                                            @if($calc_total['second_year_profit_before_zakat_as_number'] < 0 )
                                                <span class="text-danger">0 </span>
                                            @else
                                                {{ $calc_total['second_year_profit_before_zakat'] }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($calc_total['third_year_profit_before_zakat_as_number'] < 0 )
                                                <span class="text-danger">0 </span>
                                            @else
                                                {{ $calc_total['third_year_profit_before_zakat'] }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">{{__('net_zakat_value')}}</td>
                                        <td style="text-align: center;" >
                                            @if($calc_total['first_year_profit_before_zakat_as_number'] < 0 )
                                                <span class="text-danger"> 0</span>
                                            @else
                                                {{ $calc_total['first_year_profit_before_zakat_percent_value'] }}
                                            @endif
                                        </td>
                                        <td style="text-align: center;" id="second_year_profit_before_zakat_percent_value"></td>
                                        <td style="text-align: center;" id="third_year_profit_before_zakat_percent_value"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;" >{{__('profit_after_zakat')}}</td>
                                        <td style="text-align: center;"  >
                                            {{$calc_total['first_year_profit_after_zakat']}}
                                        </td>
                                        <td style="text-align: center;"  >
                                            {{$calc_total['second_year_profit_after_zakat']}}
                                        </td>
                                        <td style="text-align: center;"  >
                                            {{$calc_total['third_year_profit_after_zakat']}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        لا توجد بيانات
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@if ($planningRevenueOperatingAssumptions)
    @section('script')
        <script>
            $(document).ready(function(){
                $('#first_year_profit_before_zakat_percent_value').text('<?=$calc_total['first_year_profit_before_zakat_percent_value']?>');
                        $('#second_year_profit_before_zakat_percent_value').text('<?=$calc_total['second_year_profit_before_zakat_percent_value']?>');
                $('#third_year_profit_before_zakat_percent_value').text('<?=$calc_total['third_year_profit_before_zakat_percent_value']?>');
            });
        </script>
    @endsection
@endif

