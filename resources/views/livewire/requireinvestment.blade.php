<div>
    @if ($currentStep != 12)
        <div style="display: none" class="row setup-content" id="step-5">
    @endif
            <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto text-center">
                            <h3 class="text-dark">خطه دخول السوق</h3>
                        </div>
                        <div class="col-md-12">
                                <img src="{{ asset('12.png') }}" alt="" style="width: 600px; margin: 200px;">
                        </div>






                    </div>
                    <button class="btn btn-warning mt-3" type="button" wire:click="back(11)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-3" type="button" wire:click="twelveStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
            </div>

            
        </div>


</div>