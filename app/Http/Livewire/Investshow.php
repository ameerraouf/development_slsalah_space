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
    public $summary=[];
    public $projects,$projectid;

    public function mount(){
      $this->userphoto = auth()->user()->photo;
      $this->company_desc = auth()->user()->company?->company_description;
      $this->projects= Projects::latest()->get()->take(3);
      $this->summary[]=[
        'project_id'=>'',
        'summary'=>'',
      ];
    //   foreach($this->projects as $key => $project) {
    //     $this->summary = $project->summary;
    //   }
    //   $this->summary = Projects::latest()->get()->take(3);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            "company_desc"=> "nullable|string|max:500",
            "summary"=> "nullable|string|max:500",
        ]);
    }
   //firstStepSubmit
   public function firstStepSubmit(){
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
        $this->currentStep = 2;
   }
    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            "summary"=> "nullable|string|max:500",
        ]);
        
        $this->currentStep = 3;
    }
    public function prrojectSubmit(){
        $this->validate([
            "summary"=> "nullable|string|max:500",
        ]);
        $project = Projects::findOrFail($this->projectid);
        $project->summary = $this->summary;
        $project->update();
    }
     //back
     public function back($step)
     {
         $this->currentStep = $step;
     }
    public function render()
    {
        // $projects = Projects::latest()->get()->take(3);
        // return view('livewire.investshow',compact('projects'));
        return view('livewire.investshow');
    }
}
