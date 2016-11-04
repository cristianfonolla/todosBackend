<?php
use App\Exceptions\IncorrectModelException;

/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 4/11/16
 * Time: 15:58
 */
namespace App\Transformers;


use App\Exceptions\IncorrectModelException;
use App\Transformers\Contracts\Transformer;

class TaskTransformer implements Transformer
{


    public function transform($resource)
    {

        if(! $resource instanceof \App\Task){

            throw new IncorrectModelException();

        }

        return [
            'name'     => $resource['name'],
            'done'     => (boolean) $resource['done'],
            'priority' => (integer) $resource['priority'],
        ];
    }

}