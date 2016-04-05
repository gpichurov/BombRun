<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable =
        [
            'name',
            'description',
            'image',
            'price',
            'numbers',
            'available',
            'category'
        ];

    public function getId() {
        return $this->id;
    }
}
