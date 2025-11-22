<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public $timestamps = true;
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    //Ha létrehozunk egy új terméket, akkor milyen adatokat tudunk megadni
    //Ez kötelező, a többit nem engedi
    protected $fillable = [
        'category',
        'name',
        'description',
        'picture',
        'price',
        'stock',
    ];

    protected $hidden =[
        'personName',
        'zipcode'
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'price' => 'integer',
            'dob' => 'date'
        ];
    }
}
