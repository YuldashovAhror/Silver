<?php

namespace App\Services\Dashboard;

use App\Models\Certificate;

class CertificateService extends BaseService
{
    public function store($request)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $request['photo'] = $this->photoSave($request['photo'], 'img/certificate');
        }
        Certificate::create($request);
        return back();
    }

    public function update($request, $id)
    {
        $request = $request->toArray();
        if (!empty($request['photo'])){
            $this->fileDelete('\Certificate', $id, 'photo');
            $request['photo'] = $this->photoSave($request['photo'], 'img/certificate');
        }
        Certificate::find($id)->update($request);
        return back();
    }

    public function destroy($id)
    {
        $this->fileDelete('\Certificate', $id, 'photo');
        Certificate::find($id)->delete();
        return back();
    }
}
