<div>
    
    @if ($currentStep != 1)
        <div style="display: none" class="row setup-content" id="step-1">
    @endif
            <div class="card min-height-100 " >
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mx-auto " style="position:relative ;">
                            
                            <h3 class="text-dark">{{ __('Themes') }}</h3>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="">
                        {{-- <h6>{{ __('themes') }} #{{ $index + 1 }}</h6> --}}
                        <div class="">
                            <label for="">{{ __('name') }}</label>
                            <select   class="form-control" wire:model="theme_id"  >
                                <option value=""  > -- اختر ثيم--</option>
                                @foreach ($themes as $index => $theme)
                                    <option value="{{ $theme->id }} "> {{ $theme->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <hr>
                    </div>
                    <button type="button" class="btn btn-info btn-sm float-left mt-3 mb-0" wire:click="firstStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
                <div class="col-md-8">
                    <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
                        <div class="container">
                            <div class="row">
                                @include('livewire.logo')
                                <label for="company_desc" class="form-label mt-3">{{ __('Themes') }}</label>
                                <div class="col-md-12 mt-4">
                                    @if($themex )
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label> {{ __('requireinvestment') }}</label>
                                                <div class="">
                                                    @if($themex->image1)
                                                        <img src="{{display_file($themex->image1)}}" alt="" width="200">
                                                    @else
                                                        <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview1" width="200">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label> {{ __('solve') }}</label>
                                                <div class="">
                                                    @if($themex->image2)
                                                        <img src="{{display_file($themex->image2)}}" alt="" width="200">
                                                    @else
                                                        <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview1" width="200">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label> {{ __('developplan') }}</label>
                                                <div class="">
                                                    @if($themex->image3)
                                                        <img src="{{display_file($themex->image3)}}" alt="" width="200">
                                                    @else
                                                        <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview1" width="200">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label> {{ __('marketplan') }}</label>
                                                <div class="">
                                                    @if($themex->image4)
                                                        <img src="{{display_file($themex->image4)}}" alt="" width="200">
                                                    @else
                                                        <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview1" width="200">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label> {{ __('restpage') }}</label>
                                                <div class="">
                                                    @if($themex->image5)
                                                        <img src="{{display_file($themex->image5)}}" alt="" width="200">
                                                    @else
                                                        <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview1" width="200">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>