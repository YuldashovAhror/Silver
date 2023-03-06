<?php

namespace App\Services\Dashboard;

use App\Models\Partner;

class PartnerService extends BaseService
{
    public function store($request)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $request['photo'] = $this->photoSave($request['photo'], 'img/partners');
        }
        Partner::create($request);
        return back();
    }

    public function update($request, $id)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $this->fileDelete('\Partner', $id, 'photo');
            $request['photo'] = $this->photoSave($request['photo'], 'img/partners');
        }
        Partner::find($id)->update($request);
        return back();
    }

    public function destroy($id)
    {
        $this->fileDelete('\Partner', $id, 'photo');
        Partner::find($id)->delete();
        return back();
    }
}
