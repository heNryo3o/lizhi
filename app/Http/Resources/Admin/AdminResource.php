<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'username' => $this->username,
            'true_name' => $this->true_name,
            'roles_id' => 1,
            'roles' => ['super_admin'],
            'roles_name' => '超级管理员',
            'created_at' => $this->created_at->toDateTimeString(),
            'status' => $this->status,
            'avatar' => $this->avatar ? $this->avatar : 'https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif?imageView2/1/w/80/h/80'
        ];

    }

}
