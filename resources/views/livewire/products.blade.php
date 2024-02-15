@if ($currentStep != 5)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">منتجاتنا/خدماتنا</h3>
                    </div>

                        @foreach ($selectedProducts as $index => $product)
                            <div class="col-md-4  mt-5" >
                                <label for="title{{ $index }}">اسم المنتج:</label>
                                <input type="text" wire:model="title.{{ $index }}" id="title{{ $index }}" class="form-control">
                                <label for="description{{ $index }}">وصف المنتج:</label>
                                <textarea wire:model="description.{{ $index }}" id="editor  description{{ $index }}" class="form-control"  ></textarea>
                                <button class="btn btn-danger btn-sm mt-3" type="button" wire:click="deleteProduct({{ $product->id }})" title="حذف">
                                    <i class="fa fa-trash fa-lg"></i>
                                </button>
                                {{-- {{ var_export($product->id) }}
                                {{ var_export($index) }} --}}
                            </div>
                        @endforeach
                        <div class="col-md-4  mt-5">
                            <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updateProducts">Update</button>
                        </div>
                    {{-- <div class="col-md-4  mt-5">
                        <label for="" > اسم المنتج</label>
                        <input type="text" class="form-control"  wire:model='projecttitle1'>
                        @error('projecttitle1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <label for="" > وصف المنتج</label>
                        <textarea class="form-control"  wire:model='projectdesc1' wire:change=''></textarea>
                        @error('projectdesc1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <button class="btn btn-primary mt-3" type="button" wire:click="">
                            {{ trans('submit') }}
                        </button>
                        <button class="btn btn-danger mt-3" type="button" wire:click="">
                            {{ trans('delete') }}
                        </button>
                    </div>
                     
                    <div class="col-md-4  mt-5">
                        <label for="" > اسم المنتج</label>
                        <input type="text" class="form-control"  wire:model='projecttitle1'>
                        @error('projecttitle1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <label for="" > وصف المنتج</label>
                        <textarea class="form-control"  wire:model='projectdesc1' wire:change=''></textarea>
                        @error('projectdesc1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <button class="btn btn-primary mt-3" type="button" wire:click="">
                            {{ trans('submit') }}
                        </button>
                        <button class="btn btn-danger mt-3" type="button" wire:click="">
                            {{ trans('delete') }}
                        </button>
                    </div>

                    <div class="col-md-4  mt-5">
                        <label for="" > اسم المنتج</label>
                        <input type="text" class="form-control"  wire:model='projecttitle1'>
                        @error('projecttitle1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <label for="" > وصف المنتج</label>
                        <textarea class="form-control"  wire:model='projectdesc1' wire:change=''></textarea>
                        @error('projectdesc1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <button class="btn btn-primary mt-3" type="button" wire:click="">
                            {{ trans('submit') }}
                        </button>
                        <button class="btn btn-danger mt-3" type="button" wire:click="">
                            {{ trans('delete') }}
                        </button>
                    </div>  

                    <div class="col-md-4  mt-5">
                        <label for="" > اسم المنتج</label>
                        <input type="text" class="form-control"  wire:model='projecttitle1'>
                        @error('projecttitle1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <label for="" > وصف المنتج</label>
                        <textarea class="form-control"  wire:model='projectdesc1' wire:change=''></textarea>
                        @error('projectdesc1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <button class="btn btn-primary mt-3" type="button" wire:click="">
                            {{ trans('submit') }}
                        </button>
                        <button class="btn btn-danger mt-3" type="button" wire:click="">
                            {{ trans('delete') }}
                        </button>
                    </div>  

                    <div class="col-md-4  mt-5">
                        <label for="" > اسم المنتج</label>
                        <input type="text" class="form-control"  wire:model='projecttitle1'>
                        @error('projecttitle1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <label for="" > وصف المنتج</label>
                        <textarea class="form-control"  wire:model='projectdesc1' wire:change=''></textarea>
                        @error('projectdesc1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <button class="btn btn-primary mt-3" type="button" wire:click="">
                            {{ trans('submit') }}
                        </button>
                        <button class="btn btn-danger mt-3" type="button" wire:click="">
                            {{ trans('delete') }}
                        </button>
                    </div>

                    <div class="col-md-4  mt-5">
                        <label for="" > اسم المنتج</label>
                        <input type="text" class="form-control"  wire:model='projecttitle1'>
                        @error('projecttitle1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <label for="" > وصف المنتج</label>
                        <textarea class="form-control"  wire:model='projectdesc1' wire:change=''></textarea>
                        @error('projectdesc1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        <button class="btn btn-primary mt-3" type="button" wire:click="">
                            {{ trans('submit') }}
                        </button>
                        <button class="btn btn-danger mt-3" type="button" wire:click="">
                            {{ trans('delete') }}
                        </button>
                    </div> --}}
                       
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
   