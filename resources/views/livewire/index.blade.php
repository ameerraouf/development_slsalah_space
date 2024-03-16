<div>

    @if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="card min-height-100 p-3 ">
            <div class="container">
                <h5 class="text-dark text-center mb-3">{{ __('investshow') }}</h5>
                <button type="button" class="btn btn-info  my-0 " wire:click="firstStepSubmit"
                    {{ auth()->user()->investshow?->id != null ? 'disabled':''}}>
                    <i class="fa fa-plus"></i> {{ trans('add') }}
                </button>
                <table class="table align-items-center mb-0" id="cloudonex_table">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            <th class=" text-uppercase text-secondary text-xxs opacity-7">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="target-table">
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

                                <button type="button" class="btn btn-success" wire:click="firstStepSubmit"
                                    title="@lang('edit')">
                                    <i class="fa fa-edit"></i>
                                </button>
                                {{-- <button type="button"  class="btn btn-danger " title="@lang('download')" wire:click="downloadPdf">
                                                            <i class="fa fa-print"></i> 
                                                        </button> --}}
                                {{--   --}}
                                {{-- <a href="{{ route('myPlan.investshow.download') }}" class="btn btn-warning "
                                title="@lang('show')">
                                <i class="fa fa-print"></i>
                                </a> --}}
                                <a href="{{ route('myPlan.investshow.show') }}" class="btn btn-warning "
                                    title="@lang('show')">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- <label for="company_desc" class="form-label mt-3">{{ __('investshow') }}</label> --}}
                    {{-- <div class="col-md-4  mt-5">
                            <button class="btn btn-warning mt-3" type="button" ">{{ __('save') }}</button>
                </div> --}}
            </div>
        </div>
</div>
</div>