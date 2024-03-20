<div>
    @if ($currentStep != 4)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="card min-height-250 p-3">
            <div class="container">
                <h5 class="text-dark text-center mb-3">{{ __('CompanyDesc') }}</h5>
                <div class="row g-3">
                    <div class="col-md-12">
                        <div>
                            <label for="company_desc" class="form-label">{{ __('CompanyDescr') }}</label>
                            <textarea cols="10" rows="5" class="form-control " wire:model='company_desc'
                                wire:change='companySubmit' style="border: 2px solid  !important;"></textarea>
                            @error('company_desc')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                            <div class="container p-4">
                                <div class="row">
                                    @include('livewire.logo')
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3 class="text-dark mb-3">{{ __('CompanyDesc') }}</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mb-0"> {{ $company_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                    <button class="btn btn-warning mt-0" type="button" wire:click="back(3)">
                        {{ trans('Back') }}
                    </button>
                    <button type="button" class="btn btn-info  mt-0 " wire:click="forthStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>