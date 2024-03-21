<div>
    @if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="card min-height-250 p-3">
            <div class="container">
                <h5 class="text-dark text-center mb-3">{{ __('welcome') }}</h5>
                <div class="row">
                    <div class="col-md-12">
                        {{-- <img src="{{display_file($image1)}}" alt=""> --}}
                        {{-- <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
                        --}}
                        {{-- {{ auth()->user()->themeuser?->theme_id }} --}}
                        {{-- <img src="{{display_file($theme->image1)}}" alt="" width="400px" height="250px"> --}}
                        {{-- <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/uploads/{{ auth()->user()->themeuser?->image1 }}');">
                        --}}
                        <div class="card min-height-250" style="background-image: url('{{  display_file($image5)}}');">
                            <div class="container py-4">
                                <div class="row">
                                    @include('livewire.logo')
                                    <div class="col-md-12">
                                        <h4 class="mb-0 text-center">العرض الاستثمارى</h4>
                                    </div>
                                    <p class="mb-0">{{ __('welcome') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
            <button class="btn btn-warning mt-0" type="button" wire:click="back(2)">
                {{ trans('Back') }}
            </button>
            <button type="button" class="btn btn-info  mt-0 " wire:click="thirdStepSubmit">
                {{ trans('next') }}
            </button>
        </div>
    </div>
</div>