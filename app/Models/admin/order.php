<?php

namespace App\Models\admin;
use App\Models\User;
use App\Models\admin\ProductsModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table="order";
    protected $fillable = [
        'product_id',
        'user_id',
        'game_id',
        'status',
        'price',
    ];

    public function product() {
        return $this->belongsTo(ProductsModel::class);
    }

    public function user() {
        return $this->belongsTo(user::class);
    }
}
