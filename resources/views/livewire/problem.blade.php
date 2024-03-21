@if ($currentStep != 5)
<div style="display: none" class="row setup-content" id="step-2">
    @endif
    <div class="card min-height-250 p-3">
        <div class="container">
            <h5 class="text-dark text-center mb-3">{{ __('problem') }}</h5>
            <div class="row g-3">
                <div class="col-md-12 row row-cols-1 row-cols-lg-3 g-3 justify-content-center">
                    <div class="col">
                        <label for="company_desc" class="form-label">{{ __('problem1') }}</label>
                        <textarea class="form-control" cols="10" rows="5" wire:model='summary1'
                            wire:change='projectSubmit1' style="border: 2px solid  !important;"></textarea>
                        @error('summary1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col">
                        <label for="company_desc" class="form-label">{{ __('problem2') }}</label>
                        <textarea class="form-control" cols="10" rows="5" wire:model='summary2'
                            wire:change='projectSubmit2' style="border: 2px solid  !important;"></textarea>
                        @error('summary2')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col">
                        <label for="company_desc" class="form-label">{{ __('problem3') }}</label>
                        <textarea class="form-control" cols="10" rows="5" wire:model='summary3'
                            wire:change='projectSubmit3' style="border: 2px solid  !important;"></textarea>
                        @error('summary3')<div class="alert alert-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                        <div class="container py-4">
                            <div class="row">
                                @include('livewire.logo')
                                <div class="col-md-12 mx-auto text-center mb-3">
                                    <h3 class="text-dark">{{ __('problem') }}</h3>
                                </div>
                                <div class="col-md-4">
                                    <label for="company_desc" class="form-label">{{ __('problem1') }}</label>
                                    <p>{{ $summary1 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="company_desc" class="form-label">{{ __('problem2') }}</label>
                                    <p>{{ $summary2 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="company_desc" class="form-label">{{ __('problem3') }}</label>
                                    <p>{{ $summary3 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(4)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-0" type="button" wire:click="fifthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>
</div>