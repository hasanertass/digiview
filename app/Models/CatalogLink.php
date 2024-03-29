<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogLink extends Model
{
    use HasFactory;
    protected $table = 'catalog_link';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'merchant_id', 'file_path', 'icon_link','catalog_name','download_number'];
    public function user()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }
}
