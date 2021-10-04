<?php

namespace App\Models;

use App\Models\Content;
use App\Models\SubTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description','cover','quantity','price','oldprice'
    ];
    protected $table = "books";

    protected $primaryKey = "id";

    public function contents()
    {
        return $this->hasMany(Content::class);
    
    }
    public function sub_transactions()
    {
        return $this->hasMany(SubTransaction::class);
    }
}
