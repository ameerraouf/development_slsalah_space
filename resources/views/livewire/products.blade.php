<div>
    @if ($currentStep != 8)
    <div style="display: none" class="row setup-content" id="step-5">
        @endif
        <div class="card min-height-250 p-3">
            <div class="container">
                <h5 class="text-dark text-center mb-3">{{ __('products') }}</h5>
                <div class="row g-4">
                    <div class="col-md-12 row row-cols-1 row-cols-lg-2 row-cols-xl-6 justify-content-center g-3">
                        @foreach ($selectedProducts as $index => $product)
                        <div class="col">
                            <label for="title{{ $index }}">اسم المنتج{{ $index+1 }} : </label>
                            <input type="text" wire:model="title.{{ $index }}" class="form-control">
                            @error("title.{$index}")<span class="text-danger my-1">{{ $message }}</span>@enderror
                            <label for="description{{ $index }}">وصف المنتج{{ $index+1 }} : </label>
                            <textarea wire:model="description.{{ $index }}" class="form-control"></textarea>
                            @error("description.{$index}")<span class="text-danger my-1">{{ $message }}</span>@enderror
                            @if (App\Models\Projects::count() > 6)
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $product->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @include('projects.delete')
                            @endif
                        </div>
                        @endforeach
                        <div class="col d-flex align-items-end justify-content-center">
                            <button class="btn btn-info m-0 btn-sm" type="button"
                                wire:click="updateProducts">{{ __('Update') }}</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" card card-slide" style="background-image: url('{{ display_file($image5)}}');">
                            <div class="container p-4">
                                <div class="row g-3">
                                    @include('livewire.logo')
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3 class="text-dark mb-4">{{ __('products') }}</h3>
                                    </div>
                                    @foreach ($selectedProducts as $index => $product)
                                    <div class="col-md-4">
                                        <label for="title{{ $index }}">اسم المنتج{{ $index+1 }} : </label>
                                        <p class="mb-1">{{ $title[$index] }}</p>
                                        <label for="description{{ $index }}">وصف المنتج{{ $index+1 }} : </label>
                                        <p class="mb-0">{{ $description[$index] }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                    <button class="btn btn-warning mt-0" type="button" wire:click="back(7)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-0" type="button" wire:click="eighthStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>