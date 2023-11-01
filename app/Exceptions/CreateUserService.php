<?php

namespace App\Exceptions;

use App\Models\User;
use Exception;


class CreateUserService extends Exception
{
    public function execute(array $data)
    {
        $userFound = User::firstWhere('email', $data['email']);

        if (!is_null($userFound)) {
            return throw new AppError('Email already exists',400);
        }

        $userFound = User::firstWhere('cellphone', $data['cellphone']);

        if (!is_null($userFound)) {
            throw new AppError('Cellphone already exists',400);
        }

        return User::create($data);
    }
}