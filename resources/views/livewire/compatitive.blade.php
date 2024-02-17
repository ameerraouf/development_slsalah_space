@if ($currentStep != 6)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">الميزه التنافسيه</h3>
                    </div>

                        @foreach ($selectedCompat as $index => $compat)
                            <div class="col-md-4  mt-5" >
                                <label for="titlecompat{{ $index }}">الوصف</label>
                                <input type="text" wire:model="titlecompat.{{ $index }}" id="titlecompat{{ $index }}" class="form-control">
                                <label for="descriptioncompat{{ $index }}">توضيح الوصف</label>
                                <textarea wire:model="descriptioncompat.{{ $index }}" id="editor  descriptioncompat{{ $index }}" class="form-control"  ></textarea>
                                
                            </div>
                            @endforeach
                            {{-- {{ var_export($product->id) }}
                            {{ var_export($index) }} --}}
                        <div class="col-md-4  mt-5">
                            <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updatecompats">Update</button>
                        </div>                      
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(5)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="sixthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>

        
    </div>