<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
