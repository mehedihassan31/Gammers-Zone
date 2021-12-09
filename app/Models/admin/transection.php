<?php

namespace App\Models\admin;

use App\Models\admin\users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transection extends Model
{
    use HasFactory;
    protected $table='transction';
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;

    function user(){
        return $this->belongsTo(users::class,'user_id');
    }
}
