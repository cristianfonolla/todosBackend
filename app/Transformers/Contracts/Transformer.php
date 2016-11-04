<?php

/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 4/11/16
 * Time: 15:44
 */
namespace App\Transformers\Contracts;


interface Transformer {

    public function transform($resource);

}