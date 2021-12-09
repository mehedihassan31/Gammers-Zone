<?php

namespace App\Models;

use App\Models\admin\ProductsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table="order";
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;

    public function product() {
        return $this->belongsTo(ProductsModel::class,'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
