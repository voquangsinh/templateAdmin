<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description'
    ];

    /**
     * Manu-to-many
     * The Post that belong to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
