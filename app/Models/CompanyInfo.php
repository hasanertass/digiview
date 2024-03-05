<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $table = 'catalog_link';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'merchant_id', 'sector', 'website', 'tel', 'email', 'tax_administration', 'VKN', 'billing_address', 'address'];
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
