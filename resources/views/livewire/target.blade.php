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
    <div class="card min-height-250 p-3">
        <div class="container">
            <h5 class="text-dark text-center mb-3">{{ __('target') }}</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                        <div class="container p-4">
                            <div class="row">
                                @include('livewire.logo')
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark">{{ __('target') }}</h3>
                                </div>
                                <div class="col-md-12 mx-auto text-center">
                                    <div class="circled pink d-inline-block"><span class="text-center"
                                            style="color: white; position: absolute;top: 11%;left: 28%; left: 50%; transform: translateX(-50%); white-space: nowrap; font-size: 14px;">
                                            {{ $TAM }} {{ $unitForChart }} SAR </span>
                                        <div class="circled light-pink text-center"><span
                                                style="color: white;position: absolute;top: 10%;left: 19%; left: 50%; transform: translateX(-50%); white-space: nowrap; font-size: 14px;">{{ $SAM }}
                                                {{ $unitForChart }} SAR </span>
                                            <div class="circled pale-pink text-center"><span
                                                    style="color: white;position: absolute;top: 43%;left: 5%; left: 50%; transform: translateX(-50%); white-space: nowrap; font-size: 14px;">{{ $SOM }}
                                                    {{ $unitForChart }} SAR </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(8)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-0" type="button" wire:click="ninthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>
</div>