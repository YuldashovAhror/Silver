<?php

namespace App\Services\Dashboard;

use App\Models\News;

class NewsService extends BaseService
{
    public function store($request)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $request['photo'] = $this->photoSave($request['photo'], 'img/news');
        }
        if (!empty($request['photo_main'])){
            $request['photo_main'] = $this->photoSave($request['photo_main'], 'img/news');
        }
        News::create($request);
        return back();
    }

    public function update($request, $id)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $this->fileDelete('\News', $id, 'photo');
            $request['photo'] = $this->photoSave($request['photo'], 'img/news');
        }
        if (!empty($request['photo_main'])){
            $this->fileDelete('\News', $id, 'photo_main');
            $request['photo_main'] = $this->photoSave($request['photo_main'], 'img/news');
        }
        News::find($id)->update($request);
        return back();
    }

    public function destroy($id)
    {
        $this->fileDelete('\News', $id, 'photo');
        $this->fileDelete('\News', $id, 'photo_main');
        News::find($id)->delete();
        return back();
    }
}
