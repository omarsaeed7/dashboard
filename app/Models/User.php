<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function profile()
    {
        // this belongs to the $user that call the function
        // hasOne means relationship
        return $this->hasOne(Profile::class)
            ->withDefault([ // this going to prevent using (??) nullish operator in html
                'fb' => '*_*', // this going to replace the value of facebook if it's NULL
                'tw' => '$$$'
            ]);
    }

    public function role()
    {
        return $this->belongsTo(Role::class)->withDefault();
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    function testimonials() {
        return $this->HasMany(Testimonial::class);
    }
}
