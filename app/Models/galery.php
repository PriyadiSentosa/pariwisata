<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    use HasFactory;
    protected $fillable = ['image'];
    protected $visible = ['image'];
    public $timestamps = true;

    //membuat relasi one to many dengan model "wisata"
    public function image()
    {
        if ($this->image && file_exists(public_path('images/galery/' .$this->image))){
            return asset('images/galery/' .$this->image);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->image && file_exists(public_path('images/image/' . $this->image))) {
            return unlink(public_path('images/image/' . $this->image));
        }
    }
}
