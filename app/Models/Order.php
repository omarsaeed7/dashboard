<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    //
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function order_details(){
        return $this->HasMany(OrderDetail::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
