<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCateg extends Model
{
    use HasFactory;
    protected $tabl = 'product_categs';
    protected $primaryKey = 'catid';
}
