<?php

namespace App\Models;

class Words extends PublicModel
{

    protected $fillable = [
        'name',
        'used',
        'created_at',
        'updated_at'
    ];

    protected $rememberCacheTag = 'Words';

    public function getThree()
    {

        $words = Words::where([])->orderBy('used','asc')->orderBy('id','asc')->limit(3)->get()->toArray();

        foreach ($words as $k => $v){

            Words::find($v['id'])->update(['used'=>$v['used'] + 1]);

        }

        return array_column($words,'name');

    }

}
