<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $table = 'social_media';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'merchant_id', 'social_media_name', 'social_media_icon', 'social_media_url'];
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
