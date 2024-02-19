@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="align-self-center">
                            <div>
                                <label for="company_desc" class="form-label mt-3">{{ __('Company Desc') }}</label>
                                <textarea  cols="10" rows="5" name="company_desc" class="form-control" wire:model='company_desc' wire:change='companySubmit'>
                                    
                                </textarea>
                              
                                @error('company_desc')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-info btn-sm float-left mt-4 mb-0" wire:click="firstStepSubmit">
                            {{ trans('next') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>