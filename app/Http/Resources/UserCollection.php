<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
