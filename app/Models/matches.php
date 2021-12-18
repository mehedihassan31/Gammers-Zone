<?php

namespace App\Models;
use App\Models\gamesubscribe;

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


    public function gamesubscribe(){
        return $this->belongsToMany(gamesubscribe::class,'id');
      }


}
