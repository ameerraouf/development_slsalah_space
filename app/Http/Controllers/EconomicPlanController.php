<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Workspace;
use Illuminate\Support\Str;
use App\Models\SwotAnalysis;
use Illuminate\Http\Request;
use App\Models\PestelAnalysis;
use App\Http\Controllers\Controller;
use App\Models\PorterModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class EconomicPlanController extends Controller
{
    public function index()
    {
        return view('economic-plans.index', [
            "selected_navigation" => "economic-plan",
        ]);
    }
    public function create(Request $request)
    {
        $request->validate([
            "industry" => 'required',
            "audience" => 'required',
            "business_size" => 'required',
            "product_nature" => 'required',
            "tech_focus" => 'required',
            "market_position" => 'required',
            "location" => 'required',
        ], [
            "industry.required'" => 'حقل الصناعة مطلوب',
            "audience.required'" => 'حقل الجمهور المستهدف مطلوب',
            "business_size.required'" => 'حقل حجم العمل مطلوب ',
            "product_nature.required'" => 'حقل طبيعة المنتج مطلوب',
            "tech_focus.required'" => 'حقل التركيز التكنولوجي مطلوب',
            "market_position.required'" => 'حقل موقع السوق الرئيسي مطلوب',
            "location.required'" => 'حقل المناطق الجغرافية مطلوب',
        ]);

        $this->porterAnalysis($request);
        $this->swotAnalysis($request);
        $this->pestelAnalysis($request);
    }

    private function pestelAnalysis($request)
    {
        $pestel_message = "I want to write a pestel analysis based on the answers of the following questions . <br />
                question 1 : Choose an industry for your project or business <br/>
                answer for question 1 : {$request->industry} <br/>
                question 2 : Specify the size of your business/project. <br/>
                answer for question 2 : {$request->business_size} <br/>
                question 3 : Specify the primary target audience for your project/business. <br/>
                answer for question 3 : {$request->audience} <br/>
                question 4 : Specify the nature of your product/service. <br/>
                answer for question 4 : {$request->product_nature} <br/>
                question 5 : Choose the primary technological focus for your project/business. <br/>
                answer for question 5 : {$request->tech_focus} <br/>
                question 6 : Specify the primary market location for your project/business. <br/>
                answer for question 6 : {$request->market_position} <br/>
                question 7 : Choose the geographical regions in which your project/business operates. <br/>
                answer for question 7 : {$request->location} <br/>
                I want the answer be  as follows<br />
                Political:<br />
                Economic:<br />
                Social:<br />
                Technological:<br />
                Environmental:<br />
                Legal:<br />
        ";
        $workspace = Workspace::find(1);
        $settings_data = Setting::where('workspace_id', $workspace->id)->get();
        $settings = [];
        foreach ($settings_data as $setting) {
            $settings[$setting->key] = $setting->value;
        }
        if (array_key_exists('api_keys', $settings)) {
            $api_keys = $settings['api_keys'];
        } else {
            throw ValidationException::withMessages([
                'api_keys' => 'does not exist',
            ]);
        }

        // send to openai api 
        $payload = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => $pestel_message,
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[1],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payload);
        $responseData = json_decode($response, true);
        $message = $responseData['choices'][0]['message']['content'];
        /*******************************************  Start Of Political *********************************************/
        $political=[];
        if (preg_match('/Political:(.*?)(?=Economic:|Social:|Technological:|Environmental:|Legal:|$)/s', $message, $matches)) {
            $politicalLines = explode(PHP_EOL, $matches[1]);
            $politicalLines = array_map('trim', $politicalLines);
            $politicalLines = array_filter($politicalLines);
            $political = array_values($politicalLines);
        }
        // $political = $political[0];
        $payloadPolitical = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($political).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $political_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadPolitical);
        $PoliticalData = json_decode($political_in_arabic, true);
        $PoliticalMessage = $PoliticalData['choices'][0]['message']['content'];
        /*******************************************  End Of Political *********************************************/
        /*******************************************  Start Of Economic *********************************************/
        $economic=[];
        if (preg_match('/Economic:(.*?)(?=Political:|Social:|Technological:|Environmental:|Legal:|$)/s', $message, $matches)) {
            $economicLines = explode(PHP_EOL, $matches[1]);
            $economicLines = array_map('trim', $economicLines);
            $economicLines = array_filter($economicLines);
            $economic = array_values($economicLines);
        }
        // $economic = $economic[0];
        $payloadEconomic = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($economic).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $economic_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadEconomic);
        $EconomicData = json_decode($economic_in_arabic, true);
        $EconomicMessage = $EconomicData['choices'][0]['message']['content'];
        /*******************************************  End Of Economic *********************************************/
        /*******************************************  Start Of Social *********************************************/
        $social=[];
        if (preg_match('/Social:(.*?)(?=Political:|Economic:|Technological:|Environmental:|Legal:|$)/s', $message, $matches)) {
            $socialLines = explode(PHP_EOL, $matches[1]);
            $socialLines = array_map('trim', $socialLines);
            $socialLines = array_filter($socialLines);
            $social = array_values($socialLines);
        }
        // $social = $social[0];
        $payloadSocial = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($social).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $social_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadSocial);
        $SocialData = json_decode($social_in_arabic, true);
        $SocialMessage = $SocialData['choices'][0]['message']['content'];
        /*******************************************  End Of Social *********************************************/
        /*******************************************  Start Of Technological *********************************************/
        $techonlogical=[];
        if (preg_match('/Technological:(.*?)(?=Political:|Economic:|Social:|Environmental:|Legal:|$)/s', $message, $matches)) {
            $techonlogicalLines = explode(PHP_EOL, $matches[1]);
            $techonlogicalLines = array_map('trim', $techonlogicalLines);
            $techonlogicalLines = array_filter($techonlogicalLines);
            $techonlogical = array_values($techonlogicalLines);
        }
        // $techonlogical = $techonlogical[0];
        $payloadTechnological = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($techonlogical).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $techonlogical_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadTechnological);
        $TechnologicalData = json_decode($techonlogical_in_arabic, true);
        $TechnologicalMessage = $TechnologicalData['choices'][0]['message']['content'];
        /*******************************************  End Of Technological *********************************************/
        /*******************************************  Start Of Environmental *********************************************/
        $enviromental=[];
        if (preg_match('/Environmental:(.*?)(?=Political:|Economic:|Social:|Technological:|Legal:|$)/s', $message, $matches)) {
            $enviromentalLines = explode(PHP_EOL, $matches[1]);
            $enviromentalLines = array_map('trim', $enviromentalLines);
            $enviromentalLines = array_filter($enviromentalLines);
            $enviromental = array_values($enviromentalLines);
        }
        // $enviromental = $enviromental[0];
        $payloadEnvironmental = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => 'translate this into arabic'.json_encode($enviromental),
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $enviromental_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadEnvironmental);
        $EnvironmentalData = json_decode($enviromental_in_arabic, true);
        $EnvironmentalMessage = $EnvironmentalData['choices'][0]['message']['content'];
        /*******************************************  End Of Environmental *********************************************/
        /*******************************************  Start Of Legal *********************************************/
        $legal=[];
        if (preg_match('/Legal:(.*?)(?=Political:|Economic:|Social:|Technological:|Environmental:|$)/s', $message, $matches)) {
            $legalLines = explode(PHP_EOL, $matches[1]);
            $legalLines = array_map('trim', $legalLines);
            $legalLines = array_filter($legalLines);
            $legal = array_values($legalLines);
        }
        // $legal = $legal[0];
        $payloadLegal = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => 'translate this into arabic'.json_encode($legal),
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $legal_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadLegal);
        $LegalData = json_decode($legal_in_arabic, true);
        $LegalMessage = $LegalData['choices'][0]['message']['content'];
        /*******************************************  End Of Legal *********************************************/
                
        

        // write the pestal analysis 
        $pestel_analysis = PestelAnalysis::create([
            "uuid" => Str::uuid(),
            "workspace_id" => auth()->user()->workspace_id,
            "admin_id" => 0,
            "company_name" => $settings['company_name'],
            "political" => ($PoliticalMessage) ?? [],
            "economic" => ($EconomicMessage) ?? [],
            "social" => ($SocialMessage) ?? [],
            "technological" => ($TechnologicalMessage) ?? [],
            "environmental" => ($EnvironmentalMessage) ?? [],
            "legal" => ($LegalMessage) ?? [],
        ]);
    }

    private function swotAnalysis($request)
    {
        $swot_message = "I want to write a swot analysis based on the answers of the following questions . <br />
                question 1 : Choose an industry for your project or business <br/>
                answer for question 1 : {$request->industry} <br/>
                question 2 : Specify the size of your business/project. <br/>
                answer for question 2 : {$request->business_size} <br/>
                question 3 : Specify the primary target audience for your project/business. <br/>
                answer for question 3 : {$request->audience} <br/>
                question 4 : Specify the nature of your product/service. <br/>
                answer for question 4 : {$request->product_nature} <br/>
                question 5 : Choose the primary technological focus for your project/business. <br/>
                answer for question 5 : {$request->tech_focus} <br/>
                question 6 : Specify the primary market location for your project/business. <br/>
                answer for question 6 : {$request->market_position} <br/>
                question 7 : Choose the geographical regions in which your project/business operates. <br/>
                answer for question 7 : {$request->location} <br/>
        ";
        // $swot_message = "أريد كتابة تحليل SWOT استنادًا إلى إجابات الأسئلة التالية: 
        //     السؤال ١: اختر صناعة لمشروعك أو عملك. 
        //     الإجابة على السؤال ١: {$request->industry}        
        //     السؤال ٢: حدد حجم عملك/مشروعك. 
        //     الإجابة على السؤال ٢: {$request->business_size}        
        //     السؤال ٣: حدد الجمهور المستهدف الأساسي لمشروعك/عملك.        
        //     الإجابة على السؤال ٣: {$request->audience}        
        //     السؤال ٤: حدد طبيعة المنتج/الخدمة الخاص بك.        
        //     الإجابة على السؤال ٤: {$request->product_nature}        
        //     السؤال ٥: اختر التركيز التكنولوجي الأساسي لمشروعك/عملك.
        //     الإجابة على السؤال ٥: {$request->tech_focus}        
        //     السؤال ٦: حدد الموقع الرئيسي للسوق لمشروعك/عملك.        
        //     الإجابة على السؤال ٦: {$request->market_position}        
        //     السؤال ٧: اختر المناطق الجغرافية التي يعمل فيها مشروعك/عملك.        
        //     الإجابة على السؤال ٧: {$request->location}        
        // ";

        $workspace = Workspace::find(1);
        $settings_data = Setting::where('workspace_id', $workspace->id)->get();
        $settings = [];
        foreach ($settings_data as $setting) {
            $settings[$setting->key] = $setting->value;
        }
        if (array_key_exists('api_keys', $settings)) {
            $api_keys = $settings['api_keys'];
        } else {
            throw ValidationException::withMessages([
                'api_keys' => 'does not exist',
            ]);
        }

        // send to openai api 
        $payload = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => $swot_message,
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payload);
        $responseData = json_decode($response, true);
        $message = $responseData['choices'][0]['message']['content'];

        // Regular expression pattern to extract threats
        $threats=[];
        if (preg_match('/Threats:(.*?)(?=Strengths:|Weaknesses:|Opportunities:|$)/s', $message, $matches)) {
            $threatLines = explode(PHP_EOL, $matches[1]);
            $threatLines = array_map('trim', $threatLines);
            $threatLines = array_filter($threatLines);
            $threats = array_values($threatLines);
        }

        // Output the extracted threats
        foreach ($threats as $threat) {
            $threats = array_merge($threats, preg_split('/\R/', $threat));
        }
        $threats = array_map('trim', $threats);
        
        // Remove any empty elements
        $threats = array_filter($threats);
        
        $swot_data['threats'] = $threats;

        $payloadThreat = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($swot_data['threats']).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $threats_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadThreat);
        $ThreateData = json_decode($threats_in_arabic, true);
        $ThreateMessage = $ThreateData['choices'][0]['message']['content'];


        $opportunities=[];
        // Regular expression pattern to extract opportunities
        if (preg_match('/Opportunities:(.*?)(?=Strengths:|Weaknesses:|Threats:|$)/s', $message, $matches)) {
            $opportunitLines = explode(PHP_EOL, $matches[1]);
            $opportunitLines = array_map('trim', $opportunitLines);
            $opportunitLines = array_filter($opportunitLines);
            $opportunities = array_values($opportunitLines);
        }

        // Output the extracted threats
        foreach ($opportunities as $Opportunity) {
            $opportunities = array_merge($opportunities, preg_split('/\R/', $Opportunity));
        }
        $opportunities = array_map('trim', $opportunities);
        // Remove any empty elements
        $opportunities = array_filter($opportunities);
        $swot_data['opportunities'] = $opportunities;

        $payloadOpportunities = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($swot_data['opportunities']).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $opportunities_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadOpportunities);
        $opportunitiesData = json_decode($opportunities_in_arabic, true);
        $opportunitiesMessage = $opportunitiesData['choices'][0]['message']['content'];


        $strengths=[];
        // Regular expression pattern to extract strengths
        if (preg_match('/Strengths:(.*?)(?=Opportunities:|Weaknesses:|Threats:|$)/s', $message, $matches)) {
            $StrengthsLines = explode(PHP_EOL, $matches[1]);
            $StrengthsLines = array_map('trim', $StrengthsLines);
            $StrengthsLines = array_filter($StrengthsLines);
            $strengths = array_values($StrengthsLines);
        }

        // Output the extracted threats
        foreach ($strengths as $strength) {
            $strengths = array_merge($strengths, preg_split('/\R/', $strength));
        }
        $strengths = array_map('trim', $strengths);

        // Remove any empty elements
        $strengths = array_filter($strengths);
        $swot_data['strengths'] = $strengths;

        $payloadStrengths = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($swot_data['strengths']).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $Strengths_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadStrengths);
        $StrengthsData = json_decode($Strengths_in_arabic, true);
        $StrengthsMessage = $StrengthsData['choices'][0]['message']['content'];


        $weaknesses=[];
        // Regular expression pattern to extract weaknesses
        if (preg_match('/Weaknesses:(.*?)(?=Opportunities:|Strengths:|Threats:|$)/s', $message, $matches)) {
            $WeaknessesLines = explode(PHP_EOL, $matches[1]);
            $WeaknessesLines = array_map('trim', $WeaknessesLines);
            $WeaknessesLines = array_filter($WeaknessesLines);
            $weaknesses = array_values($WeaknessesLines);
        }

        // Output the extracted threats
        foreach ($weaknesses as $weaknesse) {
            $weaknesses = array_merge($weaknesses, preg_split('/\R/', $weaknesse));
        }
        $weaknesses = array_map('trim', $weaknesses);

        // Remove any empty elements
        $weaknesses = array_filter($weaknesses);
        $swot_data['weaknesses'] = $weaknesses;
        $payloadWeaknesses = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($swot_data['weaknesses']).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $weaknesses_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadWeaknesses);
        $weaknessesData = json_decode($weaknesses_in_arabic, true);
        $weaknessesMessage = $weaknessesData['choices'][0]['message']['content'];


        // write the swot analysis 
        $swot_analysis = SwotAnalysis::create([
            "uuid" => Str::uuid(),
            "workspace_id" => auth()->user()->workspace_id,
            "admin_id" => 0,
            "company_name" => $settings['company_name'],
            "strengths" => $StrengthsMessage,
            "weaknesses" => $weaknessesMessage,
            "opportunities" => $opportunitiesMessage,
            "threats" => $ThreateMessage,
        ]);
    }

    private function porterAnalysis($request)
    {
        $pestel_message = "I want to write a porter-5 analysis based on the answers of the following questions . <br />
                question 1 : Choose an industry for your project or business <br/>
                answer for question 1 : {$request->industry} <br/>
                question 2 : Specify the size of your business/project. <br/>
                answer for question 2 : {$request->business_size} <br/>
                question 3 : Specify the primary target audience for your project/business. <br/>
                answer for question 3 : {$request->audience} <br/>
                question 4 : Specify the nature of your product/service. <br/>
                answer for question 4 : {$request->product_nature} <br/>
                question 5 : Choose the primary technological focus for your project/business. <br/>
                answer for question 5 : {$request->tech_focus} <br/>
                question 6 : Specify the primary market location for your project/business. <br/>
                answer for question 6 : {$request->market_position} <br/>
                question 7 : Choose the geographical regions in which your project/business operates. <br/>
                answer for question 7 : {$request->location} <br/>
                I want the answer be  as follows<br />
                Rivals:<br />
                Suppliers:<br />
                Substitutes:<br />
                Entrants:<br />
                Customers:<br />
        ";
        $workspace = Workspace::find(1);
        $settings_data = Setting::where('workspace_id', $workspace->id)->get();
        $settings = [];
        foreach ($settings_data as $setting) {
            $settings[$setting->key] = $setting->value;
        }
        if (array_key_exists('api_keys', $settings)) {
            $api_keys = $settings['api_keys'];
        } else {
            throw ValidationException::withMessages([
                'api_keys' => 'does not exist',
            ]);
        }

        // send to openai api 
        $payload = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => $pestel_message,
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];
        $response = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[1],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payload);

        
        $responseData = json_decode($response, true);
        $message = $responseData['choices'][0]['message']['content'];

        /*******************************************  Start Of Rivals *********************************************/
        $rivals=[];
        if (preg_match('/Rivals:(.*?)(?=Suppliers:|Substitutes:|Entrants:|Customers:|$)/s', $message, $matches)) {
            $rivalLines = explode(PHP_EOL, $matches[1]);
            $rivalLines = array_map('trim', $rivalLines);
            $rivalLines = array_filter($rivalLines);
            $rivals = array_values($rivalLines);
        }
        $rivals = $rivals[0];
        $payloadRivals = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($rivals).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $rivals_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadRivals);
        $RivalsData = json_decode($rivals_in_arabic, true);
        $RivalsMessage = $RivalsData['choices'][0]['message']['content'];

        /*******************************************  End Of Rivals *********************************************/
        /*******************************************  Start Of Suppliers *********************************************/
        $suppliers=[];
        if (preg_match('/Suppliers:(.*?)(?=Rivals:|Substitutes:|Entrants:|Customers:|$)/s', $message, $matches)) {
            $supplierLines = explode(PHP_EOL, $matches[1]);
            $supplierLines = array_map('trim', $supplierLines);
            $supplierLines = array_filter($supplierLines);
            $suppliers = array_values($supplierLines);
        }
        $suppliers = $suppliers[0];
        $payloadSupplier = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($suppliers).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $suppliers_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadSupplier);
        $SupplierData = json_decode($suppliers_in_arabic, true);
        $SupplierMessage = $SupplierData['choices'][0]['message']['content'];

        /*******************************************  End Of Suppliers *********************************************/
        /*******************************************  Start Of Substitutes *********************************************/
        $substitutes=[];
        if (preg_match('/Substitutes:(.*?)(?=Rivals:|Suppliers:|Entrants:|Customers:|$)/s', $message, $matches)) {
            $substituteLines = explode(PHP_EOL, $matches[1]);
            $substituteLines = array_map('trim', $substituteLines);
            $substituteLines = array_filter($substituteLines);
            $substitutes = array_values($substituteLines);
        }
        $substitutes = $substitutes[0];
        $payloadSubstitute = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($substitutes).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $substitutes_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadSubstitute);
        $SubstituteData = json_decode($substitutes_in_arabic, true);
        $SubstituteMessage = $SubstituteData['choices'][0]['message']['content'];

        /*******************************************  End Of Substitutes *********************************************/
        /*******************************************  Start Of Entrants *********************************************/
        $entrants=[];
        if (preg_match('/Entrants:(.*?)(?=Rivals:|Suppliers:|Substitutes:|Customers:|$)/s', $message, $matches)) {
            $entrantLines = explode(PHP_EOL, $matches[1]);
            $entrantLines = array_map('trim', $entrantLines);
            $entrantLines = array_filter($entrantLines);
            $entrants = array_values($entrantLines);
        }
        $entrants = $entrants[0];
        $payloadEntrant = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($entrants).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $entrants_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadEntrant);
        $EntrantData = json_decode($entrants_in_arabic, true);
        $EntrantMessage = $EntrantData['choices'][0]['message']['content'];

        /*******************************************  End Of Customers *********************************************/
        /*******************************************  Start Of Substitutes *********************************************/
        $customers=[];
        if (preg_match('/Customers:(.*?)(?=Rivals:|Suppliers:|Entrants:|Substitutes:|$)/s', $message, $matches)) {
            $customerLines = explode(PHP_EOL, $matches[1]);
            $customerLines = array_map('trim', $customerLines);
            $customerLines = array_filter($customerLines);
            $customers = array_values($customerLines);
        }
        $customers = $customers[0];
        $payloadCustomer = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You can start the conversation.',
                ],
                [
                    'role' => 'user',
                    'content' => json_encode($customers).'translate into arabic',
                ],
            ],
            "model" => 'gpt-3.5-turbo'
        ];

        $customers_in_arabic = Http::withHeaders([
            'Authorization' => "Bearer " .  json_decode($api_keys)[0],
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', $payloadCustomer);
        $CustomerData = json_decode($customers_in_arabic, true);
        $CustomerMessage = $CustomerData['choices'][0]['message']['content'];

        /*******************************************  End Of Customers *********************************************/
        $porter_analysis = PorterModel::create([
            "uuid" => Str::uuid(),
            "workspace_id" => auth()->user()->workspace_id,
            "admin_id" => 0,
            "company_name" => $settings['company_name'],
            "rivals" => $RivalsMessage ?? null,
            "entrants" => $EntrantMessage ?? null,
            "suppliers" => $SupplierMessage ?? null,
            "customers" => $CustomerMessage ?? null,
            "substitute" => $SubstituteMessage ?? null,
        ]);
        return $message;
    }
}
