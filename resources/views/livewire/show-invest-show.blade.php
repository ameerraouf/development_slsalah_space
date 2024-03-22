<div class="app">
    <style>
    .cards {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .card {
        min-height: calc(100vh - 2rem);
        height: auto;
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
    <h4 style="text-align: center; font-weight: bold;">{{ __('investshow') }}</h4>
    <div class="row d-print-none mt-2">
        <div class="col-12 text-right">
            <a class="btn btn-primary mb-3" href="#" target="_blank" id="printButton">
                <i class="fa fa-print"></i> {{ __('Print') }}
            </a>
        </div>
    </div>
    <div class="cards mb-3" id="prt-content">
        {{-- about company --}}
        <div class="card" style="background-image: url('{{ display_file($image5)}}'); ">
            {{--
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="cloudonex_table">
                        <thead>
                            <tr>
                                <th>
                                    <h4>{{ __('CompanyDesc') }}</h4>
            </th>

            </tr>
            </thead>
            <tbody class="target-table">
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">
                                    <p>{!! $companydesc !!}</p>
                                </h6>
                                <p class="text-xs text-secondary mb-0"></p>
                            </div>
                        </div>
                    </td>


                </tr>
            </tbody>
            </table>
        </div>
        --}}
        <div class="container p-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('CompanyDesc') }}</h3>
                </div>
                <div class="col-md-12">
                    <p class="mb-0"> {!! $companydesc !!}</p>
                </div>
            </div>
        </div>
    </div>
    {{-- problems --}}
    <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
        <div class="container py-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center mb-3">
                    <h3 class="text-dark mb-4">{{ __('problem') }}</h3>
                </div>
                @foreach($problems as $key => $problem)
                <div class="col-md-4">
                    <label for="company_desc" class="form-label">{{ __('problem'.$key+1) }}</label>
                    <p>{{ $problem->summary??'' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- solves --}}
    <div class=" card " style="background-image: url('{{ display_file($image2)}}');position:relative;">
        <div class="container">
            <div class="row" style="position:absolute; top: 150px">

            </div>
        </div>

        <div class="container py-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('solves') }}</h3>
                    <p class="mb-3">اوصف حل الى تعمل الشركه على استخدامه فى حل المشكله</p>
                </div>
                @foreach($solves as $key => $solve)
                <div class="col-md-4">
                    <label for="">{{ __('solve'.$key+1) }}</label>
                    <p>{{ $solve->title }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- market --}}
    <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
        <div class="container py-4">
            @include('livewire.logo')
            <h4 style="text-align: center; font-weight: bold;">{{ __('market') }}</h4>
            @include('livewire.marketchart')
        </div>
    </div>
    {{-- products --}}
    <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
        <div class="container p-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('products') }}</h3>
                </div>
                @foreach($products as $key => $product)
                <div class="col-md-4">
                    <label for="">{{ __('pname'.$key+1) }} </label>
                    <p>{{ $product->title??'' }}</p>
                    <br>
                    <label for="">{{ __('pdescription') }} </label>
                    <p>{!! $product->description??'' !!}</p>
                    <br>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- target --}}
    <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
        <div class="container p-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('target') }}</h3>
                </div>
                <div class="col-md-12 mx-auto text-center">
                    <div class="circled pink d-inline-block">
                        <span class="text-center"
                            style="color: white; position: absolute;top: 11%;left: 28%; left: 50%; transform: translateX(-50%); white-space: nowrap; font-size: 14px;">
                            {{ $TAM }}
                            {{ $unitForChart }} SAR
                        </span>
                        <div class="circled light-pink text-center">
                            <span
                                style="color: white;position: absolute;top: 10%;left: 19%; left: 50%; transform: translateX(-50%); white-space: nowrap; font-size: 14px;">
                                {{ $SAM }}
                                {{ $unitForChart }} SAR
                            </span>
                            <div class="circled pale-pink text-center">
                                <span
                                    style="color: white;position: absolute;top: 43%;left: 5%; left: 50%; transform: translateX(-50%); white-space: nowrap; font-size: 14px;">
                                    {{ $SOM }}
                                    {{ $unitForChart }} SAR
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- compatitive --}}
    <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
        <div class="container p-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('compatitive') }}</h3>
                </div>
                @foreach ($selectedCompat as $index => $compat)
                <div class="col-md-4">
                    <label for="titlecompat{{ $index }}">الوصف {{ $index +1 }}</label>
                    <p>{{ $compat->title }}</p>
                    <br>
                    <label for="descriptioncompat{{ $index }}">توضيح الوصف {{ $index +1 }}</label>
                    <p>{!! $compat->description !!}</p>
                    <br>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- team --}}
    <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
        <div class="container p-4">
            <div class="row text-center">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('team') }}</h3>
                </div>
                @foreach ($selectedteam as $index => $team)
                <div class="col-md-3">
                    <div>
                        @if($team->image)
                        <img src="{{display_file($team->image)}}" alt="" width="150">
                        @else
                        <img src="{{asset('no-image.jpg')}}" width='150' alt="">
                        @endif
                    </div>

                    <label for="name{{ $index }}">المسمى الوظيفى {{ $index+1 }}</label>
                    {{-- <input type="text" wire:model="teamname.{{ $index }}" class="form-control"
                    readonly> --}}
                    <p>{{ $team->name }}</p>
                    <br>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    {{-- competitors --}}
    <div class=" card " style="background-image: url('{{ display_file($image5)}}');">
        <div class="container p-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('competitors') }}</h3>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="cloudonex_table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs "></th>
                                    @foreach ($selectedco as $index => $co)
                                    <th class="text-uppercase text-secondary text-xs ">
                                        <p>{{ $co->companyname }} </p>
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class=" font-weight-bold mb-0">سعر المنتح</p>
                                        <p class=" font-weight-bold mb-0">جوده المنتج</p>
                                        <p class=" font-weight-bold mb-0">التقنيه المستخدمه</p>
                                    </td>
                                    @foreach ($selectedco as $index => $co)
                                    <td>
                                        <div>
                                            {{-- <input type="checkbox" wire:model="coprice.{{ $index }}"
                                            readonly> --}}
                                            <span style="color:{{ $co->price?'':'red' }} ">
                                                <i class="fas fa-{{ $co->price?'check-circle':'times-circle' }}"></i>
                                            </span>
                                            {{-- {{ var_export($coprice[$index] ?? null) }} --}}
                                        </div>
                                        <div>
                                            {{-- <input type="checkbox" wire:model="coquality.{{ $index }}"
                                            readonly> --}}
                                            <span style="color:{{ $co->quality?'':'red' }} ">
                                                <i class="fas fa-{{ $co->quality?'check-circle':'times-circle' }}"></i>
                                            </span>
                                        </div>
                                        <div>
                                            {{-- <input type="checkbox" wire:model="cotech.{{ $index }}"
                                            readonly> --}}
                                            <span style="color:{{ $co->tech?'':'red' }} ">
                                                <i class="fas fa-{{ $co->tech?'check-circle':'times-circle' }}"></i>
                                            </span>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                {{-- updatecompators --}}
                            </tbody>
                        </table>
                        {{-- <div class="col-md-4  mt-5">
                                                            <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updatecompators">Update</button>
                                                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- marketplan --}}
    <div class=" card " style="background-image: url('{{ display_file($image4)}}');">
        <div class="container p-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('marketplan') }}</h3>
                </div>
                @foreach ($marketplans as $index => $p)
                <div class="col-md-6">
                    <label>{{ $p->name }}</label>
                    @foreach($p->sub_market_planuser as $key => $value)
                    <ul>
                        <li>{{ $key +1}} - <span>{{ $value->name }}</span> </li>
                    </ul>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- developplan --}}
    <div class=" card " style="background-image: url('{{ display_file($image3)}}');">
        <div class="container p-4">
            <div class="row">
                @include('livewire.logo')
                <div class="col-md-12 mx-auto text-center">
                    <h3 class="text-dark mb-4">{{ __('developplan') }}</h3>
                </div>
                {{-- <div class="col-md-12">
                                            <img src="{{ asset('10.png') }}" alt="" style="width: 600px;">
            </div> --}}
            @foreach ($developplans as $index => $developplan)
            <div class="col-md-4">
                {{-- <div><input type="text" class="form-control" wire:model="developplanname.{{ $index }}"></div> --}}
            <p>{{ $developplan->name }}</p>
        </div>
        @endforeach
    </div>
