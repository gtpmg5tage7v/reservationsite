<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Appointment extends Model
{
    protected $guarded =[];

    public function doctor(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
