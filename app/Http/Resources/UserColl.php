<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\Resource;
class UserColl extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,            
            'updated_at' => $this->updated_at,
            'name_coll' => $this->name
        ];
    }
}