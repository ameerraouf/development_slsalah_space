@if ($currentStep != 13)
    <div style="display: none" class="row setup-content" id="step-5">
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
                                <button class="btn btn-info m-0 btn-sm" type="button" wire:click="updatemarketplan">Update</button>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" card min-height-250" style="background-image: url('{{ display_file($image4)}}');" >
                            <div class="container p-4">
                                <div class="row">
                                    @include('livewire.logo')
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3 class="text-dark">{{ __('marketplan') }}</h3>
                                    </div>
                                    {{-- <div class="col-md-12 ">
                                        <img src="{{ asset('9.png') }}" alt="" style="width: 600px;">
                                    </div> --}}
                                    <div class="col-md-6">
                                        <label>{{ $mainMarket1->name ?? '' }}</label>
                                        @foreach ($submarketplan1 as $index => $p)
                                            <ul>
                                                <li>{{ $index +1}} - <span>{{ $submarketname1[$index] }}</span> </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ $mainMarket2->name ?? '' }}</label>
                                        @foreach ($submarketplan2 as $index => $p)
                                            <ul>
                                                <li>{{ $index +1}} - <span>{{ $submarketname2[$index] }}</span> </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ $mainMarket3->name ?? '' }}</label>
                                        @foreach ($submarketplan3 as $index => $p)
                                            <ul>
                                                <li>{{ $index +1}} - <span>{{ $submarketname3[$index] }}</span> </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
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