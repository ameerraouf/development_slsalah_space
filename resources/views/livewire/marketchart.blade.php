<div>
    <div class="row">
        <div style="text-align: center;">
            <h4 style="display: inline-block;">حجم السوق</h4>
        </div>
        <div class="w-full" style="height: 50%; width:80%; margin-top: 5%; float:right">
            <div>
                @foreach ($markets as $index => $market)
                    <p>حجم السوق في سنة {{ $myear[$index] }}  يبلغ  {{ $msize[$index] }} {{ $munit[$index] == 'million' ? 'مليون' : 'مليار' }} ريال</p>
                @endforeach
            </div>
            <div class="w-full" style="height: 100%;" id="chart"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        {{-- @if ($size && $size2 && $size3 && $size4 && $size5) --}}
        @if ($msize)
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
                                x: '{{ $myear[0] }}',
                                y: {{ $msize[0] }}
                            }, {
                                x: '{{ $myear[1] }}',
                                y: {{ $msize[1] }}
                            }, {
                                x: '{{ $myear[2] }}',
                                y: {{ $msize[2] }}
                            },{
                                x: '{{ $myear[3] }}',
                                y: {{ $msize[3] }}
                            },{
                                x: '{{ $myear[4] }}',
                                y: {{ $msize[4] }}
                            }]
                    }]
                }
                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            </script>
        @else
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
                                x: '2024',
                                y: 0
                            }, {
                                x: '2025',
                                y: 0
                            }, {
                                x: '2026',
                                y: 0
                            },{
                                x: '2027',
                                y: 0
                            },{
                                x: '2028',
                                y: 0
                            }]
                    }]
                }
                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            </script>
        @endif

    
</div>
