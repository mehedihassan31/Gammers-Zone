<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transection extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=true;
}
