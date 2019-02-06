<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker\Validator;

/**
 * Class Validator
 * @package de1vin\UuidPacker\Validator
 */
class Validator implements ValidatorInterface
{
    public function validate(string $packedId): bool
    {
        return (strlen($packedId) === 22) && preg_match('/^[a-zA-Z0-9]+/', $packedId);
    }
}
