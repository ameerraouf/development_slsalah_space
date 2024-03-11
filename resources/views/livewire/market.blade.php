@if ($currentStep != 4)
    <div style="display: none" class="row setup-content" id="step-4">
@endif
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-3  mt-5">
                        <label for="" > السنه {{ $theyear  }}</label>
                        <select  class="form-control" wire:model='theyear'  >
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="{{ $year }}"> {{ $year }}</option>
                            <option value="{{ $year2 }}">{{ $year2 }}</option>
                            <option value="{{ $year3 }}">{{ $year3 }}</option>
                            <option value="{{ $year4 }}">{{ $year4 }}</option>
                            <option value="{{ $year5 }}">{{ $year5 }}</option>
                        </select>
                        @error('theyear')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size' >
                            @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit' >
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit1">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                        <label for="" > السنه {{ $theyear2  }}</label>
                        <select  class="form-control" wire:model='theyear2'  >
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="{{ $year }}"> {{ $year }}</option>
                            <option value="{{ $year2 }}">{{ $year2 }}</option>
                            <option value="{{ $year3 }}">{{ $year3 }}</option>
                            <option value="{{ $year4 }}">{{ $year4 }}</option>
                            <option value="{{ $year5 }}">{{ $year5 }}</option>
                        </select>
                        @error('theyear2')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size2'>
                            @error('size2')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit2'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit2')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit2">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                            <label for="" > السنه {{ $theyear3  }}</label>
                            <select  class="form-control" wire:model='theyear3'  >
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="{{ $year }}"> {{ $year }}</option>
                                <option value="{{ $year2 }}">{{ $year2 }}</option>
                                <option value="{{ $year3 }}">{{ $year3 }}</option>
                                <option value="{{ $year4 }}">{{ $year4 }}</option>
                                <option value="{{ $year5 }}">{{ $year5 }}</option>
                            </select>
                            @error('theyear3')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size3'>
                            @error('size3')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit3'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit3')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit3">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                            <label for="" > السنه {{ $theyear4  }}</label>
                            <select  class="form-control" wire:model='theyear4'  >
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="{{ $year }}"> {{ $year }}</option>
                                <option value="{{ $year2 }}">{{ $year2 }}</option>
                                <option value="{{ $year3 }}">{{ $year3 }}</option>
                                <option value="{{ $year4 }}">{{ $year4 }}</option>
                                <option value="{{ $year5 }}">{{ $year5 }}</option>
                            </select>
                            @error('theyear4')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size4'>
                            @error('size4')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit4'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit4')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit4">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                            <label for="" > السنه {{ $theyear5  }}</label>
                            <select  class="form-control" wire:model='theyear5'  >
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="{{ $year }}"> {{ $year }}</option>
                                <option value="{{ $year2 }}">{{ $year2 }}</option>
                                <option value="{{ $year3 }}">{{ $year3 }}</option>
                                <option value="{{ $year4 }}">{{ $year4 }}</option>
                                <option value="{{ $year5 }}">{{ $year5 }}</option>
                            </select>
                            @error('theyear5')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size5'>
                            @error('size5')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit5'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit5')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit5">
                            {{ trans('submit') }}
                        </button>
                    </div>
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(3)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="forthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
                    <div class="container">
                        @include('livewire.logo')
                        {{-- <div class="row">
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark">حجم السوق</h3>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق  {{ $size }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit) }}</label>
                                </div>

        
                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear2  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size2 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit2) }}</label>
                                </div>

                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear3  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size3 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit3) }}</label>
                                </div>

                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear4  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size4 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit4) }}</label>
                                </div>

                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear5  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size5 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit) }}</label>
                                </div>                       
                        </div> --}}
                        <div class="row">
                            <div class="w-full" style="height: 50%;">
                                <div class="w-full" style="height: 50%;" id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @if ($size && $size2 && $size3 && $size4 && $size5)
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
                                x: '{{ $year }}',
                                y: {{ $size }}
                            }, {
                                x: '{{ $year2 }}',
                                y: {{ $size2 }}
                            }, {
                                x: '{{ $year3 }}',
                                y: {{ $size3 }}
                            },{
                                x: '{{ $year4 }}',
                                y: {{ $size4 }}
                            },{
                                x: '{{ $year5 }}',
                                y: {{ $size5 }}
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
@push('js')

@endpush