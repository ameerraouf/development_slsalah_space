<div>
    @if ($currentStep != 11)
        <div style="display: none" class="row setup-content" id="step-5">
    @endif
            <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto text-center">
                            <h3 class="text-dark">الخطه الماليه</h3>
                        </div>
                        {{-- <div class="col-md-12">
                                <img src="{{ asset('11.png') }}" alt="" style="width: 600px;">
                        </div> --}}
                        <div style="height: 50%; width: 50%">
                            <div class="col-md-12 mx-auto text-center">
                                <h5 class="text-dark">تطور الإيرادات السنوية</h5>
                            </div>
                            <div class="w-full" style="height: 50%;" id="chart1"></div>
                        </div>
                        <div style="height: 50%; width: 50%">
                            <div class="col-md-12 mx-auto text-center">
                                <h5 class="text-dark">تطور صافي الأرباح</h5>
                            </div>
                            <div class="w-full" style="height: 50%;" id="chart2"></div>
                        </div>
                    </div>
                    <button class="btn btn-warning mt-3" type="button" wire:click="back(10)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-3" type="button" wire:click="elevenStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                var options = {
                    chart: {
                        type: 'bar'
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false
                        }
                    },
                    series: [{
                        data: [{
                                x: 'السنة الأولى',
                                y: {{ $all_revenues_forecasting['first_year'] }}
                            }, {
                                x: 'السنة الثانية',
                                y: {{ $all_revenues_forecasting['second_year'] }}
                            }, {
                                x: 'السنة الثالثة',
                                y: {{ $all_revenues_forecasting['third_year'] }}
                            }]
                    }]
                }
                var chart = new ApexCharts(document.querySelector("#chart1"), options);
                chart.render();
            </script>            
            <script>
                var options = {
                    chart: {
                        type: 'bar'
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false
                        }
                    },
                    colors: ['#F44336', '#E91E63', '#9C27B0'],
                    series: [{
                        data: [{
                                x: 'السنة الأولى',
                                y: {{ $calc_total['net_profit_first_year_as_number'] }},
                            }, {
                                x: 'السنة الثانية',
                                y: {{ $calc_total['net_profit_second_year_as_number'] }}
                            }, {
                                x: 'السنة الثالثة',
                                y: {{ $calc_total['net_profit_third_year_as_number'] }},
                            }]
                    }]
                }
                var chart = new ApexCharts(document.querySelector("#chart2"), options);
                chart.render();
            </script>            
        </div>


</div>