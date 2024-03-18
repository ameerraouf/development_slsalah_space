@if ($currentStep != 10)
<div style="display: none" class="row setup-content" id="step-5">
    @endif

    <div class="card min-height-250 p-3">
        <div class="container">
            <h5 class="text-dark text-center mb-3">{{ __('compatitive') }}</h5>
            <div class="row g-3">
                <div class="col-md-12 row row-cols-1 row-cols-lg-2 row-cols-xl-6 justify-content-center g-3">
                    @foreach ($selectedCompat as $index => $compat)
                    <div class="col">
                        <label for="titlecompat{{ $index }}">الوصف {{ $index +1 }}</label>
                        <input type="text" wire:model="titlecompat.{{ $index }}" id="titlecompat{{ $index }}"
                            class="form-control">
                        @error("titlecompat.{$index}")<span class="text-danger my-1">{{ $message }}</span>@enderror
                        <label for="descriptioncompat{{ $index }}">توضيح الوصف {{ $index +1 }}</label>
                        <textarea wire:model="descriptioncompat.{{ $index }}" id="editor  descriptioncompat{{ $index }}"
                            class="form-control"></textarea>
                        @error("descriptioncompat.{$index}")<span
                            class="text-danger my-1">{{ $message }}</span>@enderror
                    </div>
                    @endforeach
                    <div class="col text-center">
                        <button class="btn btn-success mt-3 btn-sm" type="button" wire:click="updatecompats">Update</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                        <div class="container p-4">


                            <div class="row">
                                @include('livewire.logo')
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark mb-3">{{ __('compatitive') }}</h3>
                                </div>
                                @foreach ($selectedCompat as $index => $compat)
                                <div class="col-md-4">
                                    <label for="titlecompat{{ $index }}">الوصف {{ $index +1 }}</label>
                                    <p>{{ $titlecompat[$index] }}</p>
                                    <br>
                                    <label for="descriptioncompat{{ $index }}">توضيح الوصف {{ $index +1 }}</label>
                                    <p>{{ $descriptioncompat[$index] }}</p>
                                    <br>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(9)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-0" type="button" wire:click="tenthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>
</div>