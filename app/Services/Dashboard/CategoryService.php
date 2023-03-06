<?php

namespace App\Services\Dashboard;

use App\Models\Category;

class CategoryService extends BaseService
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function store($request)
    {
        $request = $request->toArray();
        if (!empty($request['photo1'])){
            $request['photo1'] = $this->photoSave($request['photo1'], 'img/categories');
        }
        if (!empty($request['photo2'])){
            $request['photo2'] = $this->photoSave($request['photo2'], 'img/categories');
        }
        Category::create($request);
        return back();
    }

    public function update($request, $id)
    {
        $request = $request->toArray();
        if (!empty($request['photo1'])){
            $this->fileDelete('\Category', $id, 'photo1');
            $request['photo1'] = $this->photoSave($request['photo1'], 'img/categories');
        }
        if (!empty($request['photo2'])){
            $this->fileDelete('\Category', $id, 'photo2');
            $request['photo2'] = $this->photoSave($request['photo2'], 'img/categories');
        }
        Category::find($id)->update($request);
        return back();
    }

    public function destroy($id)
    {
        $category = Category::with('products')->find($id);
        foreach ($category->products as $product){
            $this->productService->destroy($product->id);
        }
        $this->fileDelete('\Category', $id, 'photo1');
        $this->fileDelete('\Category', $id, 'photo2');
        $category->delete();
        return back();
    }
}
