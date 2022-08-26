<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'address',
        'birth_date',
        'point',
        'address',
        'birth_date',
        'phone',
        'change_nick_date',
        'grade',
        'google_id',
        'naver_id',
        'kakao_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function LifeStoryBoard(){
        //사용자는 글을 많이 쓸 수 있다.
//        return $this->hasMany(lifeStoryBoard::class);
        return $this->hasMany('App\Models\LifeStoryBoard','u_id');
    }

    public function comment(){
        // 사용자는 댓글을 많이 단다.
//        return $this->hasMany(comment::class);
        return $this->hasMany('App\Models\comment','u_id','id');
    }
}
