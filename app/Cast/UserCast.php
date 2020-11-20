<?php

namespace App\Cast;

use Illuminate\Support\Str;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserCast implements CastsAttributes
{
    /**
     * Transform the attribute from the underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {

        if (! Str::of($value)->contains('+') ) {
           return $value;
        } else {
            return "+254" . intval($value) ;
        }

    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
    }
}
