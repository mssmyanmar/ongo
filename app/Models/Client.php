<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'merchant_id', 'client_identifier', 'client_name', 
        'display_name', 'client_type', 'client_image',
         'client_category', 'phone_number', 'address',
    ];

    public function inputFields()
    {
        return $this->hasMany(inputField::class);
    }
}
