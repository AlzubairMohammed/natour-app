<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    //---------------- Attributes
    public function getNameAttribute()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function getThumbnailAttribute()
    {
        $media = $this->media;
        if($media){
            //  if(Storage::exists($media->src)){
                return Storage::url($media->src);
            //  }
        }
        return asset('images/dummy/dummy-user.png');
    }

    //---------------- Scope
    public function scopeIsApprove(Builder $builder, bool $value = true)
    {
        return $builder->where('is_approved', $value);
    }
}
