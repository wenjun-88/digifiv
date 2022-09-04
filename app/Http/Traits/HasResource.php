<?php

namespace App\Http\Traits;

use App\Models\Resource;
use Illuminate\Support\Str;

trait HasResource
{
    public function ownResources()
    {
        return $this->morphOne(Resource::class, 'owner');
    }

    public function createResources(array $data = [], $type = '')
    {
        $data = array_merge($data, [
            'type' => $type,
        ]);

        if($this->ownResources()->exists()){
            $this->ownResources()->first()->delete();
        }

        return $this->ownResources()->create($data);
    }
}
