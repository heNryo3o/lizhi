<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Watson\Rememberable\Rememberable;

class PublicModel extends Model
{

    use Filterable, Rememberable;

    protected $guarded = [];

    protected $hidden = ['pivot'];

    public function fakeContent($text)
    {

        return $text;

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
