<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedService extends Model
{
    protected $fillable = ['tag', 'title', 'description'];

    public function steps()
    {
        return $this->hasMany(FeaturedServiceStep::class);
    }

    public function images()
    {
        return $this->hasMany(FeaturedServiceImage::class);
    }
}