</div>
</div>
{{-- finincalplan--}}
<div class=" card " style="background-image: url('{{ display_file($image5)}}');">
    <div class="container p-4">
        {{-- @include('livewire.logo') --}}
        <div class="row">
            <div class="col-md-12 text-center mb-3">
                @php $user = Auth::user(); @endphp
                @if ($user->company && $user->company->company_logo)
                <img src="{{ PUBLIC_DIR }}/uploads/{{ $user->company->company_logo }}"
                    class="w-20 border-radius-lg shadow-sm " style="width: 100px !important;">
                @endif
            </div>
            <div class="col-md-12 mx-auto text-center">
                <h3 class="text-dark mb-4">{{ __('finincalplan') }}</h3>
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
</div>
</div>
{{-- requireinvestment--}}
<div class=" card " style="background-image: url('{{ display_file($image1)}}');">
    <div class="container p-4">
        <div class="row">
            @include('livewire.logo')
            <div class="col-md-12 mx-auto text-center">
                <h3 class="text-dark mb-">{{ __('requireinvestment') }}</h3>
            </div>
        </div>
        <div class="row mb-3">
            <h5 class=""> تقييم الشركة </h5>
            <div class="alert alert-success text-white" id="success-message-existing">
                <div>{{ $financial_evaluation ?? 0 }} SAR </div>
            </div>
            <h5 class=""> حجم الاستثمار المطلوب </h5>
            <div class="alert alert-danger text-white" id="success-message-existing">
                <div>
                    {{ $requiredInvestmentForChart->required_investment_size ?? 0 }}
                    {{ $requiredInvestmentForChart->required_investment_unit ?? '' }} SAR
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-inline-block" style="height: 50%;width: 50%;">
                <div style="width: full;height: 50%;" id="chart3"></div>
            </div>
        </div>
    </div>
