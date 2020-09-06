<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LikesDislike;
use Auth;

class LikeDislikeController extends Controller
{
    public function like($id){
        $isExist = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();

        if($isExist){
            if($isExist->type == 'dislike'){
                LikesDislike::where('id',$isExist->id)->update([
                    'type' => 'like',
                ]);
            }
            return back();
        }else{
            LikesDislike::create([
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'type' => 'like',
            ]);
        }
        return back();
    }

    public function dislike($id){
        $isExist = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();

        if($isExist){
            if($isExist->type == 'like'){
                LikesDislike::where('id',$isExist->id)->update([
                    'type' => 'dislike',
                ]);
            }
            return back();
        }else{
            LikesDislike::create([
                'user_id' => Auth::user()->id,
                'post_id' => $id,
                'type' => 'dislike',
            ]);
        }


    }
}
