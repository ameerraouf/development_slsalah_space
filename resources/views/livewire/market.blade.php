@if ($currentStep != 6)
    <div style="display: none" class="row setup-content" id="step-4">
@endif
        <div class="card min-height-250 " >
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto " style="position:relative ;">
                        
                        <h3 class="text-dark">{{ __('market') }}</h3>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="">
                        @foreach ($markets as $index => $market)
                            <h6>{{ __('market') }} #{{ $index + 1 }}</h6>
                            <div class="">
                                <label for="" > السنه </label>
                                <select wire:model="myear.{{ $index }}"  class="form-control">
                                    @php $currentYear = date('Y'); @endphp
                                    @for ($i = $currentYear; $i <= $currentYear + 4; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error("myear.{$index}")<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="">
                                <label for="" > حجم السوق</label>
                                <input type="text" class="form-control" wire:model='msize.{{ $index }}' >
                                @error("msize.{$index}")<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="">
                                <label for="">الوحده </label>
                                <select wire:model="munit.{{ $index }}"  class="form-control">
                                    <option value="million">{{ __('million') }}</option>
                                    <option value="billion">{{ __('billion') }}</option>
                                </select>
                                @error("munit.{$index}")<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <button class="btn btn-success mt-3" type="button" wire:click="updateMarkets">
                        {{ trans('submit') }}
                    </button>
                </div>
                {{-- <div class="row">
                    <div class="col-md-3  mt-5">
                        <label for="" > السنه {{ $theyear  }}</label>
                        <select  class="form-control" wire:model='theyear'  >
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="{{ $year }}"> {{ $year }}</option>
                            <option value="{{ $year2 }}">{{ $year2 }}</option>
                            <option value="{{ $year3 }}">{{ $year3 }}</option>
                            <option value="{{ $year4 }}">{{ $year4 }}</option>
                            <option value="{{ $year5 }}">{{ $year5 }}</option>
                        </select>
                        @error('theyear')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size' >
                            @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit' >
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit1">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                        <label for="" > السنه {{ $theyear2  }}</label>
                        <select  class="form-control" wire:model='theyear2'  >
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="{{ $year }}"> {{ $year }}</option>
                            <option value="{{ $year2 }}">{{ $year2 }}</option>
                            <option value="{{ $year3 }}">{{ $year3 }}</option>
                            <option value="{{ $year4 }}">{{ $year4 }}</option>
                            <option value="{{ $year5 }}">{{ $year5 }}</option>
                        </select>
                        @error('theyear2')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size2'>
                            @error('size2')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit2'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit2')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit2">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                            <label for="" > السنه {{ $theyear3  }}</label>
                            <select  class="form-control" wire:model='theyear3'  >
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="{{ $year }}"> {{ $year }}</option>
                                <option value="{{ $year2 }}">{{ $year2 }}</option>
                                <option value="{{ $year3 }}">{{ $year3 }}</option>
                                <option value="{{ $year4 }}">{{ $year4 }}</option>
                                <option value="{{ $year5 }}">{{ $year5 }}</option>
                            </select>
                            @error('theyear3')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size3'>
                            @error('size3')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit3'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit3')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit3">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                            <label for="" > السنه {{ $theyear4  }}</label>
                            <select  class="form-control" wire:model='theyear4'  >
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="{{ $year }}"> {{ $year }}</option>
                                <option value="{{ $year2 }}">{{ $year2 }}</option>
                                <option value="{{ $year3 }}">{{ $year3 }}</option>
                                <option value="{{ $year4 }}">{{ $year4 }}</option>
                                <option value="{{ $year5 }}">{{ $year5 }}</option>
                            </select>
                            @error('theyear4')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size4'>
                            @error('size4')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit4'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit4')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit4">
                            {{ trans('submit') }}
                        </button>
                    </div>

                    <div class="col-md-3  mt-5">
                            <label for="" > السنه {{ $theyear5  }}</label>
                            <select  class="form-control" wire:model='theyear5'  >
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="{{ $year }}"> {{ $year }}</option>
                                <option value="{{ $year2 }}">{{ $year2 }}</option>
                                <option value="{{ $year3 }}">{{ $year3 }}</option>
                                <option value="{{ $year4 }}">{{ $year4 }}</option>
                                <option value="{{ $year5 }}">{{ $year5 }}</option>
                            </select>
                            @error('theyear5')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                            <label for="" > حجم السوق</label>
                            <input type="text" class="form-control" wire:model='size5'>
                            @error('size5')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <label for="">الوحده </label>
                        <select  class="form-control" wire:model='unit5'>
                            <option value="" readonly disabled selected>اختر الوحده</option>
                            <option value="million">مليون</option>
                            <option value="billion">مليار</option>
                        </select>
                        @error('unit5')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3  mt-5">
                        <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit5">
                            {{ trans('submit') }}
                        </button>
                    </div>
                </div> --}}
                <button class="btn btn-warning mt-3" type="button" wire:click="back(5)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="sixthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                    <div class="container">
                        @include('livewire.logo')
                        {{-- <div class="row">
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark">حجم السوق</h3>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق  {{ $size }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit) }}</label>
                                </div>

        
                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear2  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size2 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit2) }}</label>
                                </div>

                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear3  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size3 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit3) }}</label>
                                </div>

                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear4  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size4 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit4) }}</label>
                                </div>

                                <div class="col-md-4  mt-5">
                                    <label for="" > السنه {{ $theyear5  }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="" > حجم السوق {{ $size5 }}</label>
                                </div>
                                <div class="col-md-4  mt-5">
                                    <label for="">الوحده {{ __($unit) }}</label>
                                </div>                       
                        </div> --}}
                        {{-- <livewire:marketchart /> --}}
                        @include('livewire.marketchart')
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('js')

@endpush