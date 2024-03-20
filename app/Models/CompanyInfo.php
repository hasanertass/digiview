<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $table = 'company_info';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'merchant_id', 'sector', 'website', 'tel', 'email', 'tax_administration', 'VKN', 'billing_address', 'address','description'];
    public function user()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }
}
