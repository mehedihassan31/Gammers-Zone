<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    protected $table='admin';
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;
}
