<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $table = 'personal_info';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'merchant_id', 'tel', 'tel2', 'email', 'email2', 'location', 'location_detail', 'website_url', 'website_url2', 'photograf', 'cv_path', 'whatsap_connect_url'];
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
