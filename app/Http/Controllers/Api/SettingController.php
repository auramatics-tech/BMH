<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Setting;

class SettingController extends BaseController
{

    public function get_setting()
    {
        // echo"here";die;
        $setting = Setting::Find(1);
        return $this->sendResponse($setting, __('Success'));
    }
}