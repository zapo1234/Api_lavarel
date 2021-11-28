<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'age',
        'gender',
        'address_info',
        'auteur_id',
    ];

    
    public function Auteur()
    {
        return $this->belongsTo(Auteur::class);
    }
}
