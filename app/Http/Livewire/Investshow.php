<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Projects;
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

     //back
     public function back($step){
         $this->currentStep = $step;
     }

    public function render()
    {
        return view('livewire.investshow');
    }
}