</div>
{{-- thanku--}}
<div class=" card " style="background-image: url('{{ display_file($image5)}}');">

    <div class="container p-4">
        <div class="row">
            @include('livewire.logo')
            <div class="col-md-12 mx-auto text-center">
                <h3 class="text-dark mb-4">{{ __('thanku') }}</h3>
                <h5 class="text-dark">هل عندك اى استفسار؟</h5>
            </div>
            {{-- <div class="col-md-12">
                                            <img src="{{ asset('13.png') }}" alt="" style="width: 600px;">
        </div> --}}
        <div class="col-md-">
            <label for="email">البريد الالكترونى: </label>
            <p>{{ $thanku->email }}</p>
            <br>
            <label for="email">الهاتف</label>
            <p>{{ $thanku->phone }}</p>
            <br>
            <label for="website_url">رابط الموقع </label>
            <p>{{ $thanku->website_url }}</p>
            <br>

        </div>
    </div>
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
            y: {
                {
                    $all_revenues_forecasting['first_year']
                }
            }
        }, {
            x: 'السنة الثانية',
            y: {
                {
                    $all_revenues_forecasting['second_year']
                }
            }
        }, {
            x: 'السنة الثالثة',
            y: {
                {
                    $all_revenues_forecasting['third_year']
                }
            }
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
            y: {
                {
                    $calc_total['net_profit_first_year_as_number']
                }
            },
        }, {
            x: 'السنة الثانية',
            y: {
                {
                    $calc_total['net_profit_second_year_as_number']
                }
            }
        }, {
            x: 'السنة الثالثة',
            y: {
                {
                    $calc_total['net_profit_third_year_as_number']
                }
            },
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
    series: [{
            {
                $requiredInvestmentForChart - > investment_technology
            }
        },
        {
            {
                $requiredInvestmentForChart - > investment_team
            }
        },
        {
            {
                $requiredInvestmentForChart - > resarch_and_development
            }
        },
        {
            {
                $requiredInvestmentForChart - > investment_marketing
            }
        }
    ],
    labels: ['التقنيات ', 'فريق العمل', 'البحث والتطوير', 'التسويق']
}
var chart = new ApexCharts(document.querySelector("#chart3"), options);
chart.render();
</script>
@endif
</div>