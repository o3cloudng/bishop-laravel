<?php

namespace App\Models;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id', 'chapter'
    ];

    protected $table = "chapters";

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function content()
    {
        return $this->belongsTo(Chapter::class);
    }
}
