<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UseUuidTrait
{
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
