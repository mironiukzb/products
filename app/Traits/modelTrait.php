<?php
 
namespace App\Traits;
 
trait ModelTrait {
 
    public static function createOrUpdate($input, $id = null) {
        $model = !empty($id) ? static::find($id) : new static;
        $model->fill($input);
        $model->save();
        
        return $model;
    }
 
}