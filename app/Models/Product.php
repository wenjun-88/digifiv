<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
        'stock',
    ];

    // protected $appends = ['total_stock'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: (string)Str::orderedUuid();
        });
    }

    // public function stocks()
    // {
    //     return $this->hasMany(Stock::class, 'product_id', 'id');
    // }

    // public function getTotalStockAttribute(){
    //     $stock = $this->stocks()->where('type', 'in')->count() - $this->stocks()->where('type', 'out')->count();
    //     return $stock;
    // }
}
