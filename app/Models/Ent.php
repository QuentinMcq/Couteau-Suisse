<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ent extends Model
{
    use HasFactory;

    protected $table = 'ent';

    protected $guarded = [];

    protected $fillable = [
        'title',
        'link'
    ];
}
