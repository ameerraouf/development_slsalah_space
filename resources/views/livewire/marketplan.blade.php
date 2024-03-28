@if ($currentStep != 13)
    <div style="display: none" class="row setup-content" id="step-5">
        <style>
            .box-chart-market {
                position: relative;
                margin-inline: auto;
                display: flex;
                flex-wrap: wrap;
                width: 476px;
                height: 451px;
            }
            .box-chart-market > svg {
                position: absolute;
                left: 50%;
            top: 0;
            transform: translateX(-50%);
            }
            .box-chart-market .item{
                width: 213px;
                word-break: break-word;
                position: absolute;
            }
            .box-chart-market .item label{
            margin-inline: 0;
            }
            .box-chart-market .item ul{
                padding: 0;
            list-style: none;
            }
            .box-chart-market .item-1{
                right: -25%;
            translate: 0 -19px;
            }
            .box-chart-market .item-2{
                right: 101%;
                translate: 0 84px;
            }
            .box-chart-market .item-3{
                right: -27%;
                translate: 0 188px;
            }
            .box-chart-market .item-4{
                right: 101%;
            translate: 0 298px;
        }
        @media (max-width: 992px) {
            .box-chart-market {
                flex-direction: column !important;
                height: auto !important;
                width: 100% !important;
            }
            .box-chart-market > svg {
                display: none !important;
            }
            .box-chart-market .item{
                width: 100% !important;
                translate: 0 0px !important;
                position: unset !important;
            }
        }
        </style>
