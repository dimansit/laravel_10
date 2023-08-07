<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'source';
    protected $fillable = ['name', 'description', 'url'];


    public function news()
    {
        return $this->hasMany(
            News::class,
            'source_id',
            'id'
        );
    }


}
