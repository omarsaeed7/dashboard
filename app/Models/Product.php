<?php

namespace App\Models;

use App\Traits\Translate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Translate;
    protected $guarded = [];
    //
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'main');
    }

    public function gallery()
    {
        return $this->morphMany(Image::class, 'imageable')->where('type', 'gallery');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    function order_details()
    {
        return $this->HasMany(OrderDetail::class);
    }
     // img_path -> ImgPath + get...Attribute = getImgPathAttribute
     function getImgPathAttribute() {
        $url = asset('images/17642496461734003318falcon.jpg'); // this going to be default if the user didn't add image
        if($this->image) { // if the object got image use it's image in your storage
            $url = asset('images/'. $this->image->path);
        }

        return $url;
    }
}
