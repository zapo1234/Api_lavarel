<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;


   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'pays',
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function boot()
   {
    parent::boot();
    static::deleting(function($auteur){
        $auteur->products->each(function($values){
           $values->delete();
        });
    });
}
}
