<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    use HasFactory;
    protected $table = 'bank_info';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'merchant_id', 'bank_name', 'iban_no'];
    public function user()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }
}
