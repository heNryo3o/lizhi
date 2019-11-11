<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Helpers\PublicFunction;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponse, PublicFunction;

    public function fakeContent($text)
    {

        if($text){

            $en = $this->translate($text, 'zh-CHS', 'en');

            if ($en) {

                $ch = $this->translate($en, 'en', 'zh-cn');

                return $ch;

            } else {

                return false;

            }

        }else{

            return false;

        }

    }

    //有道翻译
    public function translate($query, $from, $to)
    {

        $tr = new GoogleTranslate($to);

        $tr->setUrl('http://translate.google.cn/translate_a/single');

        $query = $query ? $query : '';

        if(empty($query)){
            return '';
        }else{
            return $tr->translate($query);
        }

    }

}
