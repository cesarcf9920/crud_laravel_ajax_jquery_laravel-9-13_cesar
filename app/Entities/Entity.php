<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model {

    public static function getClass()
    {
        return get_class(new static);
    }
    
    public static function getEntity()
    {
        return (new static()); 
    }
    
    public static function getEntityName()
    {
        return class_basename((new static())->getClass()); 
    }    
}