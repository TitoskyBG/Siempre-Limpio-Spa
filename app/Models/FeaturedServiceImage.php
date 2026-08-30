<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedServiceImage extends Model
{
    protected $fillable = ['featured_service_id', 'image_path', 'alt_text', 'is_main'];
}