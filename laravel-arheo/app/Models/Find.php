<?php

namespace App\Models;

use App\Traits\Postgres\Model\Traits\PostgresArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Find extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'fund_code',
        'place_of_storage',
        'find_number',
        'date_of_find',
        'culture_id',
        'dating',
        'involved_person',
        'length',
        'width',
        'height',
        'weight',
        'object_id',
        'post_id',
        'material_id',
        'category_id',
        'find_images',
        'lat',
        'lng',
        'description',
        'authors',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
