@if ($currentStep != 14)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
<div class="card min-height-250 p-3" >
    <div class="container">
                <h3 class="text-dark text-center mb-3">{{ __('developplan') }}</h3>
                <div class="row g-3">
                    <div class="col-md-12 row justify-content-center g-3">
                            @foreach ($developplan as $index => $p)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3" >
                                    <div><input type="text" class="form-control" wire:model="developplanname.{{ $index }}"></div>
                                    @error("developplanname.{$index}")<span class="text-danger mt-1">{{ $message }}</span>@enderror 
                                </div>
                            @endforeach
                            <div class="col-12 d-flex align-items-end justify-content-center">
                                <button class="btn btn-info btn-sm m-0" type="button" wire:click="developplan">Update</button>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" card card-slide" style="background-image: url('{{ display_file($image3)}}');" >
                            <div class="container p-4">
                                <div class="row">
                                    @include('livewire.logo')
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3 class="text-dark mb-4">خطه التطوير</h3>
                                    </div>
                                    {{-- <div class="col-md-12">
                                            <img src="{{ asset('10.png') }}" alt="" style="width: 600px;">
                                    </div>      --}}
                                    @foreach ($developplan as $index => $p)
                                        <div class="col-md-4" >
                                            {{-- <div><input type="text" class="form-control" wire:model="developplanname.{{ $index }}"></div> --}}
                                            <p>{{ $developplanname[$index] }}</p>
                                        </div>
                                    @endforeach
                                </div>               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(13)">
                            {{ trans('Back') }}
                        </button>
                        <button class="btn btn-success mt-0" type="button" wire:click="fourteenStepSubmit">
                            {{ trans('next') }}
                        </button>
            </div>
    </div>
</div>
    </div>
