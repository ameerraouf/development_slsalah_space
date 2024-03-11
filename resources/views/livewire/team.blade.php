@if ($currentStep != 7)
    <div style="display: none" class="row setup-content" id="step-5">
@endif
      <div class="row">
        <div class="col-md-4">
            @foreach ($selectedteam as $index => $team)
                <div class="col-md-6" >
                    <label for="name{{ $index }}">المسمى الوظيفى {{ $index+1 }}</label>
                    <input type="text" wire:model="teamname.{{ $index }}"  class="form-control">  
                    @error("teamname.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                    <br>
                    <label for="" >الصوره</label>
                    <input type="file"   class="form-control-file" wire:model="teamimage.{{ $index }}" > 
                    @error("teamimage.{$index}")<span class="text-danger">{{ $message }}</span>@enderror   
                    <br>                       
                </div>
                <hr>
            @endforeach
            <div class="col-md-4  mt-5">
                <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updateteams">Update</button>
            </div>
            <button class="btn btn-warning mt-3" type="button" wire:click="back(6)">
                {{ trans('Back') }}
            </button>
            <button class="btn btn-success mt-3" type="button" wire:click="seventhStepSubmit">
                {{ trans('next') }}
            </button>
        </div>
        <div class="col-md-8">
            <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto text-center">
                            <h3 class="text-dark">فريق العمل</h3>
                        </div>
                            @foreach ($selectedteam as $index => $team)
                                <div class="col-md-3  mt-5" >
                                    <div>
                                        @if($team[$index])
                                            <img src="{{ $teamimage[$index]->temporaryUrl() }}" alt="" width="150">
                                        @else
                                            <img src="{{display_file($team['image'])}}" width='150' alt="">
                                        @endif
                                    </div>
    
                                    <label for="name{{ $index }}">المسمى الوظيفى {{ $index+1 }}</label>
                                    {{-- <input type="text" wire:model="teamname.{{ $index }}"  class="form-control" readonly>   --}}
                                    <p>{{ $teamname[$index] }}</p>
                                    <br>                    
                                </div>
                            @endforeach
                    </div>
                   
                </div>
            </div>
        </div>
      </div>
    </div>