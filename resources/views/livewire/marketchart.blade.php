<div>
    <div class="row">
        <div class="w-full" style="height: 50%;">
            <div class="w-full" style="height: 50%;" id="chart"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        {{-- @if ($size && $size2 && $size3 && $size4 && $size5) --}}
        @if ($msize[0] && $msize[1] && $msize[2] && $msize[3] && $msize[4])
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
