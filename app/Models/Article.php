<?php


namespace App\Models;




use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Article extends Model
{
    protected $table = 'articles';
    protected  $fillable = [];

public function getPreview()
{
    $images = explode(',',$this->image );
    array_pop($images);
    if (!empty($images)){
        return '/storage/articleImg/'.$this->id.'/'.$images[0];
    }
    return '/images/default.jpg';
}
public function getAllImage()
{
    $images = explode(',',$this->image );
    array_pop($images);
    if (!empty($images)){
        return $images;
    }
    return [];
}
public function user()
{
    return $this->belongsTo(User::class);
}
}

