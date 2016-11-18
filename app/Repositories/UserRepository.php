<?php
namespace App\Repositories;
use \App\Repositories\Contracts\Repository;
use App\User;

/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 11/11/16
 * Time: 16:18
 */
class UserRepository implements Repository
{

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')){


        return User::findOrFail($id);


    }

}