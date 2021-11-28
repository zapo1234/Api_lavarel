<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index(){

        $list = Article::latest()->take(5)->get();
        $array = [];

        foreach($list as $values) {

            $b =  $values->description;
            $c = explode(',',$b);

            foreach($c as $val){
                $array[] = $val;
            }
        }

        $listes = $array;
        $article = new Article();
        $prix= $article->getPrix();

        return view('article', [
            'listes' =>$listes,
            'prix'=> $prix,
            
        ]);
    }

    public function contact(){

        return view('contact');
    }
}
