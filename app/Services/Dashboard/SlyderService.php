<?php

namespace App\Services\Dashboard;

use App\Models\Slyder;

class SlyderService extends BaseService
{
    public function store($request)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $request['photo'] = $this->photoSave($request['photo'], 'img/slyders');
        }
        Slyder::create($request);
        return back();
    }

    public function update($request, $id)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $this->fileDelete('\Slyder', $id, 'photo');
            $request['photo'] = $this->photoSave($request['photo'], 'img/slyders');
        }
        Slyder::find($id)->update($request);
        return back();
    }

    public function destroy($id)
    {
        $this->fileDelete('\Slyder', $id, 'photo');
        Slyder::find($id)->delete();
        return back();
    }
}
