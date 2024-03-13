@if ($currentStep != 4)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
        <div class="card min-height-250 " >
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto " style="position:relative ;">
                        
                        <h3 class="text-dark">{{ __('problem') }}</h3>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">     
            <div class="col-md-4">
                <div >
                    <label for="company_desc" class="form-label mt-3">{{ __('problem1') }}</label>
                    <textarea class="form-control" cols="10" rows="5" wire:model='summary1' wire:change='projectSubmit1' style="border: 2px solid  !important;"></textarea>
                    @error('summary1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
                <div >
                    <label for="company_desc" class="form-label mt-3">{{ __('problem2') }}</label>
                    <textarea class="form-control" cols="10" rows="5"  wire:model='summary2' wire:change='projectSubmit2' style="border: 2px solid  !important;"></textarea>
                    @error('summary2')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
                <div >
                    <label for="company_desc" class="form-label mt-3">{{ __('problem3') }}</label>
                    <textarea class="form-control" cols="10" rows="5"  wire:model='summary3' wire:change='projectSubmit3' style="border: 2px solid  !important;"></textarea>
                    @error('summary3')<div class="alert alert-danger">{{ $message }}</div> @enderror
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
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('problem') }}</h3>
                            </div>
                            <div class="col-md-4  mt-5">
                                <label for="company_desc" class="form-label mt-3">{{ __('problem1') }}</label>
                                <p>{{ $summary1 }}</p>
                            </div>
                            <div class="col-md-4  mt-5">
                                <label for="company_desc" class="form-label mt-3">{{ __('problem2') }}</label>
                                <p>{{ $summary2 }}</p>
                            </div>
                            <div class="col-md-4  mt-5">
                                <label for="company_desc" class="form-label mt-3">{{ __('problem3') }}</label>
                                <p>{{ $summary3 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>