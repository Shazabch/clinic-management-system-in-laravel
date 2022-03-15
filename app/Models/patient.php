<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'age',
        'address',
        'phone',
        'mr_number'
    ];
    public function vital(){
        return $this->hasMany(vital::class);
    }
    public function attachment(){
        return $this->hasMany(attachment::class);
    }
    public $incrementing = true;
}