@endif
<div class="card min-height-250 p-3" >
    <div class="container">
                <h5 class="text-dark text-center mb-3">{{ __('marketplan') }}</h5>
                <div class="row g-3">
                    <div class="col-md-12 row row-cols-1 row-cols-lg-4 g-3 justify-content-center">
                            <div class="col">
                                <label>{{ $mainMarket1->name ?? '' }}</label>
                                @foreach ($submarketplan1 as $index => $p)
                                <ul>
                                    <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname1.{{ $index }}"></li>
                                </ul>
                                @error("submarketname1.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                                {{-- {{ var_export($submarketname1[$index]) }} --}}
                                @endforeach
                            </div>
                            <div class="col">
                                    <label>{{ $mainMarket2->name ?? '' }}</label>
                                    @foreach ($submarketplan2 as $index => $p)
                                    <ul>
                                        <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname2.{{ $index }}"></li>
                                    </ul>
                                    @error("submarketname2.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                                    @endforeach
                            </div>
                            <div class="col">
                                    <label>{{ $mainMarket3->name ?? '' }}</label>
                                    @foreach ($submarketplan3 as $index => $p)
                                    <ul>
                                        <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname3.{{ $index }}"></li>
                                    </ul>
                                    @error("submarketname3.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                                    @endforeach
                            </div>
                            <div class="col">
                                    <label>{{ $mainMarket4->name ?? '' }}</label>
                                    @foreach ($submarketplan4 as $index => $p)
                                    <ul>
                                        <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname4.{{ $index }}"></li>
                                    </ul>
                                    @error("submarketname4.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                                    @endforeach
                            </div>
                            <div class="col d-flex align-items-end justify-content-center">
                                <button class="btn btn-info m-0 btn-sm" type="button" wire:click="updatemarketplan">{{ __('Update') }}</button>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" card card-slide" style="background-image: url('{{ display_file($image5)}}');" >
                            <div class="container p-4">
                                <div class="row">
                                    @include('livewire.logo')
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3 class="text-dark mb-4">{{ __('marketplan') }}</h3>
                                    </div>
                                    {{-- <div class="col-md-12 ">
                                        <img src="{{ asset('9.png') }}" alt="" style="width: 600px;">
                                    </div> --}}
                                    <div class="box-chart-market">
                                        <svg class="main-color-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="476" height="451" overflow="hidden"><defs><clipPath id="clip0"><rect x="403" y="175" width="476" height="451"/></clipPath></defs><g clip-path="url(#clip0)" transform="translate(-403 -175)"><path d="M556.5 564.052C657.443 625.498 785.419 576.432 828.5 459.5" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M460.205 355.5C458.928 364.598 458.502 374.151 458.502 383.702 458.502 419.636 467.451 455.114 484.498 486.5" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M842.926 383.498C842.926 336.08 827.681 290.487 800.577 254.012L842.926 254.012C862.406 254.012 878.498 236.685 878.498 215.256 878.498 193.827 862.406 176.502 842.926 176.502L659.131 176.502 656.591 176.502 650.662 176.502C582.904 176.502 519.804 215.256 485.5 278.633" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M842.765 188.5C820.589 188.5 809.5 216.765 824.854 233.633 840.633 250.5 867.5 238.646 867.5 214.941 867.5 200.354 856.411 188.5 842.765 188.5Z" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M483.779 356.5C482.51 365.599 481.666 374.698 482.089 383.796 481.666 420.645 492.238 456.583 511.691 486.609L444.449 486.609C424.572 486.609 408.502 503.895 408.502 525.276 408.502 546.202 424.572 563.491 444.449 563.491L629.684 563.491C702.423 573.498 772.627 531.646 803.5 459.768" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M819.498 383.498C819.498 304.336 772.096 234.726 702.262 210.613 632.43 186.5 556.247 213.343 513.5 277.494" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M799.5 384.849C799.5 317.196 760.641 256.906 702.138 232.974 643.209 209.502 577.02 227.911 536.026 278.997L440.798 278.997C420.728 278.997 404.502 296.485 404.502 318.116 404.502 339.287 420.728 356.775 440.798 356.775L501.863 356.775C489.48 434.555 531.328 510.493 600.079 536.267 669.258 562.5 745.694 531.204 781.138 462.169" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M650.081 241.5C550.067 241.956 486.5 357.26 534.812 451.6 582.699 545.94 707.291 550.498 761.536 460.26L842.477 460.26C862.395 460.26 878.498 442.942 878.498 421.522 878.498 400.102 862.395 382.782 842.477 382.782L782.301 382.782C781.877 304.851 722.97 241.5 650.081 241.5Z" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M842.765 393.502C820.589 393.502 809.5 421.766 824.854 438.632 840.633 455.498 867.5 443.647 867.5 419.942 867.5 405.353 856.411 393.502 842.765 393.502Z" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M650.227 274.502C602.235 274.502 560.614 310.995 550.844 362.086 541.502 413.177 566.985 463.812 611.579 483.883 656.173 503.498 707.986 487.077 734.743 443.741 761.5 400.405 756.403 342.927 722.003 306.433 702.889 285.905 677.408 274.502 650.227 274.502Z" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M443.764 498.5C421.589 498.5 410.502 527.011 425.854 543.756 441.632 560.5 468.498 548.733 468.498 525.201 468.498 510.267 457.411 498.5 443.764 498.5Z" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/><path d="M443.764 291.5C421.589 291.5 410.502 320.22 426.28 337.087 441.632 353.498 468.498 341.646 468.498 317.941 468.498 303.354 457.411 291.5 443.764 291.5Z" stroke="#000000" stroke-miterlimit="2.2198" fill="none" fill-rule="evenodd"/></g></svg>
                                        <div class="item item-1">
                                            <label>{{ $mainMarket1->name ?? '' }}</label>
                                            @foreach ($submarketplan1 as $index => $p)
                                                <ul>
                                                    <li>{{ $index +1}} - <span>{{ $submarketname1[$index] }}</span> </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                        <div class="item item-2">
                                            <label>{{ $mainMarket2->name ?? '' }}</label>
                                            @foreach ($submarketplan2 as $index => $p)
                                                <ul>
                                                    <li>{{ $index +1}} - <span>{{ $submarketname2[$index] }}</span> </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                        <div class="item item-3">
                                            <label>{{ $mainMarket3->name ?? '' }}</label>
                                            @foreach ($submarketplan3 as $index => $p)
                                                <ul>
                                                    <li>{{ $index +1}} - <span>{{ $submarketname3[$index] }}</span> </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                        <div class="item item-4">
                                            <label>{{ $mainMarket4->name ?? '' }}</label>
                                            @foreach ($submarketplan4 as $index => $p)
                                                <ul>
                                                    <li>{{ $index +1}} - <span>{{ $submarketname4[$index] }}</span> </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
                <button class="btn btn-warning mt-0" type="button" wire:click="back(12)">
                            {{ trans('Back') }}
                        </button>
                        <button class="btn btn-success mt-0" type="button" wire:click="thirteenStepSubmit">
                            {{ trans('next') }}
                        </button>
            </div>
    </div>
</div>
    </div>