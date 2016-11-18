<?php

/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 4/11/16
 * Time: 15:44
 */
namespace App\Transformers\Contracts;


/**
 * Interface Transformer
 * @package App\Transformers\Contracts
 */
interface Transformer {

    /**
     * @param $resource
     * @return mixed
     */
    public function transform($resource);

    /**
     * @param $resources
     * @return mixed
     */
    public function transformCollection($resources);

}