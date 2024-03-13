<div>
    @if ($currentStep != 2)
        <div style="display: none" class="row setup-content" id="step-1">
    @endif
            <div class="card min-height-250 " >
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mx-auto " style="position:relative ;">
                            
                            <h3 class="text-dark">{{ __('welcome') }}</h3>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    
                    <button class="btn btn-warning mt-3" type="button" wire:click="back(1)">
                        {{ trans('Back') }}
                    </button>
                    <button type="button" class="btn btn-info  mt-3 " wire:click="secondStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
                <div class="col-md-8">
                    <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
                        <div class="container">
                            <div class="row">
                                @include('livewire.logo')
                                <label for="company_desc" class="form-label mt-3">{{ __('welcome') }}</label>
                                <div class="col-md-12 mt-4">
                                   <h1>العرض الاستثمارى</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>