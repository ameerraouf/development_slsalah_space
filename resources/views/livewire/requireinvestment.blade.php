@if ($currentStep != 16)
<div style="display: none" class="row setup-content" id="step-5">
    @endif
    <div class="card min-height-250 p-3">
        <div class="container">
            <h3 class="text-dark text-center mb-3">{{ __('requireinvestment') }}</h3>
            <div class="row g-3">
                <disv class="col-md-12 row row-cols-1 row-cols-sm-2 row-cols-md-3 cols-xl-6 g-3 justify-content-center">
                    <div class="col">
                        <label for="">حجم الاستثمار المطلوب </label>
                        <input type="number" class="form-control" wire:model='required_investment_size'>
                        @error('required_investment_size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col">
                        <label for=""> التقنيات </label>
                        <input type="number" class="form-control" wire:model='investment_technology'>
                        @error('investment_technology')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col">
                        <label for=""> فريق العمل </label>
                        <input type="number" class="form-control" wire:model='investment_team'>
                        @error('investment_team')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col">
                        <label for=""> البحث والتطوير </label>
                        <input type="number" class="form-control" wire:model='resarch_and_development'>
                        @error('resarch_and_development')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col">
                        <label for=""> التسويق </label>
                        <input type="number" class="form-control" wire:model='investment_marketing'>
                        @error('investment_marketing')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col">
                        <label for="">الوحده </label>
                        <select class="form-control" wire:model='required_investment_unit'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="thousand">ألف</option>
                            <option value="million">مليون</option>
                        </select>
                        @error('required_investment_unit')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col d-flex align-items-end justify-content-center">
                        <button class="btn btn-info m-0 btn-sm" type="button" wire:click="requiredInvestmentSubmit">
                            {{ trans('submit') }}
                        </button>
                    </div>
                </disv>
                <div class="col-md-12">
                    <div class=" card card-slide" style="background-image: url('{{ display_file($image1)}}');">
                        <div class="container p-4">
                            <div class="row">
                                @include('livewire.logo')
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark mb-">خطه دخول السوق</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="d-flex gap-3 mb-4">
                                    <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="89" height="89"
                                        overflow="hidden">
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect x="956" y="174" width="89" height="89" />
                                            </clipPath>
                                        </defs>
                                        <g clip-path="url(#clip0)" transform="translate(-956 -174)">
                                            <path
                                                d="M1035.13 182.264C1036.85 182.264 1037.92 183.544 1037.92 185.034L1037.92 228.783 962.864 228.783 962.864 185.034C962.864 183.544 964.151 182.264 965.648 182.264ZM1037.92 234.113 1037.92 237.1C1037.92 238.807 1036.42 240.094 1035.13 240.094L965.648 240.094C964.151 240.094 962.864 238.807 962.864 237.1L962.864 234.113ZM1010.47 245.641 1014.33 256.946 986.45 256.946 990.099 245.641ZM965.648 176.5C961.149 176.5 957.5 180.34 957.5 184.824L957.5 237.1C957.5 241.584 961.149 245.425 965.648 245.425L984.306 245.425 980.447 256.519 977.016 256.519C975.3 256.519 974.225 257.799 974.225 259.506 974.225 261.003 975.729 262.5 977.016 262.5L1023.98 262.5C1025.48 262.5 1026.77 261.003 1026.77 259.506 1026.77 257.799 1025.48 256.519 1023.98 256.519L1020.34 256.519 1016.69 245.425 1035.13 245.425C1039.63 245.425 1043.5 241.584 1043.5 237.1L1043.5 184.824C1043.5 180.34 1039.63 176.5 1035.13 176.5Z"
                                                stroke="#FFFFFF" stroke-linejoin="round" stroke-miterlimit="10"
                                                fill-rule="evenodd" />
                                            <path
                                                d="M1000.89 186.5C999.173 186.5 998.094 187.79 998.094 189.51L998.094 191.23C994.87 192.308 992.5 195.536 992.5 199.406 992.5 203.917 996.161 206.715 999.173 208.865 1001.32 210.366 1003.69 212.086 1003.69 213.594 1003.69 215.314 1002.4 216.604 1000.89 216.604 999.173 216.604 998.094 215.314 998.094 213.594 998.094 212.086 996.803 210.585 995.512 210.585 993.791 210.585 992.5 212.086 992.5 213.594 992.5 217.464 994.87 220.262 998.094 221.764L998.094 223.483C998.094 225.203 999.385 226.493 1000.89 226.493 1002.4 226.493 1003.69 225.203 1003.69 223.483L1003.69 221.764C1006.92 220.692 1009.5 217.464 1009.5 213.594 1009.5 209.076 1005.63 206.285 1002.62 204.135 1000.46 202.627 998.094 200.907 998.094 199.406 998.094 197.686 999.173 196.396 1000.89 196.396 1002.4 196.396 1003.69 197.686 1003.69 199.406 1003.69 200.907 1005.2 202.415 1006.49 202.415 1007.78 202.415 1009.5 200.907 1009.5 199.406 1009.5 195.536 1007.14 192.738 1003.69 191.23L1003.69 189.51C1003.69 187.79 1002.4 186.5 1000.89 186.5Z"
                                                stroke="#FFFFFF" stroke-linejoin="round" stroke-miterlimit="10"
                                                fill-rule="evenodd" />
                                        </g>
                                    </svg>
                                    <div class="flex-fill">
                                        <h5 class=""> تقييم الشركة </h5>
                                        <div class="alert alert-success text-white" id="success-message-existing">
                                            <div>{{ $financial_evaluation ?? 0 }} SAR </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-3">
                                    <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="88" height="87"
                                        overflow="hidden">
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect x="966" y="411" width="88" height="87" />
                                            </clipPath>
                                        </defs>
                                        <g clip-path="url(#clip0)" transform="translate(-966 -411)">
                                            <path
                                                d="M989.874 416.11C993.99 416.11 997.191 419.585 997.191 423.767 997.191 427.942 993.758 431.189 989.874 431.189 985.758 431.189 982.324 427.706 982.324 423.767 982.099 419.585 985.526 416.11 989.874 416.11ZM1030.35 416.11C1034.7 416.11 1037.9 419.585 1037.9 423.767 1037.9 427.942 1034.47 431.189 1030.35 431.189 1026 431.189 1023.03 427.706 1023.03 423.767 1022.58 419.585 1026 416.11 1030.35 416.11ZM1010 446.725C1014.34 446.725 1017.77 450.207 1017.77 454.154 1017.77 458.093 1014.34 461.576 1010 461.576 1005.88 461.576 1002.45 458.329 1002.45 454.154 1002.45 449.979 1005.88 446.725 1010 446.725ZM989.874 436.52C995.129 436.52 1000.39 439.075 1003.82 443.249 999.935 445.569 997.191 449.515 997.191 454.154 997.191 456.937 998.106 459.72 999.703 461.804L972.031 461.804 972.031 454.382C972.031 444.641 980.038 436.52 989.874 436.52ZM1030.13 436.755C1039.73 436.755 1047.73 444.869 1047.73 454.846L1047.73 462.04 1020.06 462.04C1021.89 459.72 1022.58 457.165 1022.58 454.382 1022.58 449.744 1020.06 445.797 1016.17 443.478 1019.38 439.075 1024.63 436.755 1030.13 436.755ZM1010 467.142C1012.06 467.142 1014.11 467.37 1015.72 468.07L1010 475.727 1004.28 468.07C1006.11 467.606 1008.17 467.142 1010 467.142ZM999.703 470.389 1007.48 480.83 1007.48 493.118 992.385 493.118 992.385 484.769C992.385 478.739 995.129 473.636 999.703 470.389ZM1020.29 470.389C1024.63 473.636 1027.84 479.203 1027.84 485.004L1027.84 493.118 1012.74 493.118 1012.74 480.83 1020.29 470.389ZM989.417 411.007C982.557 411.007 976.836 416.802 976.836 423.767 976.836 427.478 978.433 430.725 980.952 433.045 972.72 436.52 967 444.641 967 454.154L967 464.359C967 465.751 968.147 466.906 969.519 466.906L995.587 466.906C990.331 471.317 986.898 477.583 986.898 484.769L986.898 495.209C986.898 496.837 988.044 497.993 989.417 497.993L1030.13 497.993C1031.5 497.993 1032.64 496.837 1032.64 495.209L1032.64 484.769C1032.64 477.583 1029.21 471.317 1024.17 466.906L1050.02 466.906C1051.62 466.906 1052.77 465.751 1052.77 464.359L1052.77 454.154C1052.99 444.869 1047.05 436.52 1038.58 433.045 1041.33 430.725 1042.7 427.243 1042.7 423.767 1042.7 416.802 1036.99 411.007 1030.13 411.007 1023.26 411.007 1017.55 416.802 1017.55 423.767 1017.55 427.478 1018.92 430.725 1021.43 433.045 1017.31 434.664 1013.43 437.683 1010.91 441.622L1008.62 441.622C1006.11 437.911 1002.45 434.664 998.106 433.045 1000.62 430.725 1001.99 427.478 1001.99 423.767 1001.99 416.802 996.276 411.007 989.417 411.007Z"
                                                fill-rule="evenodd" />
                                            <path
                                                d="M1035.45 447C1034.11 447 1033 448.138 1033 449.5 1033 450.862 1034.11 452 1035.45 452L1040.55 452C1041.89 452 1043 450.862 1043 449.5 1043 448.138 1041.89 447 1040.55 447Z"
                                                fill-rule="evenodd" />
                                            <path
                                                d="M979.671 447C978.113 447 977.007 448.138 977.007 449.5 977.007 450.862 978.113 452 979.671 452L984.555 452C985.887 452 987 450.862 987 449.5 987 448.138 985.887 447 984.555 447Z"
                                                fill-rule="evenodd" />
                                        </g>
                                    </svg>
                                    <div class="flex-fill">
                                        <h5 class=""> حجم الاستثمار المطلوب </h5>
                                        <div class="alert alert-danger text-white" id="success-message-existing">
                                            <div> {{ $requiredInvestmentForChart->required_investment_size ?? 0 }}
                                                {{ $requiredInvestmentForChart->required_investment_unit ?? '' }} SAR
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark mb-4">الاستثمار المطلوب</h3>
                                </div>
                                <div class="col-md-3 col-xl-2">
                                    <label for="">حجم الاستثمار المطلوب </label>
                                    {{-- <input type="text" class="form-control" wire:model='required_investment_size' > --}}
                                    <p>{{ $required_investment_size }}</p>
                                </div>
                                <div class="col-md-3 col-xl-2">
                                    <label for=""> التقنيات </label>
                                    {{-- <input type="text" class="form-control" wire:model='investment_technology' > --}}
                                    <p>{{ $investment_technology }}</p>
                                </div>
                                <div class="col-md-3 col-xl-2">
                                    <label for=""> فريق العمل </label>
                                    {{-- <input type="text" class="form-control" wire:model='investment_team' > --}}
                                    <p>{{ $investment_team }}</p>
                                </div>
                                <div class="col-md-3 col-xl-2">
                                    <label for=""> البحث والتطوير </label>
                                    {{-- <input type="text" class="form-control" wire:model='resarch_and_development' > --}}
                                    <p>{{ $resarch_and_development }}</p>
                                </div>
                                <div class="col-md-3 col-xl-2">
                                    <label for=""> التسويق </label>
                                    {{-- <input type="text" class="form-control" wire:model='investment_marketing' > --}}
                                    <p>{{ $investment_marketing }}</p>
                                </div>
                                <div class="col-md-3 col-xl-2">
                                    <label for="">الوحده </label>
                                    <p>{{ __($required_investment_unit)}}</p>
                                </div>


                            </div>
                            <div class="row">
                                <div class="d-inline-block" style="height: 50%;width: 50%;">
                                    <div style="width: full;height: 50%;" id="chart3"></div>
                                </div>
                            </div>
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
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(15)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-0" type="button" wire:click="sixteenStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>
</div>