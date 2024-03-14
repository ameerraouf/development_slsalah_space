@if ($currentStep != 11)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
<div class="card min-height-250 " >
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto " style="position:relative ;">
                
                <h3 class="text-dark">{{ __('competitors') }}</h3>
            </div>
        </div> 
    </div>
</div>
        <div class="row">
            <div class="col-md-4">
                <div class="">
                    <div class="card card-body mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="cloudonex_table">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs "></th>
                                            @foreach($selectedco as $index => $co)
                                                <th class="text-uppercase text-secondary text-xs ">
                                                    <input type="text"  class="form-control" wire:model="coname.{{ $index }}">
                                                    @error("coname.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class=" font-weight-bold mb-0">سعر المنتح</p>
                                                <p class=" font-weight-bold mb-0">جوده المنتج</p>
                                                <p class=" font-weight-bold mb-0">التقنيه المستخدمه</p>
                                            </td> 
                                            @foreach($selectedco as $index => $co)                                                      
                                                <td>
                                                    <div>
                                                        <input type="checkbox" wire:model="coprice.{{ $index }}" >
                                                        <span style="color:{{ $coprice[$index]?'':'red' }} ">
                                                            <i class="fas fa-{{ $coprice[$index]?'check-circle':'times-circle' }}"></i>
                                                        </span>
                                                        {{-- {{ var_export($coprice[$index] ?? null) }} --}}
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" wire:model="coquality.{{ $index }}" >
                                                        <span style="color:{{ $coquality[$index]?'':'red' }} ">
                                                        <i class="fas fa-{{ $coquality[$index]?'check-circle':'times-circle' }}"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" wire:model="cotech.{{ $index }}" >
                                                        <span style="color:{{ $cotech[$index]?'':'red' }} ">
                                                        <i class="fas fa-{{ $cotech[$index]?'check-circle':'times-circle' }}"></i>
                                                        </span>
                                                    </div>
                                                </td>                                                       
                                            @endforeach                                                                                                      
                                        </tr>
                                        {{-- updatecompators --}}
                                    </tbody>
                                </table>
                                <div class="col-md-4  mt-5">
                                    <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updatecompators">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(10)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="elevenStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');" >
                    <div class="container">
                        <div class="row">
                            @include('livewire.logo')
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">{{ __('competitors') }}</h3>
                            </div>
                            <div class="col-md-12">
                                    <div class="card card-body mb-4">
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0" id="cloudonex_table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-uppercase text-secondary text-xs "></th>
                                                            @foreach($selectedco as $index => $co)
                                                                <th class="text-uppercase text-secondary text-xs ">
                                                                    <p>{{ $coname[$index] }} </p>
                                                                </th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p class=" font-weight-bold mb-0">سعر المنتح</p>
                                                                <p class=" font-weight-bold mb-0">جوده المنتج</p>
                                                                <p class=" font-weight-bold mb-0">التقنيه المستخدمه</p>
                                                            </td> 
                                                            @foreach($selectedco as $index => $co)                                                      
                                                                <td>
                                                                    <div>
                                                                        {{-- <input type="checkbox" wire:model="coprice.{{ $index }}" readonly> --}}
                                                                        <span style="color:{{ $coprice[$index]?'':'red' }} ">
                                                                            <i class="fas fa-{{ $coprice[$index]?'check-circle':'times-circle' }}"></i>
                                                                        </span>
                                                                        {{-- {{ var_export($coprice[$index] ?? null) }} --}}
                                                                    </div>
                                                                    <div>
                                                                        {{-- <input type="checkbox" wire:model="coquality.{{ $index }}" readonly> --}}
                                                                        <span style="color:{{ $coquality[$index]?'':'red' }} ">
                                                                        <i class="fas fa-{{ $coquality[$index]?'check-circle':'times-circle' }}"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div>
                                                                        {{-- <input type="checkbox" wire:model="cotech.{{ $index }}" readonly> --}}
                                                                        <span style="color:{{ $cotech[$index]?'':'red' }} ">
                                                                        <i class="fas fa-{{ $cotech[$index]?'check-circle':'times-circle' }}"></i>
                                                                        </span>
                                                                    </div>
                                                                </td>                                                       
                                                            @endforeach                                                                                                      
                                                        </tr>
                                                        {{-- updatecompators --}}
                                                    </tbody>
                                                </table>
                                                {{-- <div class="col-md-4  mt-5">
                                                    <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updatecompators">Update</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
           
        </div>
    </div>
