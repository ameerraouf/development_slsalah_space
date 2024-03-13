<div>
    
    @if ($currentStep != 1)
        <div style="display: none" class="row setup-content" id="step-1">
    @endif
            <div class="card min-height-250 " >
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mx-auto " style="position:relative ;">
                            
                            <h3 class="text-dark">{{ __('Themes') }}</h3>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    
                    <button type="button" class="btn btn-info btn-sm float-left mt-3 mb-0" wire:click="firstStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
                <div class="col-md-8">
                    <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
                        <div class="container">
                            <div class="row">
                                @include('livewire.logo')
                                <label for="company_desc" class="form-label mt-3">{{ __('Themes') }}</label>
                                <div class="col-md-12 mt-4">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>