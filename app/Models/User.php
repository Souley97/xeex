<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Vinkla\Hashids\Facades\Hashids;

class User extends Authenticatable
{
    
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'points', 'referral_code', 'referrer_id','phone', 'address','payment' ,'is_admin',
    ];
    public static function paymentOptions()
    {
        return [
            'Wave' => 'Wave',
            'Orange_Money' => 'Orange_Money',
        ];
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    //pour Authrisation Des page par SuperAdmin et Admin


    public function hasAnyRole(array $role){
        return $this->roles()->whereIn('name', $role)->first();
    }
    //pour Authrisation Des page par SuperAdmin , Admdin , Mentors et Junior
    public function hasAllRole(array $role){
        return $this->roles()->whereIn('name', $role)->first();
    }
    
    public function hasAdminRole(array $role){
        return $this->roles()->whereIn('name', $role)->first();
    }
    //pour Authrisation Des page par Mentors et Junior
    public function isUser($role){
       return $this->roles()->whereIn('name',$role)->first();
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_user');
    }
    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
    

}


