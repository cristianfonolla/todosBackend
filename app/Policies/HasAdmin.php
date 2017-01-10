<?php
namespace App\Policies;
/**
 * Class HasAdmin.
 *
 * @package App\Policies
 */
trait HasAdmin
{
    public function before($user, $ability)
    {
//        dd($user->hasRole('admin'));
        if ($user->hasRole('admin')) return true;

    }
}