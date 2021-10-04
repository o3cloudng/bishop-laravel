<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'book_id', 'amount', 'reference', 'subscription_end_time', 'status'
    ];

    protected $table = "sub_transactions";

    public function books()
    {
        return $this->belongsTo(Book::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
