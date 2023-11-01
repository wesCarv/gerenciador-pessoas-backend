<?php

namespace App\Exceptions;

use App\Models\Taxes;
use Exception;

class CreateTaxesService extends Exception
{
    public function execute(array $data)
    {
        $taxesFound = Taxes::firstWhere('user_id', $data['user_id']);
        if (is_null($taxesFound)) {
            return throw new AppError('User not exists',404);
        }

        return Taxes::create($data);
    }
}
