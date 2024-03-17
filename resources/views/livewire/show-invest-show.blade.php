<div>
    <style>
        .card{
            width: 960px; 
            height: 540px;
        }
         #printButton {
        background: linear-gradient(to right, #ff6b6b, #ffa8a8);
        border-radius: 8px;
        }
        
        @media print {
            .bg-primary th {
                background-color: transparent !important;
                box-shadow: 0 0 0 1000px #095075 inset !important;
            }
        }
        .circled {
            border-radius: 50%;
            position: relative;
        }

                .pink {
        width: 250px;
        height: 250px;
        background-color: rgb(1, 0, 67);
        }

        .light-pink {
        width: 180px;
        height: 180px;
        background-color: rgb(18, 1, 128);
        position: absolute;
        top: 28%;
        left: 14%;
        /* transform: translate(-50%, -50%); */
        }

        .pale-pink {
        width: 130px;
        height: 130px;
        background-color: rgb(44, 20, 255);
        position: absolute;
        top: 28%;
        left: 14%;
        /* transform: translate(-50%, -50%); */
        }
        
    </style>
    <div class="container" id="prt-content">
        <div class="row">
            <div class="col-md-12" >
                <h4 style="text-align: center; font-weight: bold;">{{ __('investshow') }}</h4>
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <a class="btn btn-primary " href="#" target="_blank"  id="printButton">
                            <i class="fa fa-print"></i> {{ __('Print') }}
                        </a>
                    </div>
                </div>
                {{-- about company --}}
                <div class="card" style="background-image: url('{{ display_file($image5)}}'); ">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="cloudonex_table">
                            <thead>
                                <tr>
                                    <th><h4>{{ __('CompanyDesc') }}</h4></th>
                                    
                                </tr>
                            </thead>
                            <tbody class = "target-table">
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> <p>{!! $companydesc !!}</p> </h6>
                                                    <p class="text-xs text-secondary mb-0"></p>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                {{-- problems --}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('problems') }}</h3>
                            </div>
                            @foreach($problems as $key => $problem)
                            <div class="col-md-4  mt-5" >
                                <h5>{{ __('problem'.$key+1) }}</h5>
                                <h6>{{ $problem->summary??'' }}</p>
                            </div>                                                    
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
                {{-- solves --}}
                <div class=" card " style="background-image: url('{{ display_file($image2)}}');position:relative;">
                    <div class="container">
                        <div class="row" style="position:absolute; top: 150px">
                            <h4 style="text-align: center; font-weight: bold;">{{ __('solves') }}</h4>
                            @foreach($solves as $key => $solve)
                                <div class="col-md-4 mb-4">
                                    <h6>{{ __('solve'.$key+1) }}</h6>
                                    <h6>{{ $solve->title }}</h6>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                  <br>
                {{-- market --}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
                    <div class="container">
                        <h4 style="text-align: center; font-weight: bold;">{{ __('market') }}</h4>
                        @include('livewire.marketchart')
                    </div>
                </div>
                <br>
                {{-- products --}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('products') }}</h3>
                            </div>
                            @foreach($products as $key => $product)
                            <div class="col-md-4  mt-5" >
                                <label>{{ __('pname'.$key+1) }}</label>
                                <h6>{{ $product->title??'' }}</h6>
                                <label>{{ __('pdescription') }}</label>
                                <h6>{!! $product->description??'' !!}</h6>
                            </div>                                                    
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
                {{-- target --}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
                    <div class="container">
                        <h4 style="text-align: center; font-weight: bold;">{{ __('target') }}</h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mx-auto text-center">
                                </div>
                                <div class="col-md-12 mx-auto text-center">
                                    <div class="circled pink d-inline-block"><span class="text-center" style="color: white; position: absolute;top: 10%;left: 28%;" > {{ $TAM }} {{ $unitForChart }} SAR </span>
                                        <div class="circled light-pink text-center"><span style="color: white;position: absolute;top: 9%;left: 19%;" >{{ $SAM }} {{ $unitForChart }} SAR </span>
                                            <div class="circled pale-pink text-center"><span style="color: white;position: absolute;top: 33%;left: 5%;" >{{ $SOM }} {{ $unitForChart }} SAR </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                {{-- compatitive --}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('compatitive') }}</h3>
                            </div>
                            @foreach ($selectedCompat as $index => $compat)
                                <div class="col-md-4  mt-5" >
                                    <div class="col-md-4 mb-4">
                                        <h6>{{ $compat->title }}</h6>
                                        <h6>{!! $compat->description !!}</h6>
                                    </div>
                                    <br>
                                </div>
                            @endforeach                                                     
                        </div>
                    </div>
                </div>
                <br>
                {{-- team --}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('team') }}</h3>
                            </div>
                            @foreach ($selectedteam as $index => $team)
                                    <div class="col-md-3 mb-4">
                                        <h6>{{ $team->name }}</h6>
                                        <div>
                                            @if($team->image)
                                                <img src="{{display_file($team->image)}}" width='150' alt="">
                                            @else
                                                <img src="{{asset('no-image.jpg')}}" width='150' alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                            @endforeach                                                     
                        </div>
                    </div>
                </div>
                <br>
                {{-- competitors --}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('competitors') }}</h3>
                            </div>
                            @foreach ($selectedco as $index => $co)
                                    <div class="col-md-3 mb-4">
                                        <h6>{{ $co->companyname }}</h6>
                                        <div>
                                            <h6 class=" font-weight-bold mb-0">سعر المنتح</h6>
                                            <span style="color:{{ $co->price?'':'red' }} ">
                                                <i class="fas fa-{{ $co->price?'check-circle':'times-circle' }}"></i>
                                            </span>
                                        </div>
                                        <div>
                                            <h6 class=" font-weight-bold mb-0">جوده المنتج</h6>
                                            <span style="color:{{ $co->quality?'':'red' }} ">
                                                <i class="fas fa-{{ $co->quality?'check-circle':'times-circle' }}"></i>
                                            </span>
                                        </div>
                                        <div>
                                            <h6 class=" font-weight-bold mb-0">التقنيه المستخدمه</h6>
                                            <span style="color:{{ $co->tech?'':'red' }} ">
                                                <i class="fas fa-{{ $co->tech?'check-circle':'times-circle' }}"></i>
                                            </span>
                                        </div>
                                    
                                    </div>
                                    <br>
                            @endforeach                                                     
                        </div>
                    </div>
                </div>
                <br>
                {{-- marketplan --}}
                <div class=" card " style="background-image: url('{{ display_file($image4)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('marketplan') }}</h3>
                            </div>
                            @foreach ($marketplans as $index => $p)
                                    <div class="col-md-6 mb-4">
                                        <h6>{{ $p->name }}</h6>
                                        <ul>
                                            @foreach($p->sub_market_planuser as $key => $value)
                                                <li><h6>{{ $value->name }}</h6></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br>
                            @endforeach                                                     
                        </div>
                    </div>
                </div>
                <br>
                {{-- developplan --}}
                <div class=" card " style="background-image: url('{{ display_file($image3)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('developplan') }}</h3>
                            </div>
                            @foreach ($developplans as $index => $developplan)
                                <div class="col-md-4  mt-5" >
                                    <div class="col-md-4 mb-4">
                                        <h6>{{ $developplan->name }}</h6>
                                    </div>
                                    <br>
                                </div>
                            @endforeach                                                     
                        </div>
                    </div>
                </div>
                <br>
                {{-- finincalplan--}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('finincalplan') }}</h3>
                            </div>
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
                    </div>
                </div>
                <br>
                {{-- requireinvestment--}}
                <div class=" card " style="background-image: url('{{ display_file($image1)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('requireinvestment') }}</h3>
                            </div>
                            <h4 class="my-4"> تقييم الشركة </h4>
                            <div class="alert alert-success text-white mt-3" id="success-message-existing">
                                <div>{{ $financial_evaluation ?? 0 }} SAR </div>
                            </div> 
                            <h4 class="my-4"> حجم الاستثمار المطلوب </h4>
                            <div class="alert alert-danger text-white mt-3" id="success-message-existing">
                                <div> {{ $requiredInvestmentForChart->required_investment_size ?? 0 }} {{ $requiredInvestmentForChart->required_investment_unit ?? '' }} SAR </div>
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">الاستثمار المطلوب</h3>
                            </div>
                            <div class="col-md-3  mt-5">
                                    <label for="" >حجم الاستثمار المطلوب </label>
                                        {{-- <input type="text" class="form-control" wire:model='required_investment_size' > --}}
                                        <p>{{ $required_investment_size??'' }}</p>
                            </div>
                            <div class="col-md-3  mt-5">
                                    <label for="" > التقنيات </label>
                                        {{-- <input type="text" class="form-control" wire:model='investment_technology' > --}}
                                        <p>{{ $investment_technology??'' }}</p>
                            </div>
                            <div class="col-md-3  mt-5">
                                    <label for="" > فريق العمل </label>
                                        {{-- <input type="text" class="form-control" wire:model='investment_team' > --}}
                                        <p>{{ $investment_team??'' }}</p>
                            </div>
                            <div class="col-md-3  mt-5">
                                    <label for="" > البحث والتطوير </label>
                                        {{-- <input type="text" class="form-control" wire:model='resarch_and_development' > --}}
                                        <p>{{ $resarch_and_development??'' }}</p>
                            </div>
                            <div class="col-md-3  mt-5">
                                    <label for="" > التسويق </label>
                                        {{-- <input type="text" class="form-control" wire:model='investment_marketing' > --}}
                                        <p>{{ $investment_marketing??'' }}</p>
                            </div>
                            <div class="col-md-3  mt-5">
                                <label for="">الوحده </label>
                                <p>{{ __($required_investment_unit??'')}}</p>
                            </div>
                           
                            
                        </div>
                        <div class="row">
                            <div class="d-inline-block" style="height: 50%;width: 50%;">
                                <div  style="width: full;height: 50%;" id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                {{-- thanku--}}
                <div class=" card " style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('thanku') }}</h3>
                            </div>
                                <div class="col-md-4  mt-5" >
                                    <label for="email">البريد الالكترونى: </label>
                                    <h6>{{ $thanku->email }}</h6>
                                    <br>
                                    <label for="email">الهاتف</label>
                                    <h6>{{ $thanku->phone }}</h6>
                                    <br>
                                    <label for="website_url">رابط الموقع </label>
                                    <h6>{{ $thanku->website_url }}</h6>
                                    <br>
                                </div>                                                    
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script>
        if (document.getElementById("prt-content")) {
            var btnPrtContent = document.getElementById("btn-prt-content");
            btnPrtContent.addEventListener("click", printDiv);

            function printDiv() {
                var prtContent = document.getElementById("prt-content");
                newWin = window.open("");
                newWin.document.head.replaceWith(document.head.cloneNode(true));
                newWin.document.body.appendChild(prtContent.cloneNode(true));
                setTimeout(() => {
                    newWin.print();
                    newWin.close();
                }, 600);
            }
        }
    </script>
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
    </script>
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

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@if ($requiredInvestmentForChart)
    <script>
        options = {
            chart: {
                type: 'donut'
            },
            series: [
                {{ $requiredInvestmentForChart->investment_technology }},
                {{ $requiredInvestmentForChart->investment_team }},
                {{ $requiredInvestmentForChart->resarch_and_development }},
                {{ $requiredInvestmentForChart->investment_marketing }}
            ],
            labels: ['التقنيات ', 'فريق العمل', 'البحث والتطوير', 'التسويق']
        }
        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
    </script>
@endif
</div>
