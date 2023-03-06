<?php

namespace App\Services\Dashboard;

use App\Models\Product;

class ProductService extends BaseService
{
    private $productDocService;
    public function __construct(ProductDocService $productDocService)
    {
        $this->productDocService = $productDocService;
    }

    public function store($request)
    {
        $request = $request->toArray();
        if (!empty($request['photos'])){
            $photos = [];
            foreach ($request['photos'] as $photo){
                array_push($photos, $this->photoSave($photo, 'img/products'));
            }
            
        }
        $request['photos'] = $photos;
        // dd($request);
        Product::create($request);
        return back();
    }

    public function update($request, $id)
    {
        $request = $request->toArray();
        dd($request['photos']);
        if (!empty($request['photos'])){
            foreach (Product::find($id)->photos as $photo){
                // dd($photo);
                $this->fileDelete(null, null, $photo);
            }
            $photos = [];
            foreach ($request['photos'] as $photo){
                array_push($photos, $this->photoSave($photo, 'img/products'));
            }
        }
        $request['photos'] = $photos;
        Product::find($id)->update($request);
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
