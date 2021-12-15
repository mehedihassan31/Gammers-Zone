<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gamesubscribe extends Model
{
    use HasFactory;

    protected $table="gamesubscribe";
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;

    public function product() {
        return $this->belongsTo(ProductsModel::class,'product_id');
    }

    public function user() {
        return $this->belongsTo(user::class,'user_id');
    }
}
