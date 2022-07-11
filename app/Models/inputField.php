<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class inputField extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'client_id', 'display_name', 'validation_regx', 
        'display_order', 'field_type', 'isRequired',
         'min', 'max', 'branch_data',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
