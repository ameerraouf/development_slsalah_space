<div>
    @if ($currentStep != 8)
        <div style="display: none" class="row setup-content" id="step-5">
    @endif
        <div class="card min-height-250 " >
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto " style="position:relative ;">
                        
                        <h3 class="text-dark">{{ __('products') }}</h3>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @foreach ($selectedProducts as $index => $product)
                <div >
                    <label for="title{{ $index }}">اسم المنتج{{ $index+1 }} : </label>
                    <input type="text" wire:model="title.{{ $index }}" class="form-control">
                    @error("title.{$index}")<span class="text-danger">{{ $message }}</span>@enderror
                    <br>
                    <label for="description{{ $index }}">وصف المنتج{{ $index+1 }} : </label>
                    <textarea wire:model="description.{{ $index }}" class="form-control"></textarea>
                    @error("description.{$index}")<span class="text-danger">{{ $message }}</span>@enderror
                    <br>
                    @if (App\Models\Projects::count() > 6)   
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $product->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @include('projects.delete')
                    @endif
                    <br>
                </div>
                @endforeach
                <div class="col-md-4  mt-5">
                    <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updateProducts">Update</button>
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(7)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="eighthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                    <div class="container">
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">منتجاتنا/خدماتنا</h3>
                            </div>
                            @foreach ($selectedProducts as $index => $product)
                                <div class="col-md-4  mt-5">
                                    <label for="title{{ $index }}">اسم المنتج{{ $index+1 }} : </label>
                                    <p>{{ $title[$index] }}</p>
                                    <br>
                                    <label for="description{{ $index }}">وصف المنتج{{ $index+1 }} : </label>
                                    <p>{{ $description[$index] }}</p>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
