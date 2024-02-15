<?php

namespace App\Http\Controllers;

use App\Models\FavoriteRounds;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FavoriteRoundsController extends Controller
{

    public function __construct(private FavoriteRounds $round_follower,) 
    {

    }


    public function round_follow(Request $request)
    {
        
        if (auth('investor')->check()) {
            $roundFollower = $this->round_follower->where(['investor_id'=>auth('investor')->user()->id,'found_round_id'=>$request->round_id])->first();
            if ($roundFollower) {
                $roundFollower->delete();
                $followers = $this->round_follower->where(['found_round_id'=>$request->round_id])->count();

                return response()->json([
                    'message' => __("remove_from_favorite_successfully")." !",
                    'value' => 2,
                    'followers' => $followers,
                ]);

            } else {
                $this->round_follower->insert([
                    'investor_id'=>auth('investor')->id(),
                    'found_round_id'=>$request->round_id,
                    'created_at'=>Carbon::now(),
                ]);
                $followers = $this->round_follower->where(['found_round_id'=>$request->round_id])->count();

                return response()->json([
                    'message' => __("add_to_favorite_successfully")." !",
                    'value' => 1,
                    'followers' => $followers,
                ]);
            }
        }else{
            return response()->json([
                'message' => __("login_first"),
                'value' => 0,
            ]);
        }

    }

}
