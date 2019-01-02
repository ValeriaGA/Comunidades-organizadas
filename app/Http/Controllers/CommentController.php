<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'report_id' => $request -> input('reportID'),
            'comment' => $request -> input('comment'),
        ]);


        $user = Auth::user();

        if(!is_null($user->avatar_path))
            $userPath = asset('users/'.$user->id.'/'.$user->avatar_path);
        else
            $userPath = asset('plugins/images/users/profile.png');


        $data = array(
           "userAvatar" => $userPath,
            "userEmail" => $user->email,
            "commentID" => $comment -> id,
            "commentContent" => $request -> input('comment')
        );

        return \Response::json($data); 
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('comments')
            ->where('id', $request -> input('commentID'))
            ->update(['comment' => $request -> input('comment')]);

        $data = array(
            "status" => "done",
            "commentContent" => $request -> input('comment')
        );

        return \Response::json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Comment::where('id', $request -> input('commentID'))
                -> delete();

        $data = array(
            "status" => "done"
        );

        return \Response::json($data);
    }
}
