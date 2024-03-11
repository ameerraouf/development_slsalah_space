@if ($currentStep != 12)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="">
                            <label for="" >حجم الاستثمار المطلوب </label>
                            <input type="number" class="form-control" wire:model='required_investment_size' >
                            @error('required_investment_size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="">
                            <label for="" > التقنيات </label>
                            <input type="number" class="form-control" wire:model='investment_technology' >
                            @error('investment_technology')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="">
                            <label for="" > فريق العمل </label>
                            <input type="number" class="form-control" wire:model='investment_team' >
                            @error('investment_team')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="">
                            <label for="" > البحث والتطوير </label>
                            <input type="number" class="form-control" wire:model='resarch_and_development' >
                            @error('resarch_and_development')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="">
                            <label for="" > التسويق </label>
                            <input type="number" class="form-control" wire:model='investment_marketing' >
                            @error('investment_marketing')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='required_investment_unit' >
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="thousand">ألف</option>
                            <option value="million">مليون</option>
                        </select>
                        @error('required_investment_unit')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="">
                        <button class="btn btn-success mt-3" type="button" wire:click="requiredInvestmentSubmit">
                            {{ trans('submit') }}
                        </button>
                    </div>
                    
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(11)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="twelveStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
                    <div class="container">
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">خطه دخول السوق</h3>
                            </div>
                        </div>
                        <div class="row">
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
                                            <p>{{ $required_investment_size }}</p>
                                </div>
                                <div class="col-md-3  mt-5">
                                        <label for="" > التقنيات </label>
                                            {{-- <input type="text" class="form-control" wire:model='investment_technology' > --}}
                                            <p>{{ $investment_technology }}</p>
                                </div>
                                <div class="col-md-3  mt-5">
                                        <label for="" > فريق العمل </label>
                                            {{-- <input type="text" class="form-control" wire:model='investment_team' > --}}
                                            <p>{{ $investment_team }}</p>
                                </div>
                                <div class="col-md-3  mt-5">
                                        <label for="" > البحث والتطوير </label>
                                            {{-- <input type="text" class="form-control" wire:model='resarch_and_development' > --}}
                                            <p>{{ $resarch_and_development }}</p>
                                </div>
                                <div class="col-md-3  mt-5">
                                        <label for="" > التسويق </label>
                                            {{-- <input type="text" class="form-control" wire:model='investment_marketing' > --}}
                                            <p>{{ $investment_marketing }}</p>
                                </div>
                                <div class="col-md-3  mt-5">
                                    <label for="">الوحده </label>
                                    <p>{{ $required_investment_unit }}</p>
                                </div>
                               
                                
                            </div>
                            <div class="row">
                                <div class="d-inline-block" style="height: 50%;width: 50%;">
                                    <div  style="width: full;height: 50%;" id="chart3"></div>
                                </div>
                            </div>
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
                </div>
            </div>
        </div>
    </div>