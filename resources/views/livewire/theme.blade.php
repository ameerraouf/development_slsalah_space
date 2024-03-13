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
            <div class="container">
                <div class="row">
                    {{-- <div class="col-md-4">
                        <div class="">
                            <h6>{{ __('themes') }} #{{ $index + 1 }}</h6>
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
                        
                    </div> --}}
                    <div class="col-md-12">
                        {{-- <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');"> --}}
                            {{-- <div class="container"> --}}
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-md-12 mt-4" style="margin-right: 1300px;">
                                        @php $user = Auth::user(); @endphp
                                        @if ($user->company && $user->company->company_logo)
                                            <img src="{{ PUBLIC_DIR }}/uploads/{{ $user->company->company_logo }}" 
                                            class="w-20 border-radius-lg shadow-sm " style="width: 100px !important;">
                                        @endif
                                    </div> --}}
                                    <label for="company_desc" class="form-label mt-3">{{ __('Themes') }}</label>
                                    <div class="col-md-12 mt-4">
                                        {{-- @if($themex )
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
                                        @endif --}}
                                        <div class="row">
                                            @foreach ($themes as $index => $theme)
                                                <div class="col-md-4 ml-2">
                                                    <div class="form-check">
                                                        <input type="radio" class="" value="{{ $theme->id }}" wire:model="theme_id" 
                                                          {{ auth()->user()->themeuser?->theme_id == $theme->id ? 'checked':''}} >
                                                          @error("theme_id") <span class="text-danger">{{ $message }}</span> @enderror
                                                        <label class=""> {{ $theme->name }}</label>
                                                    </div>
                                                    <div class="">
                                                        @if($theme->image1)
                                                            <img src="{{display_file($theme->image1)}}" alt="" width="400px" height="250px">
                                                        @else
                                                            <img src="{{ asset('no-image.jpg') }}" alt="" class="img-thumbnail img-preview1" width="200">
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                            @endforeach
                                            {{-- {{ var_export($theme_id) }} --}}
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                        <div class="col-md-4  mt-5">
                            <button class="btn btn-warning mt-3" type="button" wire:click="themeSubmit">{{ __('save') }}</button>
                        </div>
                        <button type="button" class="btn btn-info  mt-3 " wire:click="firstStepSubmit">
                            {{ trans('next') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
</div>