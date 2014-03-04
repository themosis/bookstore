<?php

namespace Themosis\Core;

use ReflectionClass;
use Themosis\PostType\PostType;

class ModelLoader extends Loader implements LoaderInterface
{
    /**
     * Check if the class is extending BaseModel class before doing
     * any actions with it. Force the developer to always extends its model
     * class. Should avoid php conflicts with class names and alias.
     *
     * @param string $class_name
     * @return bool|\ReflectionClass
     */
    private static function isModel($class_name)
    {
        $reflector = new ReflectionClass($class_name);

        if($reflector->isSubclassOf('Themosis\\Model\\BaseModel')){

            return $reflector;

        }

        return false;
    }

    /**
     * Build the paths to load the models for the application.
     */
    public static function add()
    {
        $path = themosis_path('datas').'models'.DS;
        static::append($path);
    }


    /**
     * Handle the model class aliases.
     * Developer can define an alias per class in order
     * to avoid conflicts at runtime.
     *
     * @return void
     */
    public static function alias()
    {
        foreach(static::$names as $name){

            $className = ucfirst($name);
            $fullClassName = $className.'_Model';

            if(class_exists($fullClassName)){

                if($reflector = static::isModel($fullClassName)){

                    /*---------------------------------------------------------*/
                    // Check if there is an alias defined.
                    /*---------------------------------------------------------*/
                    $properties = $reflector->getDefaultProperties();

                    if(isset($properties['alias']) && !empty($properties['alias'])){

                        if($fullClassName !== $properties['alias']){

                            class_alias($fullClassName, $properties['alias']);

                        }

                    } else {

                        /*---------------------------------------------------------*/
                        // Use the $className from filename by default if no $alias
                        // is defined.
                        /*---------------------------------------------------------*/
                        class_alias($fullClassName, $className);

                    }
                }
            }
        }
    }

} 