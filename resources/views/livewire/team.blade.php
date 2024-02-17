
<div>


    @if ($currentStep != 7)
        <div style="display: none" class="row setup-content" id="step-5">
    @endif
            <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mx-auto text-center">
                            <h3 class="text-dark">فريق العمل</h3>
                        </div>
                        {{-- <form wire:submit.prevent="updateteams" autocomplete="off" enctype="multipart/form-data"> --}}
                                {{-- <label for="" class="small-label" class="small-label">شعار الموقع </label>
                                <input type="text" class="form-control" wire:model.defer="x" name="x">
                                <input type="file" class="form-control-file" wire:model="logo" name="logo">
                                @if ($logo)
                                    <img style="width:90px;height:90px" src="{{ $logo->temporaryUrl() }}" width="100">
                                @else
                                    <img style="width:90px;height:90px" src="{{ display_file($logo2) }}" width="100">
                                @endif --}}
                            @foreach ($selectedteam as $index => $team)
                                <div class="col-md-3  mt-5" >
                                    <div>
                                        @if($team->image)
                                        {{-- <img src="{{ $team->image->temporaryUrl() }}" alt="" width="150"> --}}
                                        {{-- <img src="{{display_file($team['image'])}}" style="width: 150px"alt="" > --}}
                                        <img src="{{asset('uploads/teams/'.$team['image'])}}" style="width: 150px"alt="" >
                                        {{-- <img src="{{ $team['image']->temporaryUrl() }}" alt="" width="200"> --}}
                                            {{-- <img src="{{ $team['image']->temporaryUrl() }}" width='100' alt=""> --}}
                                        @else
                                            <img src="{{ asset('no-image.jpg') }}" style="width: 150px;" alt=" ">
                                            {{-- <img src="{{display_file($team->image)}}" width='100' alt=""> --}}
                                        @endif
                                    </div>

                                    <label for="name{{ $index }}">المسمى الوظيفى {{ $index+1 }}</label>
                                    <input type="text" wire:model="teamname.{{ $index }}"  class="form-control">  
                                    @error("teamname.{$index}")<span class="text-danger">{{ $message }}</span>@enderror 
                                    <br>
                                    <label for="" >الصوره</label>
                                    <input type="file"   class="form-control-file" wire:model="teamimage.{{ $index }}"  name="teamimage.{{ $index }}"> 
                                    @error("teamimage.{$index}")<span class="text-danger">{{ $message }}</span>@enderror                          
                                </div>
                                {{-- {{ var_export($teamname) }} --}}
                                {{-- {{ var_export($teamimage) }} --}}
                                {{-- {{ var_export($index) }} --}}
                            @endforeach
                            <div class="col-md-4  mt-5">
                                <button class="btn btn-primary btn-sm mt-3" type="button" wire:click="updateteams">Update</button>
                                {{-- <button class="btn btn-primary btn-sm mt-3" type="submit" >Update</button> --}}
                            </div>
                        {{-- </form>                                             --}}
                    </div>
                    <button class="btn btn-warning mt-3" type="button" wire:click="back(6)">
                        {{ trans('Back') }}
                    </button>
                    <button class="btn btn-success mt-3" type="button" wire:click="seventhStepSubmit">
                        {{ trans('next') }}
                    </button>
                </div>
            </div>

            
        </div>


</div>