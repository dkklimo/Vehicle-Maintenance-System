<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

public function setServicepartAttribute($value){
    $this->attributes['servicepart']=json_encode($value);
}

public function getServicepartAttribute($value){
    return $this->attributes['servicepart']=json_decode($value);
}

}
