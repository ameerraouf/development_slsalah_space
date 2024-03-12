<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Team;
use App\Models\Solve;
use App\Models\Compat;
use App\Models\Market;
use App\Models\Company;
use Livewire\Component;
use App\Models\Compator;
use App\Models\Projects;
use App\Models\Thankyou;
use App\Models\DevelopPlan;
use App\Models\SubMarketPlan;
use Livewire\WithFileUploads;
use App\Models\MainMarketPlan;
use Illuminate\Validation\Rule;
use App\Models\RequiredInvestment;
use App\Models\FinancialEvaluation;
use Illuminate\Support\Facades\Auth;
use App\Models\PlanningCostAssumption;
use App\Models\PlanningFinancialAssumption;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\PlanningRevenueOperatingAssumption;
use Illuminate\Http\UploadedFile;

class Investshow extends Component
{
    use WithFileUploads,LivewireAlert;
    
    public $markets=[],$msize=[],$myear=[],$munit=[];

    public $chartData = [];
    public $currentStep = 1 , $updateMode = false;
    public $successMessage = '';
    public $catchError;
    public $userphoto;
   // tap1
    public $company_desc;
   //tap2
    public $summary1,$summary2,$summary3;
    public $id1,$id2,$id3;
    public $projects,$projectid;
    //tap3
    public $solve1,$solve2,$solve3,$solve4,$solve5,$solve6,$solve7,$solve8,$solve9;
    public $solveid1,$solveid2,$solveid3,$solveid4,$solveid5,$solveid6,$solveid7,$solveid8,$solveid9;
    //tap4
    public $year,$size,$unit,$marketid;
    public $year2,$size2,$unit2,$marketid2;
    public $year3,$size3,$unit3,$marketid3;
    public $year4,$size4,$unit4,$marketid4;
    public $year5,$size5,$unit5,$marketid5;
    public $theyear,$theyear2,$theyear3,$theyear4,$theyear5;
    // tap5
    public $selectedProducts = [],$title = [],$description = [];
    // tap6
    public $selectedCompat = [] ,$titlecompat = [],$descriptioncompat = [];
    // tap7 فريق العمل
    public $selectedteam = [] ,$teamname = [],$teamimage = [],$newteamimage = [];
    // tap8 المنافسين
    public $selectedco = [] ,$coname = [],$coquality = [],$coprice = [],$cotech=[];
    // tap9 خطه السوق
    public $submarketplan1 = [] ,$submarketplan2 = [],$submarketplan3 = [],$submarketplan4 = [];
    public $submarketname1 = [] ,$submarketname2 = [],$submarketname3 = [],$submarketname4 = [];
    //tap10
    public $developplan,$developplanname;
    //tap15
    public $required_investment,$required_investment_size,$investment_technology,$investment_team,$resarch_and_development,$investment_marketing,$required_investment_unit;
      // last tap thank u
    public $website_url,$phone,$email;

    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function ValidationAttributes(){
        return [
            "company_desc"=> __('company_desc'),
            "theyear"=> __('theyear'),
            "size"=> __('size'),
            "unit"=> __('unit'),
            "theyear1"=> __('theyear'),
            "size1"=> __('size'),
            "unit1"=> __('unit'),
            "theyear2"=> __('theyear'),
            "size2"=> __('size'),
            "unit2"=> __('unit'),
            "theyear3"=> __('theyear'),
            "size3"=> __('size'),
            "unit3"=> __('unit'),
            "theyear4"=> __('theyear'),
            "size4"=> __('size'),
            "unit4"=> __('unit'),
            "theyear5"=> __('theyear'),
            "size5"=> __('size'),
            "unit5"=> __('unit'),
            'title.0' => __('productname'),
            'title.1' => __('productname'),
            'title.2' => __('productname'),
            'title.3' => __('productname'),
            'title.4' => __('productname'),
            'title.5' => __('productname'),
            'description.0'   =>__('productdescription'),
            'description.1'   =>__('productdescription'),
            'description.2'   =>__('productdescription'),
            'description.3'   =>__('productdescription'),
            'description.4'   =>__('productdescription'),
            'description.5'   =>__('productdescription'),

            'titlecompat.0'         =>__('titlecompat'),
            'titlecompat.1'         =>__('titlecompat'),
            'titlecompat.2'         =>__('titlecompat'),
            'titlecompat.3'         =>__('titlecompat'),
            'titlecompat.4'         =>__('titlecompat'),
            'titlecompat.5'         =>__('titlecompat'),
            'descriptioncompat.0'   =>__('descriptioncompat'),
            'descriptioncompat.1'   =>__('descriptioncompat'),
            'descriptioncompat.2'   =>__('descriptioncompat'),
            'descriptioncompat.3'   =>__('descriptioncompat'),
            'descriptioncompat.4'   =>__('descriptioncompat'),
            'descriptioncompat.5'   =>__('descriptioncompat'),
            'teamname.0'   =>__('teamname'),
            'teamimage.0'   =>__('teamimage'),
            'teamname.1'   =>__('teamname'),
            'teamimage.1'   =>__('teamimage'),
            'teamname.2'   =>__('teamname'),
            'teamimage.2'   =>__('teamimage'),
            'teamname.3'   =>__('teamname'),
            'teamimage.3'   =>__('teamimage'),

            'coname.0'   =>__('coname'),
            'coname.1'   =>__('coname'),
            'coname.2'   =>__('coname'),

            'submarketname1.0'   =>__('submarketname'),
            'submarketname1.1'   =>__('submarketname'),
            'submarketname1.2'   =>__('submarketname'),
            'submarketname2.0'   =>__('submarketname'),
            'submarketname2.1'   =>__('submarketname'),
            'submarketname2.2'   =>__('submarketname'),
            'submarketname3.0'   =>__('submarketname'),
            'submarketname3.1'   =>__('submarketname'),
            'submarketname3.2'   =>__('submarketname'),
            'submarketname4.0'   =>__('submarketname'),
            'submarketname4.1'   =>__('submarketname'),
            'submarketname4.2'   =>__('submarketname'),
            'developplanname.0'   =>__('submarketname'),
            'developplanname.1'   =>__('submarketname'),
            'developplanname.2'   =>__('submarketname'),
            'developplanname.3'   =>__('submarketname'),
            'developplanname.4'   =>__('submarketname'),
            'developplanname.5'   =>__('submarketname'),
            'developplanname.6'   =>__('submarketname'),

            "myear.0"=> __('myear'),
            "msize.0"=> __('msize'),
            "munit.0"=> __('munit'),
            "myear.1"=> __('myear'),
            "msize.1"=> __('msize'),
            "munit.1"=> __('munit'),
            "myear.2"=> __('myear'),
            "msize.2"=> __('msize'),
            "munit.2"=> __('munit'),
            "myear.3"=> __('myear'),
            "msize.3"=> __('msize'),
            "munit.3"=> __('munit'),
            "myear.4"=> __('myear'),
            "msize.4"=> __('msize'),
            "munit.4"=> __('munit'),

            "website_url"=> __('website_url'),
        ];
    }
    public function updateMarkets()
    {
        $this->validate([
            "myear.0"=> "required|integer",
            "msize.0"=> "required|integer",
            "munit.0"=> "required|in:million,billion",
            "myear.1"=> "required|integer",
            "msize.1"=> "required|integer",
            "munit.1"=> "required|in:million,billion",
            "myear.2"=> "required|integer",
            "msize.2"=> "required|integer",
            "munit.2"=> "required|in:million,billion",
            "myear.3"=> "required|integer",
            "msize.3"=> "required|integer",
            "munit.3"=> "required|in:million,billion",
            "myear.4"=> "required|integer",
            "msize.4"=> "required|integer",
            "munit.4"=> "required|in:million,billion",
        ]);
        foreach ($this->markets as $index => $market) {
            $market->update([
                'year' => $this->myear[$index],
                'size' => $this->msize[$index],
                'unit' => $this->munit[$index],
            ]);
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }
    public function mount(){
        $this->markets = Market::take(5)->get();
        foreach ($this->markets as $market) {
            $this->myear[] = $market->year;
            $this->msize[] = $market->size;
            $this->munit[] = $market->unit;
        }


      $this->userphoto = auth()->user()->photo;
      //tap1
      $this->company_desc = auth()->user()->company?->company_description;
      //tap2
      $this->projects = Projects::latest()->get()->take(3);
      $this->summary1 = Projects::latest()->first()->summary??'';
      $this->summary2 = Projects::latest()->skip(1)->first()->summary??'';
      $this->summary3 = Projects::latest()->skip(2)->first()->summary??'';
      $this->id1 = Projects::latest()->first()->id??'';
      $this->id2 = Projects::latest()->skip(1)->first()->id??'';
      $this->id3 = Projects::latest()->skip(2)->first()->id??'';
      //tap3
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
      //tap4
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
        $this->selectedProducts = Projects::take(6)->get(); // Fetch 6 products
        foreach ($this->selectedProducts as $product) {
            $this->title[] = $product->title;
            $this->description[] = $product->description;
        }
        //   tap6
        $this->selectedCompat = Compat::latest()->take(6)->get(); // Fetch 6 compats
        foreach ($this->selectedCompat as $compat) {
            $this->titlecompat[] = $compat->title;
            $this->descriptioncompat[] = $compat->description;
        }
        // tap7
        $this->selectedteam = Team::get()->take(4); // Fetch 4 team
        foreach ($this->selectedteam as $team) {
            $this->teamname[] = $team->name;
            $this->teamimage[] = $team->image;
        }

        //tap8 
        $this->selectedco = Compator::get()->take(3); // Fetch 4 compator
        foreach ($this->selectedco as $co) {
            $this->coname[]    = $co->companyname;
            $this->coprice[]   = $co->price;
            $this->coquality[] = $co->quality;
            $this->cotech[]    = $co->tech;
        }

        // tap9
        $this->submarketplan1=SubMarketPlan::where('main_market_plan_id',1)->get()->take(3);
        foreach ($this->submarketplan1 as $plan) {
            $this->submarketname1[]    = $plan->name;
        }
        $this->submarketplan2=SubMarketPlan::where('main_market_plan_id',2)->get()->take(3);
        foreach ($this->submarketplan2 as $plan) {
            $this->submarketname2[]    = $plan->name;
        }
        $this->submarketplan3=SubMarketPlan::where('main_market_plan_id',3)->get()->take(3);
        foreach ($this->submarketplan3 as $plan) {
            $this->submarketname3[]    = $plan->name;
        }
        $this->submarketplan4=SubMarketPlan::where('main_market_plan_id',4)->get()->take(3);
        foreach ($this->submarketplan4 as $plan) {
            $this->submarketname4[]    = $plan->name;
        }

        // tap10
        $this->developplan = DevelopPlan::get()->take(7); // Fetch 7
        foreach ($this->developplan as $plan) {
            $this->developplanname[]    = $plan->name;
        }

        //tab15
        // $required_investment = RequiredInvestment::latest()->first();
        $this->required_investment_size = RequiredInvestment::latest()->first()->required_investment_size??0;
        $this->investment_technology = RequiredInvestment::latest()->first()->investment_technology ?? 0;
        $this->investment_team = RequiredInvestment::latest()->first()->investment_team ?? 0;
        $this->resarch_and_development = RequiredInvestment::latest()->first()->resarch_and_development ?? 0;
        $this->investment_marketing = RequiredInvestment::latest()->first()->investment_marketing ?? 0;
        $this->required_investment_unit = RequiredInvestment::latest()->first()->required_investment_unit ?? 'thousand';
    }

    //tap thank u
    public function thankuSubmit(){
        $this->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'website_url' => 'nullable|url',
        ]);
        $customerData = [
            'email' => $this->email,
            'phone' => $this->phone,
            'website_url' => $this->website_url,
        ];
        Thankyou::updateOrCreate(
            ['customer_id' => Auth::user()->id],
            [
                'email' => $this->email,
                'phone' => $this->phone,
                'website_url' => $this->website_url,
            ]
        );
        $this->alert('success', 'تم التحديث بنجاح');
    }
    // tap 15
    public function requiredInvestmentSubmit(){
        $this->validate([
            "required_investment_size"=> "required|integer",
            "investment_technology"=> "required|integer",
            "investment_team"=> "required|integer",
            "resarch_and_development"=> "required|integer",
            "investment_marketing"=> "required|integer",
            "required_investment_unit"=> "required|in:million,thousand",
        ]);
        if($this->required_investment_size + 0 < $this->investment_technology + $this->investment_team + $this->resarch_and_development + $this->investment_marketing){
            $this->alert('error', 'يجب ألا يكون مجموع (التقنيات + فريق العمل + البحث والتطوير + التسويق) أكبر من حجم الاستثمار
            ');
            return;
        }
        $required_investment = RequiredInvestment::latest()->first();
        if ($required_investment ){
            $required_investment->required_investment_size = $this->required_investment_size;
            $required_investment->investment_technology = $this->investment_technology;
            $required_investment->investment_team = $this->investment_team;
            $required_investment->resarch_and_development = $this->resarch_and_development;
            $required_investment->investment_marketing = $this->investment_marketing;
            $required_investment->required_investment_unit = $this->required_investment_unit;
            $required_investment->update();
            $this->alert('success', 'تم التحديث بنجاح');
        }else{
            $required_investment = new RequiredInvestment;
            $required_investment->required_investment_size = $this->required_investment_size;
            $required_investment->investment_technology = $this->investment_technology;
            $required_investment->investment_team = $this->investment_team;
            $required_investment->resarch_and_development = $this->resarch_and_development;
            $required_investment->investment_marketing = $this->investment_marketing;
            $required_investment->required_investment_unit = $this->required_investment_unit;
            $required_investment->save();
            $this->alert('success', 'تم الاضافة بنجاح');
        }
    }
    // tap 10
    public function developplan(){
        $validateData = $this->validate([
            'developplanname.0'   =>'required|string|max:255',
            'developplanname.1'   =>'required|string|max:255',
            'developplanname.2'   =>'required|string|max:255',
            'developplanname.3'   =>'required|string|max:255',
            'developplanname.4'   =>'required|string|max:255',
            'developplanname.5'   =>'required|string|max:255',
            'developplanname.6'   =>'required|string|max:255',
        ]);
        foreach ($this->developplan as $index=>$p) {
            $p->update([
                'name' => $this->developplanname[$index],
            ]);
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }

    // tap 9
    public function updatemarketplan(){
        $validateData = $this->validate([
            'submarketname1.0'   =>'required|string|max:255',
            'submarketname1.1'   =>'required|string|max:255',
            'submarketname1.2'   =>'required|string|max:255',
            'submarketname2.0'   =>'required|string|max:255',
            'submarketname2.1'   =>'required|string|max:255',
            'submarketname2.2'   =>'required|string|max:255',
            'submarketname3.0'   =>'required|string|max:255',
            'submarketname3.1'   =>'required|string|max:255',
            'submarketname3.2'   =>'required|string|max:255',
            'submarketname4.0'   =>'required|string|max:255',
            'submarketname4.1'   =>'required|string|max:255',
            'submarketname4.2'   =>'required|string|max:255',
        ]);
        foreach ($this->submarketplan1 as $index=>$p) {
            $p->update([
                'name' => $this->submarketname1[$index],
                'main_market_plan_id'       => 1,
            ]);
        }
        foreach ($this->submarketplan2 as $index=>$p) {
            $p->update([
                'name' => $this->submarketname2[$index],
                'main_market_plan_id'       => 2,
            ]);
        }
        foreach ($this->submarketplan3 as $index=>$p) {
            $p->update([
                'name' => $this->submarketname3[$index],
                'main_market_plan_id'       => 3,
            ]);
        }
        foreach ($this->submarketplan4 as $index=>$p) {
            $p->update([
                'name' => $this->submarketname4[$index],
                'main_market_plan_id'       => 4,
            ]);
        }
        $this->alert('success', 'تم التحديث بنجاح');

    }

    // tap 8
    public function updatecompators()
    {
        $validateData = $this->validate([
            'coname.0'   =>'required|string|max:255',
            'coname.1'   =>'required|string|max:255',
            'coname.2'   =>'required|string|max:255',
        ]);
        foreach ($this->selectedco as $index=>$co) {
            $co->update([
                'companyname' => $this->coname[$index],
                'price'       => $this->coprice[$index],
                'quality'     => $this->coquality[$index],
                'tech'        => $this->cotech[$index],
            ]);
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }

    // tap 7
    protected function getTeamImage($index)
    {
        $oldImage = null;
        if (isset($this->teamimage[$index])) {
            $oldImage = $this->teamimage[$index];
            if (is_string($oldImage)) {
                $oldImage = pathinfo($oldImage, PATHINFO_BASENAME);
            }
        }
        return $oldImage;
    }
    public function updateteams()
    {
        $rules = [];
        foreach ($this->selectedteam as $index => $team) {
            $rules["teamname.{$index}"] = 'required';
            $rules["teamimage.{$index}"] = 'image|max:2048';
        }
        $this->validate($rules);
        foreach ($this->selectedteam as $index => $team) {
            $team->name  = $this->teamname[$index];
            $image  = $this->teamimage[$index];
            if ($image instanceof UploadedFile) {
                $oldImage = $this->getTeamImage($index);
                if ($oldImage) {
                    if($oldImage !='' and !is_null($oldImage) and Storage::disk('uploads')->exists($oldImage)){
                        unlink('uploads/'.$oldImage);
                        // Storage::disk('uploads')->delete($oldImage);
                    }
                }
                $team->image = store_file($image,'teams');
            }
           
            $team->update();
            $this->alert('success', 'تم التحديث بنجاح');
        }
    }

    // tap 6
    public function updatecompats()
    {
        $validateData = $this->validate([
            'titlecompat.0'   =>'required|string|max:100',
            'titlecompat.1'   =>'required|string|max:100',
            'titlecompat.2'   =>'required|string|max:100',
            'titlecompat.3'   =>'required|string|max:100',
            'titlecompat.4'   =>'required|string|max:100',
            'titlecompat.5'   =>'required|string|max:100',
            'descriptioncompat.0'   =>'required|string|max:255',
            'descriptioncompat.1'   =>'required|string|max:255',
            'descriptioncompat.2'   =>'required|string|max:255',
            'descriptioncompat.3'   =>'required|string|max:255',
            'descriptioncompat.4'   =>'required|string|max:255',
            'descriptioncompat.5'   =>'required|string|max:255',
        ]);
        foreach ($this->selectedCompat as $index => $compat) {
            $compat->update([
                'title' => $this->titlecompat[$index],
                'description' => $this->descriptioncompat[$index],
            ]);
        }
        $this->alert('success', 'تم التحديث بنجاح');
    }

    public function deleteProduct($product_id){
        $product= Projects::findOrFail($product_id);
        $product->delete();
        $this->alert('success', 'تم الحذف بنجاح');
        $this->emit('$refresh');
        $this->currentStep = 6;
        // $this->emit('recordDeleted');
        // $this->mount();
        // $this->render();
    }
    
    public function updateProducts()
    {
        $validateData = $this->validate([
            'title.0'   =>'required|string|max:255',
            'title.1'   =>'required|string|max:255',
            'title.2'   =>'required|string|max:255',
            'title.3'   =>'required|string|max:255',
            'title.4'   =>'required|string|max:255',
            'title.5'   =>'required|string|max:255',
            'description.0'   =>'required|string|max:255',
            'description.1'   =>'required|string|max:255',
            'description.2'   =>'required|string|max:255',
            'description.3'   =>'required|string|max:255',
            'description.4'   =>'required|string|max:255',
            'description.5'   =>'required|string|max:255',
        ]);
        foreach ($this->selectedProducts as $index => $product) {
            $product->update([
                'title' => $this->title[$index],
                'description' => $this->description[$index],
            ]);
        }
        $this->alert('success', 'تم التحديث بنجاح');
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
    //sixthStepSubmit
    public function sixthStepSubmit(){
        $this->currentStep = 7;
    }
    //seventhStepSubmit
    public function seventhStepSubmit(){
        $this->currentStep = 8;
    }
    //seventhStepSubmit
    public function eighthStepSubmit(){
        $this->currentStep = 9;
    }
    //ninthStepSubmit
    public function ninthStepSubmit(){
        $this->currentStep = 10;
    }
    //tenthStepSubmit
    public function tenthStepSubmit(){
        $this->currentStep = 11;
    }
    //tenthStepSubmit
    public function elevenStepSubmit(){
        $this->currentStep = 12;
    }
    //tenthStepSubmit
    public function twelveStepSubmit(){
        $this->currentStep = 13;
    }

    // submit forms action
    //tap1
    public function companySubmit(){
        $this->validate([
            "company_desc"=> "required|string|max:500",
        ]);
        Company::updateOrCreate(
            ['business_pioneer_id' => Auth::user()->id],
            [
                'company_description' => $this->company_desc,
            ]
        );
        $this->alert('success', 'تم التحديث بنجاح');
    }
    //tap2
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
    //tap3
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

   //tap4
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
        $mainMarket1 = MainMarketPlan::first();
        $mainMarket2 = MainMarketPlan::skip(1)->first();
        $mainMarket3 = MainMarketPlan::skip(2)->first();
        $mainMarket4 = MainMarketPlan::skip(3)->first();
        $planningRevenueOperatingAssumptions = PlanningRevenueOperatingAssumption::where('workspace_id', auth()->user()->workspace_id)->first();
        $all_revenues_forecasting = $planningRevenueOperatingAssumptions ? $planningRevenueOperatingAssumptions->all_revenues_forecasting : ['first_year' => 0, 'second_year' => 0, 'third_year' => 0];
        $all_revenues_costs_forecasting = $planningRevenueOperatingAssumptions ? $planningRevenueOperatingAssumptions->all_revenues_costs_forecasting : ['first_year' => 0, 'second_year' => 0, 'third_year' => 0];
        $planningCostAssumption = PlanningCostAssumption::where(['workspace_id' => auth()->user()->workspace_id])
            ->first();
        $planningFinancialAssumption = PlanningFinancialAssumption::where('workspace_id', auth()->user()->workspace_id)
            ->first();
        $selected_navigation = 'IncomeList';
        $calc_total = $planningRevenueOperatingAssumptions ? $planningRevenueOperatingAssumptions->calc_total : [];
        $TAM = 0; $SAM = 0; $SOM = 0;
        $TAM = $this->size5 ?? 0 ;
        if($TAM){
            $SAM = $TAM * 0.25;
            $SOM = $SAM * 0.07;
        }
        $financial_evaluation = 0 ;
        if(FinancialEvaluation::where('workspace_id',auth()->user()->workspace_id)){
            $financial_evaluation = FinancialEvaluation::where('workspace_id',auth()->user()->workspace_id)->select('value')->first()['value'];
        }
        $unitForChart = $this->unit5 ?? '';
        $requiredInvestmentForChart = RequiredInvestment::latest()->first();
        if($this->unit5){
            $this->unit5 == 'million' ? $unitForChart = 'مليون' : $unitForChart = 'مليار';
        }
        return view('livewire.investshow',compact(
            'TAM',
            'SAM',
            'SOM',
            'calc_total',
            'requiredInvestmentForChart',
            'financial_evaluation',
            'unitForChart',
            'all_revenues_forecasting',
            'mainMarket1',
            'mainMarket2',
            'mainMarket3',
            'mainMarket4',
        ));
    }
}
