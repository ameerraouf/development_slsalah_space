@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
        <div class="row">
            <div class="col-md-4">
                <div>
                    <label for="company_desc" class="form-label mt-3">{{ __('Company Desc') }}</label>
                    <textarea  cols="10" rows="5" class="form-control " wire:model='company_desc' wire:change='companySubmit' style="border: 2px solid  !important;"></textarea>                            
                    @error('company_desc')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <button type="button" class="btn btn-info btn-sm float-left mt-3 mb-0" wire:click="firstStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
                    <div class="container">
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mt-4">
                                <p> {{ $company_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>