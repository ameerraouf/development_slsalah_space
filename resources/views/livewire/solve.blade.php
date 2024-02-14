@if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-3">
@endif
        <div class=" card min-height-250" style="background-image: url('{{PUBLIC_DIR}}/img/back.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto text-center">
                        <h3 class="text-dark">الحل</h3>
                        <p>اوصف حل الى تعمل الشركه على استخدامه فى حل المشكله</p>
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve1</label>
                        <input type="text" class="form-control" wire:model='solve1' wire:change="solveSubmit1" >
                        @error('solve1')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve2</label>
                        <input type="text" class="form-control" wire:model='solve2' wire:change="solveSubmit2" >
                        @error('solve2')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve3</label>
                        <input type="text" class="form-control" wire:model='solve3' wire:change="solveSubmit3" >
                        @error('solve3')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve4</label>
                        <input type="text" class="form-control" wire:model='solve4' wire:change="solveSubmit4" >
                        @error('solve4')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve5</label>
                        <input type="text" class="form-control" wire:model='solve5' wire:change="solveSubmit5" >
                        @error('solve5')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve6</label>
                        <input type="text" class="form-control" wire:model='solve6' wire:change="solveSubmit6" >
                        @error('solve6')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve7</label>
                        <input type="text" class="form-control" wire:model='solve7' wire:change="solveSubmit7" >
                        @error('solve7')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve8</label>
                        <input type="text" class="form-control" wire:model='solve8' wire:change="solveSubmit8" >
                        @error('solve8')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4  mt-5">
                        <label for="">solve9</label>
                        <input type="text" class="form-control" wire:model='solve9' wire:change="solveSubmit9" >
                        @error('solve9')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                        {{-- {{ var_export($solve1) }}
                        {{ var_export($solveid1) }}       --}}
                </div>
                <button class="btn btn-warning mt-3" type="button" wire:click="back(2)">
                    {{ trans('Back') }}
                </button>
                <button class="btn btn-success mt-3" type="button" wire:click="thirdStepSubmit">
                    {{ trans('next') }}
                </button>
            </div>
        </div>
    </div>