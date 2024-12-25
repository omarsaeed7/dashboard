<?php

namespace App\Models;

// use App\Traits\Trans;

use App\Traits\Translate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translate;

    protected $guarded = [];

    function products() {
        return $this->hasMany(Product::class);
    }

    function image() {
        return $this->morphOne(Image::class, 'imageable');
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
