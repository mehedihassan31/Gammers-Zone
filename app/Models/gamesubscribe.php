<?php

namespace App\Models;
use App\Models\User;
use App\Models\matches;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gamesubscribe extends Model
{
    use HasFactory;

    protected $table='gamesubscribe';
    protected $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public $timestamps=false;

    public function match() {
        return $this->belongsTo(matches::class,'match_id');
    }

    public function User() {
        return $this->belongsTo(User::class,'user_id');
    }

}
