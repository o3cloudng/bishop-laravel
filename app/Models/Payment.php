<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference', 'tranxId', 'book_id', 'email', 'fullname', 'phone', 'bank', 'currency', 'channel', 'amount', 'status'
    ];
}
