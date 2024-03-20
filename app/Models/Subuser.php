<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subuser extends Model
{
    use HasFactory;
    protected $table = 'sub_user';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'merchant_id','name','surname','title' ,'tel','mail','photograph', 'whatsap_connect_url','description'];
    public function user()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }
}
