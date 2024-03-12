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

    protected $fillable = ['id', 'merchant_id', 'tel', 'tel2', 'mail', 'mail2', 'location', 'location_detail', 'website_url', 'website_url2', 'photograph', 'cv_path', 'whatsap_connect_url'];
    public function user()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }
}
