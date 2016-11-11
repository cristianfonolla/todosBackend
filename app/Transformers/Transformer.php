<?php

namespace App\Transformers;

use App\Transformers\Contracts\Transformer as TransformerContract;

abstract class Transformer implements TransformerContract
{

    protected function transformCollection($resources) {
        //Collections: Laravel collections
        return array_map(function($resource) {
            return $this->transform($resource);
        }, $resources);
    }








}