<?php
namespace EternalVoid\Traits;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Ramsey\Uuid\Uuid;

trait Uuids
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4();
        });

        Pivot::creating(function($pivot) {
            $pivot->uuid = Uuid::uuid4();
        });
    }
}