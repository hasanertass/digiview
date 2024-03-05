<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model 
{
    use HasFactory;
    protected $table = 'user';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'surname', 'packet_type', 'url', 'user_name', 'password','user_type'];
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
}
