<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatEvidence extends Model
{


	public $timestamps = false;

	public $table = "cat_evidence";

    protected $fillable = [
        'name', 'active'
    ];

    public function evidence()
    {
        return $this->hasMany(Evidence::class, 'cat_evidence_id', 'id');
    }

    public static function get_cat_evidence($extension)
    {
        $image_types = array("jpg", "png", "jpeg", "gif", "bmp", "tiff");
        $document_types = array("xls", "doc", "docx", "pdf", "txt");
        $video_types = array("mp4", "vlc", "avi", "webm", "wmv");
        $audio_types = array("mp3", "flac", "ogg", "ape", "m4a");

        if (in_array($extension, $image_types))
        {
            return CatEvidence::where('name', 'LIKE', 'Imagen')->first();
        }else if (in_array($extension, $document_types))
        {
            return CatEvidence::where('name', 'LIKE', 'Documento')->first();
        }else if (in_array($extension, $video_types))
        {
            return CatEvidence::where('name', 'LIKE', 'Video')->first();
        }else if (in_array($extension, $audio_types))
        {
            return CatEvidence::where('name', 'LIKE', 'Audio')->first();
        }else
        {
            return null;
        }
    }
}
