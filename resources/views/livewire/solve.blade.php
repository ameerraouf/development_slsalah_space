@if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">الحل</h3>
                        <p>اوصف حل الى تعمل الشركه على استخدامه فى حل المشكله</p>
                    </div>
                    @for($i = 0; $i < 9; $i++) 
                        <div class="col-md-4  mt-5">
                            <label for="">solve{{ $i+1 }}</label>
                            <input type="text" class="form-control" wire:model='solve{{ $i+1 }}' >
                            @error('solve{{ $i+1 }}')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endfor
                 
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(2)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="secondStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>