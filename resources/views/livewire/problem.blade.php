@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">المشكله</h3>
                    </div>
                    <div class="col-md-4  mt-5">
                        <div class="form-group">
                            <textarea class="form-control" cols="30" rows="10" wire:model='summary1' wire:change='projectSubmit1'></textarea>
                        </div>
                        @error('summary1')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <div class="form-group">
                            <textarea class="form-control" cols="30" rows="10"  wire:model='summary2' wire:change='projectSubmit2'></textarea>
                        </div>
                        @error('summary2')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <div class="form-group">
                            <textarea class="form-control" cols="30" rows="10"  wire:model='summary3' wire:change='projectSubmit3'></textarea>
                        </div>
                        @error('summary3')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(1)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="secondStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>