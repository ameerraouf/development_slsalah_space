@if ($currentStep != 14)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
<div class="card min-height-250 " >
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto " style="position:relative ;">
                
                <h3 class="text-dark">{{ __('developplan') }}</h3>
            </div>
        </div> 
    </div>
</div>
        <div class="row">
            <div class="col-md-4">
                <div>
                    @foreach ($developplan as $index => $p)
                        <div class="" >
                            <div><input type="text" class="form-control" wire:model="developplanname.{{ $index }}"></div>
                            @error("developplanname.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                        </div>
                        <br>
                    @endforeach
                    <div class="col-md-4  mt-5">
                        <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="developplan">Update</button>
                    </div>
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(13)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="fourteenStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{ display_file($image3)}}');" >
                    <div class="container">
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">خطه التطوير</h3>
                            </div>
                            {{-- <div class="col-md-12">
                                    <img src="{{ asset('10.png') }}" alt="" style="width: 600px;">
                            </div>      --}}
                            @foreach ($developplan as $index => $p)
                                <div class="col-md-4  mt-5" >
                                    {{-- <div><input type="text" class="form-control" wire:model="developplanname.{{ $index }}"></div> --}}
                                    <p>{{ $developplanname[$index] }}</p>
                                </div>
                            @endforeach
                        </div>               
                    </div>
                </div>
            </div>
         
        </div>
    </div>
