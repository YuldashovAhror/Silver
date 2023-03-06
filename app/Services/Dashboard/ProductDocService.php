<?php

namespace App\Services\Dashboard;

use App\Models\Category;
use App\Models\ProductDoc;

class ProductDocService extends BaseService
{
    public function store($request)
    {
        $file_name = $request->file->getClientOriginalName();
        $request = $request->toArray();
        if (!empty($request['file'])){
            $request['file'] = $this->fileSave($request['file'], 'file/docs');
            $request['doc_name'] = $file_name;
        }
        ProductDoc::create($request);
        return back();
    }

    public function update($request, $id)
    {
        $file_name = $request->file->getClientOriginalName();
        $request = $request->toArray();
        if (!empty($request['file'])){
            $this->fileDelete('\ProductDoc', $id, 'file');
            $request['file'] = $this->fileSave($request['file'], 'file/docs');
            $request['doc_name'] = $file_name;
        }
        ProductDoc::find($id)->update($request);
        return back();
    }

    public function destroy($id)
    {
        $this->fileDelete('\ProductDoc', $id, 'file');
        ProductDoc::find($id)->delete();
        return back();
    }
}
