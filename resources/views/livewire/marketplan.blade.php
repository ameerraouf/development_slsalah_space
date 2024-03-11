@if ($currentStep != 9)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
        <div class="row">
            <div class="col-md-4">
                <div>
                    <div class="">
                        <label>{{ $mainMarket1->name ?? '' }}</label>
                        @foreach ($submarketplan1 as $index => $p)
                        <ul>
                            <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname1.{{ $index }}"></li>
                        </ul>
                        @error("submarketname1.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                        {{-- {{ var_export($submarketname1[$index]) }} --}}
                        @endforeach
                    </div>
                    <div class="">
                            <label>{{ $mainMarket2->name ?? '' }}</label>
                            @foreach ($submarketplan2 as $index => $p)
                            <ul>
                                <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname2.{{ $index }}"></li>
                            </ul>
                            @error("submarketname2.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                            @endforeach
                    </div>
                    <div class="">
                            <label>{{ $mainMarket3->name ?? '' }}</label>
                            @foreach ($submarketplan3 as $index => $p)
                            <ul>
                                <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname3.{{ $index }}"></li>
                            </ul>
                            @error("submarketname3.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                            @endforeach
                    </div>
                    <div class="">
                            <label>{{ $mainMarket4->name ?? '' }}</label>
                            @foreach ($submarketplan4 as $index => $p)
                            <ul>
                                <li>{{ $index +1}}-<input type="text" class="form-control" wire:model="submarketname4.{{ $index }}"></li>
                            </ul>
                            @error("submarketname4.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                            @endforeach
                    </div>
                    
                    <div class="col-md-4  mt-5">
                        <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updatemarketplan">Update</button>
                    </div>
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(8)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="ninthStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
            <div class="col-md-8">
                <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto text-center">
                                <h3 class="text-dark">خطه دخول السوق</h3>
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
    </div>