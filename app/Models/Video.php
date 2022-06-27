<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    /**
     * Атрибуты, для которых НЕ разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * Получить получить коментарий пользователя.
     *
     * @return Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
