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
        .container {
            flex-wrap: nowrap;
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
                {{-- about company --}}
                <h4 style="text-align: center; font-weight: bold;">{{ __('investshow') }}</h4>
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <a class="btn btn-primary " href="#" target="_blank"  id="printButton">
                            <i class="fa fa-print"></i> {{ __('Print') }}
                        </a>
                    </div>
                </div>
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
{{-- developplan --}}
{{-- finincalplan--}}
{{-- requireinvestment--}}
{{-- thanku--}}



                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <a class="btn btn-primary " href="#" target="_blank"  id="printButton">
                            <i class="fa fa-print"></i> {{ __('Print') }}
                        </a>
                    </div>
                    {{-- <button class="btn btn-warning" id="btn-prt-content">
                        <i class="fa-solid fa-print"></i>
                        <span>{{ __('Print') }}</span>
                    </button> --}}
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
</div>
