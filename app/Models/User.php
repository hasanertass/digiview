<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'name', 'surname', 'packet_type', 'url', 'email', 'password','user_type'
    ];
    protected $table = 'user';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function bankInfo()
    {
        return $this->hasMany(BankInfo::class, 'id');
    }
    public function catalogLink()
    {
        return $this->hasMany(CatalogLink::class, 'id');
    }
    public function companyInfo()
    {
        return $this->hasMany(CompanyInfo::class, 'id');
    }
    public function personalInfo()
    {
        return $this->hasMany(PersonalInfo::class, 'id');
    }
    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class, 'id');
    }
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
        'password' => 'hashed',
    ];    
}
