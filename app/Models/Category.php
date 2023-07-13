<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['category'];


    public function news()
    {
        return $this->hasOne(
            News::class,
            'category_id',
            'id'
        );
    }


}
