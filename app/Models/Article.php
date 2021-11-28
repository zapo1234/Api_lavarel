<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'name',
        'matricule',
        'description',
    ];

    private $prix = 50;

    public function getPrix(){
       return $this->prix;
    }

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }


    
}
