<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title', 'description','image_path','youtube_links_1','youtube_links_2','youtube_links_3','textcolor','backgroundcolor'
        ];

}
