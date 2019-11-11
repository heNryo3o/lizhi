<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepositSetting;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{

    public function info()
    {

        $setting = Setting::find(1);

        return $this->success($setting);

    }

    public function saveBanner(Request $request)
    {

        $setting = Setting::find(1)->update($request->all());

        DepositSetting::where([])->delete();

        foreach (Setting::find(1)->deposits as $k => $v){

            DepositSetting::create(
                [
                    'deposit_money' => $v['deposit_money'],
                    'give_money' => $v['give_money']
                ]
            );

        }

        return $this->success();

    }

    public function upload(Request $request)
    {

        $save = 'public/'.date('Y/m/d', time());

        $path = $request->file('file')->store($save);

        $url = Storage::url($path);

        $full_url = config('filesystems.default') == 'oss' ? config('filesystems.oss_url').$path : asset($url);

        $result = array(
            'preview_url' => $full_url,
            'file_url' => $path,
            'file_id' => 1
        );

        return $this->success($result);

    }

}
