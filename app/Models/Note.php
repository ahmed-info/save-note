<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Note extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'notes';
    // protected $fillable = [
    //     'content',
    //     'type',
    //     'image'
    // ];
}