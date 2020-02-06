<?php


namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected  $fillable = [];

//    public static function where(string $string, string $string1, string $string2)
//    {
//    }

    public function getPreview()
    {
        $images = explode(',',$this->image );
        array_pop($images);
        if (!empty($images)){
            return '/storage/offerImg/'.$this->id.'/'.$images[0];
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
