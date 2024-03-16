<div>
    @if ($currentStep != 4)
        <div style="display: none" class="row setup-content" id="step-1">
    @endif
            <div class="card min-height-250 " >
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mx-auto " style="position:relative ;">
                            
                            <h3 class="text-dark">{{ __('CompanyDesc') }}</h3>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <label for="company_desc" class="form-label mt-3">{{ __('CompanyDescr') }}</label>
                        <textarea  cols="10" rows="10" class="form-control " wire:model='company_desc' wire:change='companySubmit' style="border: 2px solid  !important;"></textarea>                            
                        @error('company_desc')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="btn btn-warning mt-3" type="button" wire:click="back(3)">
                        {{ trans('Back') }}
                    </button>
                    <button type="button" class="btn btn-info  mt-3 " wire:click="forthStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
                <div class="col-md-8">
                    <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                        <div class="container">
                            <div class="row">
                                @include('livewire.logo')
                                <label for="company_desc" class="form-label mt-3">{{ __('CompanyDesc') }}</label>
                                <div class="col-md-12 mt-4">
                                    <p> {{ $company_desc }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>