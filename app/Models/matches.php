<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matches extends Model
{
    use HasFactory;
    protected $table='matches';
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=true;
}
