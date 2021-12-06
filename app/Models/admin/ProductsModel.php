<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;

    protected $table='products';
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
