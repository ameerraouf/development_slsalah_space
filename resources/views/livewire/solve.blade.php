@if ($currentStep != 6)
<div style="display: none" class="row setup-content" id="step-3">
    @endif
    <div class="card min-height-250 p-3">
        <div class="container">
            <h5 class="text-dark text-center mb-3">{{ __('solve') }}</h5>
            <div class="row g-3">
                <div class="col-md-12 row row-cols-1 row-cols-lg-3 g-3 justify-content-center">
                    <div class="col">
                        <div>
                            <label for="">{{ __('solve1') }}</label>
                            <input type="text" class="form-control" wire:model='solve1' wire:change="solveSubmit1"
                                style="border: 2px solid  !important;">
                            @error('solve1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve2') }}</label>
                            <input type="text" class="form-control" wire:model='solve2' wire:change="solveSubmit2"
                                style="border: 2px solid  !important;">
                            @error('solve2')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve3') }}</label>
                            <input type="text" class="form-control" wire:model='solve3' wire:change="solveSubmit3"
                                style="border: 2px solid  !important;">
                            @error('solve3')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <label for="">{{ __('solve4') }}</label>
                            <input type="text" class="form-control" wire:model='solve4' wire:change="solveSubmit4"
                                style="border: 2px solid  !important;">
                            @error('solve4')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve5') }}</label>
                            <input type="text" class="form-control" wire:model='solve5' wire:change="solveSubmit5"
                                style="border: 2px solid  !important;">
                            @error('solve5')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="">
                            <label for="">{{ __('solve6') }}</label>
                            <input type="text" class="form-control" wire:model='solve6' wire:change="solveSubmit6"
                                style="border: 2px solid  !important;">
                            @error('solve6')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col">
                    <div class="">
                        <label for="">{{ __('solve7') }}</label>
                        <input type="text" class="form-control" wire:model='solve7' wire:change="solveSubmit7"
                            style="border: 2px solid  !important;">
                        @error('solve7')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="">
                        <label for="">{{ __('solve8') }}</label>
                        <input type="text" class="form-control" wire:model='solve8' wire:change="solveSubmit8"
                            style="border: 2px solid  !important;">
                        @error('solve8')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="">
                        <label for="">{{ __('solve9') }}</label>
                        <input type="text" class="form-control" wire:model='solve9' wire:change="solveSubmit9"
                            style="border: 2px solid  !important;">
                        @error('solve9')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class=" card card-slide" style="background-image: url('{{ display_file($image2)}}');">
                        <div class="container py-4">
                            <div class="row">
                                @include('livewire.logo')
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark mb-4">الحل</h3>
                                    <p class="mb-3">اوصف حل الى تعمل الشركه على استخدامه فى حل المشكله</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve1') }}</label>
                                    <p>{{ $solve1 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve2') }}</label>
                                    <p>{{ $solve2 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve3') }}</label>
                                    <p>{{ $solve3 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve4') }}</label>
                                    <p>{{ $solve4 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve5') }}</label>
                                    <p>{{ $solve5 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve6') }}</label>
                                    <p>{{ $solve6 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve7') }}</label>
                                    <p>{{ $solve7 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve8') }}</label>
                                    <p>{{ $solve8 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('solve9') }}</label>
                                    <p>{{ $solve9 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(5)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-0" type="button" wire:click="sixthStepSubmit">
                        {{ trans('next') }}
                    </button>
            </div>
        </div>
    </div>
</div>