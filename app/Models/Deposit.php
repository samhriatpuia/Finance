<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'particulars', 'department', 'challan_number','create_date','challan_amount','release_amount','withdrawn_amount','balance','department_id','balance',
    ];
}
