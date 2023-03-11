<?php

namespace App\Services\Dashboard;

use App\Models\Product;
use Faker\Guesser\Name;
use Illuminate\Support\Str;

class ProductService extends BaseService
{
    private $productDocService;
    public function __construct(ProductDocService $productDocService)
    {
        $this->productDocService = $productDocService;
    }

    public function store($request)
    {
        // dd($request);
        $request = $request->toArray();
        if (!empty($request['photos'])){
            $photos = [];
            foreach ($request['photos'] as $photo){
                array_push($photos, $this->photoSave($photo, 'img/products'));
            }
        }
    
        $product = new Product();
        $product->photos = $photos;
        $product->name_ru = $request['name_ru'];
        $product->name_uz = $request['name_uz'];
        $product->price = $request['price'];
        if($request['brend_check'] != true){

            $product->brend_check = '0';
        }
        // if($request['brend_check'] != false){

        //     $product->brend_check = 1;
        // }
        $product->slug = Str::slug($request['name_ru']) . '-' . Str::random(5);
        $product->save();
        return back();
    }

    public function update($request, $slug)
    {
        $request = $request->toArray();
        // dd($request);
        $product = Product::where('slug', $slug)->first();
        if (!empty($request['photos'])){
            foreach (Product::where('slug', $slug)->first()->photos as $photo){
                // dd($photo);
                $this->fileDelete(null, null, $photo);
            }
            $photos = [];
            foreach ($request['photos'] as $photo){
                array_push($photos, $this->photoSave($photo, 'img/products'));
            }
            $product->photos = $photos;
        }
        
        
        $product->name_ru = $request['name_ru'];
        $product->name_uz = $request['name_uz'];
        $product->price = $request['price'];
        $product->slug = Str::slug($request['name_ru']) . '-' . Str::random(5);;
        $product->save();
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        foreach ($product->photos as $photo){
            $this->fileDelete(null, null, $photo);
        }
        $product->delete();
        return back();
    }
}
