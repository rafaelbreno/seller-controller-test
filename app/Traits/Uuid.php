<?php


namespace App\Traits;


use Illuminate\Support\Str;

trait Uuid
{

    /**
     * Boot method to generated User's uuid
     */
    protected static function bootSetUuidTrait() : void
    {
        static::creating(function ($model) {
            if(! $model->getKey()) {
                $model->{$model->getKeyName()} = (string)Str::uuid();
            }
        });
    }

    /**
     * Defining that the id won't increment
     * @return bool
     */
    public function getIncrementing() : bool
    {
        return false;
    }

    /**
     * Defining the id column type
     * @return string
     */
    public function getKeyType() : string
    {
        return 'string';
    }
}
