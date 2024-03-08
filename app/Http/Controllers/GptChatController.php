<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Setting;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GptChatController extends Controller
{
    public function start_chat()
    {

        return view('gpt-chat.gpt-chat');
    }


    /**
     * @param Request $request
     * @return string
     */
    public function send_message(Request $request): string
    {
        $workspace = Workspace::find(1);
        $settings_data = Setting::where('workspace_id', $workspace->id)->get();
        $settings = [];
        foreach ($settings_data as $setting) {
            $settings[$setting->key] = $setting->value;
        }
        if (array_key_exists('api_keys', $settings)) {
            $api_keys = $settings['api_keys'];
        }
        try {
            /** @var array $response */
            $response = Http::withHeaders([
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . json_decode($api_keys)[1]
            ])->post('https://api.openai.com/v1/chat/completions', [
                "model" => 'gpt-3.5-turbo',
                "messages" => [
                    [
                        "role" => "user",
                        "content" => $request->post('content')
                    ]
                ],
                "temperature" => 0,
                "max_tokens" => 2048
            ]);
            
            $responseData = json_decode($response, true);
            $message = $responseData['choices'][0]['message']['content'];
            $text = trim($message);
            return $message;
        } catch (Throwable $e) {
            $response = "Chat GPT Limit Reached. This means too many people have used this demo this month and hit the FREE limit available. You will need to wait, sorry about that.";
            return response()->json(json_decode($response));
        }
    }
}
