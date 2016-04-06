<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable =
        [
            'name',
            'description',
            'big_image',
            'small_image',
            'price',
            'numbers',
            'available',
            'category'
        ];

    public function getId() {
        return $this->id;
    }
}
