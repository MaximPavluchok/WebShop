<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories_SubCategories extends Model
{
    protected $fillable = [
        'CategoriesId',
        'SubCategoriesId'
    ];
    use HasFactory;
}
