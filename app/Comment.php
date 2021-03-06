<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
    	'user_id', 'report_id','comment'
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function addComment($userID, $commentContent, $reportID)
    {
        $comment = Comment::create([
            'user_id' => $userID,
            'report_id' => $reportID,
            'comment' => $commentContent
        ]);

        return $comment;
    }
}
