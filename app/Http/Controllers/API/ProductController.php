<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retourne une list  pagination de 10 collections
        $product = Product::paginate(10);
        // on retour les informations du user en json
        return ProductResource::collection($product);
    }

      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //retourne le product id  en Json
        return  new ProductResource($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        // création d'un product
        $product = Product::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'age' => $request->age,
            'gender'=> $request->gender,
            'address_info' => $request->address_info
        ]);

         // On retourne les informations du nouvel utilisateur en JSON
         return response()->json($product, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
         // création d'un product
         $product->udpate([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'age' => $request->age,
            'gender'=> $request->gender,
            'address_info' => $request->address_info
        ]);

        return response()->json();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       // On supprime l'utilisateur
        $product->delete();
        // On retourne la réponse JSON
        return response()->json();
    }
}
