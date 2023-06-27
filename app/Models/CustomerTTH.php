<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTTH extends Model
{
    use HasFactory;
    protected $table = 'customertth';
    protected $primaryKey = 'ID';
    protected $fillable = [
        'Received',
        'ReceivedDate',
        'FailedReason',
    ];
}
