<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_photo',
        'cv',
        'phone_number',
        'address',
        'perfomances',
        'description',
    ];


    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}