@if ($currentStep != 11)
<div style="display: none" class="row setup-content" id="step-5">
    @endif
    <div class="card min-height-250 p-3">
        <div class="container">
            <h3 class="text-dark text-center mb-3">{{ __('team') }}</h3>
            <div class="row g-3">
                <div class="col-md-12 row row-cols-1 row-cols-lg-2 row-cols-xl-4 justify-content-center g-3">
                    @foreach ($selectedteam as $index => $team)
                    <div class="col">
                        <label for="name{{ $index }}">المسمى الوظيفى {{ $index+1 }}</label>
                        <input type="text" wire:model="teamname.{{ $index }}" class="form-control">
                        @error("teamname.{$index}")<span class="text-danger">{{ $message }}</span>@enderror
                        <br>
                        <label for="">الصوره</label>
                        <input type="file" class="form-control" wire:model="teamimage.{{ $index }}"
                            accept="image/*">
                        @error("teamimage.{$index}")<span class="text-danger">{{ $message }}</span>@enderror
                        <br>
                    </div>
                    @endforeach
                    <div class="col d-flex align-items-end justify-content-center">
                        <button class="btn btn-info m-0 btn-sm" type="button"
                            wire:click="updateteams">Update</button>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class=" card min-height-250" style="background-image: url('{{ display_file($image5)}}');">
                        <div class="container p-4">
                            <div class="row text-center">
                                @include('livewire.logo')
                                <div class="col-md-12 mx-auto text-center">
                                    <h3 class="text-dark mb-4">{{ __('team') }}</h3>
                                </div>
                                @foreach ($selectedteam as $index => $team)
                                <div class="col-md-3">
                                    <div>
                                        @if($team[$index])
                                        <img src="{{ $teamimage[$index]->temporaryUrl() }}" alt="" width="150">
                                        @else
                                        <img src="{{display_file($team['image'])}}" width='150' alt="">
                                        @endif
                                    </div>

                                    <label for="name{{ $index }}">المسمى الوظيفى {{ $index+1 }}</label>
                                    {{-- <input type="text" wire:model="teamname.{{ $index }}" class="form-control"
                                    readonly> --}}
                                    <p>{{ $teamname[$index] }}</p>
                                    <br>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 justify-content-center mt-3">
            <button class="btn btn-warning mt-0" type="button" wire:click="back(10)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-0" type="button" wire:click="elevenStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
        </div>
    </div>
</div>