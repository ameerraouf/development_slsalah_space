<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Projects;
use App\Models\Solve;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Investshow extends Component
{
    use LivewireAlert;
    public $currentStep = 1 , $updateMode = false;
    public $successMessage = '';
    public $catchError;
    public $userphoto;
    public $company_desc;
    public $summary1,$summary2,$summary3;
    public $id1,$id2,$id3;
    public $projects,$projectid;
    public $solve1,$solve2,$solve3,$solve4,$solve5,$solve6,$solve7,$solve8,$solve9;
    public $solveid1,$solveid2,$solveid3,$solveid4,$solveid5,$solveid6,$solveid7,$solveid8,$solveid9;

    public function mount(){
      $this->userphoto = auth()->user()->photo;
      $this->company_desc = auth()->user()->company?->company_description;

      $this->projects= Projects::latest()->get()->take(3);
      $this->summary1 = Projects::latest()->first()->summary;
      $this->summary2 = Projects::latest()->skip(1)->first()->summary;
      $this->summary3 = Projects::latest()->skip(2)->first()->summary;
      $this->id1 = Projects::latest()->first()->id;
      $this->id2 = Projects::latest()->skip(1)->first()->id;
      $this->id3 = Projects::latest()->skip(2)->first()->id;

      $this->solve1   = Solve::latest()->first()->title??'';
      $this->solveid1 = Solve::latest()->first()->id??'';
      $this->solve2   = Solve::latest()->skip(1)->first()->title??'';
      $this->solveid2 = Solve::latest()->skip(1)->first()->id??'';
      $this->solve3   = Solve::latest()->skip(2)->first()->title??'';
      $this->solveid3 = Solve::latest()->skip(2)->first()->id??'';
      $this->solve4   = Solve::latest()->skip(3)->first()->title??'';
      $this->solveid4 = Solve::latest()->skip(3)->first()->id??'';
      $this->solve5   = Solve::latest()->skip(4)->first()->title??'';
      $this->solveid5 = Solve::latest()->skip(4)->first()->id??'';
      $this->solve6   = Solve::latest()->skip(5)->first()->title??'';
      $this->solveid6 = Solve::latest()->skip(5)->first()->id??'';
      $this->solve7   = Solve::latest()->skip(6)->first()->title??'';
      $this->solveid7 = Solve::latest()->skip(6)->first()->id??'';
      $this->solve8   = Solve::latest()->skip(7)->first()->title??'';
      $this->solveid8 = Solve::latest()->skip(7)->first()->id??'';
      $this->solve9   = Solve::latest()->skip(8)->first()->title??'';
      $this->solveid9 = Solve::latest()->skip(8)->first()->id??'';

    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            "company_desc"=> "nullable|string|max:500",
            "summary1"=> "nullable|string|max:500",
            "summary2"=> "nullable|string|max:500",
            "summary3"=> "nullable|string|max:500",
        ]);
    }
   //firstStepSubmit
   public function firstStepSubmit(){
        $this->currentStep = 2;
   }
    //secondStepSubmit
    public function secondStepSubmit(){
        $this->currentStep = 3;
    }
    //thirdStepSubmit
    public function thirdStepSubmit(){
        $this->currentStep = 4;
    }

    // submit forms action
    public function companySubmit(){
        $this->validate([
            "company_desc"=> "nullable|string|max:500",
        ]);
        Company::updateOrCreate(
            ['business_pioneer_id' => Auth::user()->id],
            [
                'company_description' => $this->company_desc,
            ]
        );
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function projectSubmit1(){
        $this->validate([
            "summary1"=> "nullable|string|max:500",
        ]);
        $project = Projects::where('id',$this->id1)->first();
        $project->summary = $this->summary1;
        $project->update();
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function projectSubmit2(){
        $this->validate([
            "summary2"=> "nullable|string|max:500",
        ]);
        $project = Projects::where('id',$this->id2)->first();
        $project->summary = $this->summary2;
        $project->update();
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function projectSubmit3(){
        $this->validate([
            "summary3"=> "nullable|string|max:500",
        ]);
        $project = Projects::where('id',$this->id3)->first();
        $project->summary = $this->summary3;
        $project->update();
        $this->alert('success', 'تم التحديث بنجاح');
    }

    public function solveSubmit1(){
        $this->validate([
            "solve1"=> "nullable|string|max:100",
        ]);
        if ($this->solveid1){
            $solve = Solve::find($this->solveid1);
            $solve->update(['title' => $this->solve1]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve1;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit2(){
        $this->validate([
            "solve2"=> "nullable|string|max:100",
        ]);
        if ($this->solveid2){
            $solve = Solve::find($this->solveid2);
            $solve->update(['title' => $this->solve2]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve2;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit3(){
        $this->validate([
            "solve3"=> "nullable|string|max:100",
        ]);
        if ($this->solveid3){
            $solve = Solve::find($this->solveid3);
            $solve->update(['title' => $this->solve3]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve3;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit4(){
        $this->validate([
            "solve4"=> "nullable|string|max:100",
        ]);
        if ($this->solveid4){
            $solve = Solve::find($this->solveid4);
            $solve->update(['title' => $this->solve4]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve4;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit5(){
        $this->validate([
            "solve5"=> "nullable|string|max:100",
        ]);
        if ($this->solveid5){
            $solve = Solve::find($this->solveid5);
            $solve->update(['title' => $this->solve5]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve5;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit6(){
        $this->validate([
            "solve6"=> "nullable|string|max:100",
        ]);
        if ($this->solveid6){
            $solve = Solve::find($this->solveid6);
            $solve->update(['title' => $this->solve6]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve6;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit7(){
        $this->validate([
            "solve7"=> "nullable|string|max:100",
        ]);
        if ($this->solveid7){
            $solve = Solve::find($this->solveid7);
            $solve->update(['title' => $this->solve7]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve7;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit8(){
        $this->validate([
            "solve8"=> "nullable|string|max:100",
        ]);
        if ($this->solveid8){
            $solve = Solve::find($this->solveid8);
            $solve->update(['title' => $this->solve8]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve8;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function solveSubmit9(){
        $this->validate([
            "solve9"=> "nullable|string|max:100",
        ]);
        if ($this->solveid9){
            $solve = Solve::find($this->solveid9);
            $solve->update(['title' => $this->solve9]);
        }else{
            $solve = new Solve();
            $solve->title = $this->solve9;
            $solve->save();
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }

     //back
     public function back($step){
         $this->currentStep = $step;
     }

    public function render()
    {
        return view('livewire.investshow');
    }
}
