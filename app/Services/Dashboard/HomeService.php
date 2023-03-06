<?php

namespace App\Services\Dashboard;

use App\Models\Home;

class HomeService extends BaseService
{

    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store($request){
        $home = new Home();
        if($request->file('photo')){
            $home['photo'] = $this->photoSave($request->file('photo'), 'img/type');
        }
        $home->name_uz = $request->name_uz;
        $home->name_ru = $request->name_ru;
        $home->name_en = $request->name_en;
        $home->save();
        return redirect()->route('dashboard.Type.index');
    }

    public function update($request, $id)
    {
        $home = Home::find($id);
        if($request->file('photo')){
            if(is_file(public_path($home->photo))){
                unlink(public_path($home->photo));
            }
            $home['photo'] = $this->photoSave($request->file('photo'), 'img/type');
        }
        $home->name_uz = $request->name_uz;
        $home->name_ru = $request->name_ru;
        $home->name_en = $request->name_en;
        $home->save();
        return redirect()->route('dashboard.Type.index');
    }

    public function destroy($id){
        $home = Home::find($id);
        if(is_file(public_path($home->photo))){
            unlink(public_path($home->photo));
        }
        foreach ($home->products as $product){
            $this->productService->destroy($product->id);
        }
        $home->delete();
        return redirect()->back();
    }
}
