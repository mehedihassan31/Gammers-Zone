<?php

namespace App\Models;
use App\Models\admin\users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdraw extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='withdraw';
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;

    function user(){
        return $this->belongsTo(users::class,'user_id');
    }
}
