@if ($currentStep != 9)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
        <style>
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
        <div class="card min-height-250 " >
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto " style="position:relative ;">
                        
                        <h3 class="text-dark">{{ __('target') }}</h3>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                
                <button class="btn btn-warning mt-3" type="button" wire:click="back(8)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="ninthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('target') }}</h3>
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
        </div>
    </div>