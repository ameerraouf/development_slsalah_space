<div>
    
    @if ($currentStep != 1)
        <div style="display: none" class="row setup-content" id="step-1">
    @endif
            <div class="card min-height-100 " >
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mx-auto " style="position:relative ;">
                            
                            <h3 class="text-dark">{{ __('investshow') }}</h3>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-info  mt-3 " wire:click="firstStepSubmit" 
                        {{ auth()->user()->investshow?->id != null ? 'disabled':''}} >
                            <i class="fa fa-plus"></i> {{ trans('add') }}
                        </button>
                        {{-- <label for="company_desc" class="form-label mt-3">{{ __('investshow') }}</label> --}}
                        <div class="card card-body mb-4">

                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0" id="cloudonex_table">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                                <th class=" text-uppercase text-secondary text-xxs opacity-7">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class = "target-table">
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ __('investshow') }} </h6>
                                                                <p class="text-xs text-secondary mb-0"></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    
                                                    <td class="align-middle">
                                                        <a href="" class="btn btn-success " title="@lang('edit')">
                                                            <i class="fa fa-edit"></i> 
                                                        </a>
                                                        <a href="" class="btn btn-danger " title="@lang('download')">
                                                            <i class="fa fa-print"></i> 
                                                        </a>
                                                        <a href="" class="btn btn-warning " title="@lang('show')">
                                                            <i class="fa fa-eye"></i> 
                                                        </a>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4  mt-5">
                            <button class="btn btn-warning mt-3" type="button" ">{{ __('save') }}</button>
                        </div> --}}
                       
                    </div>
                </div>
            </div>
        </div>
</div>