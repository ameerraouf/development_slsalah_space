<div>
    @if ($currentStep != 5)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
        <div class=" card min-height-250" style="background-image: url('{{ PUBLIC_DIR }}/img/back.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">منتجاتنا/خدماتنا</h3>
                    </div>
                    {{-- <form wire:submit.prevent="updateProducts"  > --}}
                        @foreach ($selectedProducts as $index => $product)
                            <div class="col-md-4  mt-5">
                                <label for="title{{ $index }}">اسم المنتج{{ $index+1 }} : </label>
                                <input type="text" wire:model="title.{{ $index }}" class="form-control">
                                @error("title.{$index}")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="description{{ $index }}">وصف المنتج{{ $index+1 }} : </label>
                                <textarea wire:model="description.{{ $index }}" class="form-control"></textarea>
                                @error("description.{$index}")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                {{-- <button class="btn btn-danger btn-sm mt-3" type="button"
                                    wire:click="deleteProduct({{ $product->id }})" title="حذف">
                                    <i class="fa fa-trash fa-lg"></i>
                                </button> --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $product->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                @include('projects.delete')
                                {{-- {{ var_export($product->id) }} --}}
                            </div>
                        @endforeach
                        <div class="col-md-4  mt-5">
                            <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updateProducts">Update</button>
                            {{-- <button class="btn btn-primary btn-sm mt-3" type="submit" >Update</button> --}}
                        </div>
                    {{-- </form> --}}

                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(4)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="fifthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>
</div>
