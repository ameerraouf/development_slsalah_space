@if ($currentStep != 10)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
        
        <div class="card min-height-250 " >
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto " style="position:relative ;">
                        
                        <h3 class="text-dark">{{ __('compatitive') }}</h3>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @foreach ($selectedCompat as $index => $compat)
                    <div class="" >
                        <label for="titlecompat{{ $index }}">الوصف {{ $index +1 }}</label>
                        <input type="text" wire:model="titlecompat.{{ $index }}" id="titlecompat{{ $index }}" class="form-control">
                        @error("titlecompat.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                        <br>
                        <label for="descriptioncompat{{ $index }}">توضيح الوصف {{ $index +1 }}</label>
                        <textarea wire:model="descriptioncompat.{{ $index }}" id="editor  descriptioncompat{{ $index }}" class="form-control"  ></textarea>
                        @error("descriptioncompat.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                    </div>
                @endforeach 
                <div class="col-md-4  mt-5">
                    <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updatecompats">Update</button>
                </div> 
                <button class="btn btn-warning mt-3" type="button" wire:click="back(9)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="tenthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        
                        
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('compatitive') }}</h3>
                            </div>
                            @foreach ($selectedCompat as $index => $compat)
                                <div class="col-md-4  mt-5" >
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
    </div>