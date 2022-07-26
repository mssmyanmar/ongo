<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class storeCash extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'staff_id', 'staff_name', 'company_id', 'merchant_id', 'company_name',
        'amount', 'description', 'remarks',
        'sync_status', 'collected_date','branch_id','loan_id','unique_id'
    ];
}