<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model{
    use HasFactory;

    protected $table = 'news';

    protected $guarded = [];

    protected $fillable = [
        'title',
        'department',
        'informations',
        'img',
        'url',
        'user'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
