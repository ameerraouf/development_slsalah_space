<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\Market;
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
    public $year,$size,$unit,$marketid;
    public $year2,$size2,$unit2,$marketid2;
    public $year3,$size3,$unit3,$marketid3;
    public $year4,$size4,$unit4,$marketid4;
    public $year5,$size5,$unit5,$marketid5;
    public $theyear,$theyear2,$theyear3,$theyear4,$theyear5;

    // public $projecttitle1,$projectdesc1;
    public $selectedProducts = [];
    public $title = [];
    public $description = [];

    // protected $listeners = ['refreshComponent'=>'$refresh'];
    public function mount(){
      $this->userphoto = auth()->user()->photo;
      $this->company_desc = auth()->user()->company?->company_description;

      $this->projects= Projects::latest()->get()->take(3);
      $this->summary1 = Projects::latest()->first()->summary??'';
      $this->summary2 = Projects::latest()->skip(1)->first()->summary??'';
      $this->summary3 = Projects::latest()->skip(2)->first()->summary??'';
      $this->id1 = Projects::latest()->first()->id??'';
      $this->id2 = Projects::latest()->skip(1)->first()->id??'';
      $this->id3 = Projects::latest()->skip(2)->first()->id??'';

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

      $now = Carbon::now();
      $this->year = $now->year;
      $this->year2 = $now->addYear()->year;
      $this->year3 = $now->year+1;
      $this->year4 = $now->year+2;
      $this->year5 = $now->year+3;
      $this->size = Market::latest()->first()->size??'';
      $this->unit = Market::latest()->first()->unit??'';
      $this->size2 = Market::latest()->skip(1)->first()->size??'';
      $this->unit2 = Market::latest()->skip(1)->first()->unit??'';
      $this->size3 = Market::latest()->skip(2)->first()->size??'';
      $this->unit3 = Market::latest()->skip(2)->first()->unit??'';
      $this->size4 = Market::latest()->skip(3)->first()->size??'';
      $this->unit4 = Market::latest()->skip(3)->first()->unit??'';
      $this->size5 = Market::latest()->skip(4)->first()->size??'';
      $this->unit5 = Market::latest()->skip(4)->first()->unit??'';

      $this->marketid  = Market::latest()->first()->id??'';
      $this->marketid2 = Market::latest()->skip(1)->first()->id??'';
      $this->marketid3 = Market::latest()->skip(2)->first()->id??'';
      $this->marketid4 = Market::latest()->skip(3)->first()->id??'';
      $this->marketid5 = Market::latest()->skip(4)->first()->id??'';

      $this->theyear = $this->year??'';
      $this->theyear2 = $this->year2??'';
      $this->theyear3 = $this->year3??'';
      $this->theyear4 = $this->year4??'';
      $this->theyear5 = $this->year5??'';


    //   tap5
    $this->selectedProducts = Projects::latest()->take(6)->get(); // Fetch 6 products
    foreach ($this->selectedProducts as $product) {
        $this->title[] = $product->title;
        $this->description[] = $product->description;
    }
    // $this->title = array_fill(0, 6, 'ddd');


    }
    protected $listeners = ['recordDeleted' => 'fetchRecords'];
    public function fetchRecords()
    {
        $this->selectedProducts = Projects::latest()->take(6)->get(); // Fetch 6 products
        foreach ($this->selectedProducts as $product) {
            $this->title[] = $product->title;
            $this->description[] = $product->description;
        } 
    }
    public function deleteProduct($product_id){
        $product= Projects::findOrFail($product_id);
        $product->delete();
        $this->alert('success', 'تم الحذف بنجاح');
        
        $this->emit('recordDeleted');
        $this->mount();
        $this->render();
    }
    public function updateProducts()
    {
        foreach ($this->selectedProducts as $index => $product) {
            $product->update([
                'title' => $this->title[$index],
                'description' => $this->description[$index],
            ]);
        }
        $this->alert('success', 'تم التحديث بنجاح');
        // $this->reset(['title', 'description']);
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
    //forthStepSubmit
    public function forthStepSubmit(){
        $this->currentStep = 5;
    }
    //fifthStepSubmit
    public function fifthStepSubmit(){
        $this->currentStep = 6;
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
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve1;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid1 = $solve->id;
        }

    }
    public function solveSubmit2(){
        $this->validate([
            "solve2"=> "nullable|string|max:100",
        ]);
        if ($this->solveid2){
            $solve = Solve::find($this->solveid2);
            $solve->update(['title' => $this->solve2]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve2;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid2 = $solve->id;
        }

    }
    public function solveSubmit3(){
        $this->validate([
            "solve3"=> "nullable|string|max:100",
        ]);
        if ($this->solveid3){
            $solve = Solve::find($this->solveid3);
            $solve->update(['title' => $this->solve3]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve3;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid3 = $solve->id;
        }

    }
    public function solveSubmit4(){
        $this->validate([
            "solve4"=> "nullable|string|max:100",
        ]);
        if ($this->solveid4){
            $solve = Solve::find($this->solveid4);
            $solve->update(['title' => $this->solve4]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve4;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid4 = $solve->id;
        }

    }
    public function solveSubmit5(){
        $this->validate([
            "solve5"=> "nullable|string|max:100",
        ]);
        if ($this->solveid5){
            $solve = Solve::find($this->solveid5);
            $solve->update(['title' => $this->solve5]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve5;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid5 = $solve->id;
        }

    }
    public function solveSubmit6(){
        $this->validate([
            "solve6"=> "nullable|string|max:100",
        ]);
        if ($this->solveid6){
            $solve = Solve::find($this->solveid6);
            $solve->update(['title' => $this->solve6]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve6;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid6 = $solve->id;
        }

    }
    public function solveSubmit7(){
        $this->validate([
            "solve7"=> "nullable|string|max:100",
        ]);
        if ($this->solveid7){
            $solve = Solve::find($this->solveid7);
            $solve->update(['title' => $this->solve7]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve7;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid7 = $solve->id;
        }

    }
    public function solveSubmit8(){
        $this->validate([
            "solve8"=> "nullable|string|max:100",
        ]);
        if ($this->solveid8){
            $solve = Solve::find($this->solveid8);
            $solve->update(['title' => $this->solve8]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve8;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid8 = $solve->id;
        }

    }
    public function solveSubmit9(){
        $this->validate([
            "solve9"=> "nullable|string|max:100",
        ]);
        if ($this->solveid9){
            $solve = Solve::find($this->solveid9);
            $solve->update(['title' => $this->solve9]);
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $solve = new Solve();
            $solve->title = $this->solve9;
            $solve->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->solveid9 = $solve->id;
        }

    }

   
    public function marketSubmit1(){
        $this->validate([
            "theyear"=> "required|integer",
            "size"=> "required|integer",
            "unit"=> "required|in:million,billion",
        ]);
        if ($this->marketid ){
            $market = Market::find($this->marketid);
            $market->year = $this->theyear;
            $market->size = $this->size;
            $market->unit = $this->unit;
            $market->update();
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $market = new Market();
            $market->year = $this->theyear;
            $market->size = $this->size;
            $market->unit = $this->unit;
            $market->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            // $this->updateMode = true;
            $this->marketid = $market->id;
        }
    }
    public function marketSubmit2(){
        $this->validate([
            "theyear2"=> "required|integer",
            "size2"=> "required|integer",
            "unit2"=> "required|in:million,billion",
        ]);
        if ($this->marketid2){
            $market = Market::find($this->marketid2);
            $market->year = $this->year2;
            $market->size = $this->size2;
            $market->unit = $this->unit2;
            $market->update();
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $market = new Market();
            $market->year = $this->year2;
            $market->size = $this->size2;
            $market->unit = $this->unit2;
            $market->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->marketid2 = $market->id;
        }
    }
    public function marketSubmit3(){
        $this->validate([
            "theyear3"=> "required|integer",
            "size3"=> "required|integer",
            "unit3"=> "required|in:million,billion",
        ]);
        if ($this->marketid3){
            $market = Market::find($this->marketid3);
            $market->year = $this->year3;
            $market->size = $this->size3;
            $market->unit = $this->unit3;
            $market->update();
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $market = new Market();
            $market->year = $this->year3;
            $market->size = $this->size3;
            $market->unit = $this->unit3;
            $market->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->marketid3 = $market->id;
        }
    }
    public function marketSubmit4(){
        $this->validate([
            "theyear4"=> "required|integer",
            "size4"=> "required|integer",
            "unit4"=> "required|in:million,billion",
        ]);
        if ($this->marketid4){
            $market = Market::find($this->marketid4);
            $market->year = $this->year4;
            $market->size = $this->size4;
            $market->unit = $this->unit4;
            $market->update();
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $market = new Market();
            $market->year = $this->year4;
            $market->size = $this->size4;
            $market->unit = $this->unit4;
            $market->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->marketid4 = $market->id;
        }
    }
    public function marketSubmit5(){
        $this->validate([
            "theyear5"=> "required|integer",
            "size5"=> "required|integer",
            "unit5"=> "required|in:million,billion",
        ]);
        if ($this->marketid5){
            $market = Market::find($this->marketid5);
            $market->year = $this->year5;
            $market->size = $this->size5;
            $market->unit = $this->unit5;
            $market->update();
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $market = new Market();
            $market->year = $this->year5;
            $market->size = $this->size5;
            $market->unit = $this->unit5;
            $market->save();
            $this->alert('success', 'تم الاضافه بنجاح');
            $this->marketid5 = $market->id;
        }
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
