<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QurbanPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_folder',
        'image_name',
        'type',
        'is_active',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image_folder && $this->image_name) {
            return asset('uploads/' . $this->image_folder . '/' . $this->image_name);
        }
        return asset('assets/images/placeholder.png');
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
