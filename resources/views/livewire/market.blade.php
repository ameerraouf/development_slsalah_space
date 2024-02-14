@if ($currentStep != 4)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">حجم السوق</h3>
                    </div>

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
                                @error('theyear')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                                <label for="" > حجم السوق</label>
                                <input type="text" class="form-control" wire:model='size' >
                                @error('size')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                            <label for="">الوحده </label>
                            <select  class="form-control" wire:model='unit' >
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="million">مليون</option>
                                <option value="billion">مليار</option>
                            </select>
                            @error('unit')<div class="alert alert-danger">{{ $message }}</div>@enderror
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
                                @error('theyear2')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                                <label for="" > حجم السوق</label>
                                <input type="text" class="form-control" wire:model='size2'>
                                @error('size2')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                            <label for="">الوحده </label>
                            <select  class="form-control" wire:model='unit2'>
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="million">مليون</option>
                                <option value="billion">مليار</option>
                            </select>
                            @error('unit2')<div class="alert alert-danger">{{ $message }}</div>@enderror
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
                                @error('theyear3')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                                <label for="" > حجم السوق</label>
                                <input type="text" class="form-control" wire:model='size3'>
                                @error('size3')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                            <label for="">الوحده </label>
                            <select  class="form-control" wire:model='unit3'>
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="million">مليون</option>
                                <option value="billion">مليار</option>
                            </select>
                            @error('unit3')<div class="alert alert-danger">{{ $message }}</div>@enderror
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
                                @error('theyear4')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                                <label for="" > حجم السوق</label>
                                <input type="text" class="form-control" wire:model='size4'>
                                @error('size4')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                            <label for="">الوحده </label>
                            <select  class="form-control" wire:model='unit4'>
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="million">مليون</option>
                                <option value="billion">مليار</option>
                            </select>
                            @error('unit4')<div class="alert alert-danger">{{ $message }}</div>@enderror
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
                                @error('theyear5')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                                <label for="" > حجم السوق</label>
                                <input type="text" class="form-control" wire:model='size5'>
                                @error('size5')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                            <label for="">الوحده </label>
                            <select  class="form-control" wire:model='unit5'>
                                <option value="" readonly disabled selected>اختر الوحده</option>
                                <option value="million">مليون</option>
                                <option value="billion">مليار</option>
                            </select>
                            @error('unit5')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3  mt-5">
                            <button class="btn btn-success mt-3" type="button" wire:click="marketSubmit5">
                                {{ trans('submit') }}
                            </button>
                        </div>

 {{-- {{ var_export($marketid) }} 
 {{ var_export($marketid2) }} 
 {{ var_export($marketid3) }} 
 {{ var_export($marketid4) }} 
 {{ var_export($marketid5) }}  --}}
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(3)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="forthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>