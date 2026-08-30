<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeforeAfterItem extends Model
{
    protected $fillable = [
        'tab_name', 'tab_target', 'tag', 'title', 'description',
        'image_before_path', 'image_before_alt',
        'image_after_path', 'image_after_alt'
    ];

    public function steps()
    {
        return $this->hasMany(BeforeAfterStep::class);
    }
}