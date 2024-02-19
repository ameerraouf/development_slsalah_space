<div>
    @if ($currentStep != 10)
        <div style="display: none" class="row setup-content" id="step-5">
    @endif
            <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto text-center">
                            <h3 class="text-dark">خطه التطوير</h3>
                        </div>
                        <div class="col-md-12">
                                <img src="{{ asset('10.png') }}" alt="" style="width: 600px;">
                        </div>     
                        @foreach ($developplan as $index => $p)
                            <div class="col-md-4  mt-5" >
                                <div><input type="text" class="form-control" wire:model="developplanname.{{ $index }}"></div>
                                @error("developplanname.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                                {{-- {{ var_export($submarketname1[$index]) }} --}}
                            </div>
                        @endforeach

                        <div class="col-md-4  mt-5">
                            <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="developplan">Update</button>
                        </div>
                    </div>
                    <button class="btn btn-warning mt-3" type="button" wire:click="back(9)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-3" type="button" wire:click="tenthStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
            </div>

            
        </div>


</div>