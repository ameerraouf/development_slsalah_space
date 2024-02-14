@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">المشكله</h3>
                    </div>
                    @foreach($projects as $key => $project) 
                        <div class="col-md-4  mt-5">
                            <h3 class="text-dark">المشكله {{ $project->id }}</h3>
                            {{-- <form action="{{ route('investshow.updateproject',$project->id) }}" method="post">
                                @csrf
                                @method('put') --}}
                                <div class="form-group">
                                    {{-- wire:model='summary' --}}
                                    {{-- <input type="text" name="" id="" value="{{ $project->summary }}" wire:model='summary'> --}}
                                    {{-- <textarea name="summary" class="form-control" rows="4" id="editor"  readonly>
                                        {{ $project->summary }}
                                    </textarea> --}}
                                    {{-- <textarea name="summary" class="form-control" rows="4" id="editor" wire:model='projects.{{ $key }}.summary' >
                                        
                                    </textarea> --}}
                                    <div wire:click="$set('summary','unpaid')">{{ $project->summary }}</div>
                                    

                                </div>
                                {{-- <div class="d-flex  mt-4">
                                    <button type="submit" name="button" class="btn btn-info m-0 " wire:click="prrojectSubmit">
                                        {{ __('Update info') }}
                                    </button>
                                </div> --}}
                            {{-- </form> --}}
                        </div>
                    @endforeach  
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(1)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="secondStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>