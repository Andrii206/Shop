<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $guarded = false;

    public function getImageUrlAttribute(){
        return $this -> file_path;
    }
    // public function getImageUrlAttribute(){
    //     return url('storage/' . $this -> file_path);
    // }
}
