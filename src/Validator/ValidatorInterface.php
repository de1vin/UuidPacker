<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker\Validator;

/**
 * Interface ValidatorInterface
 * @package de1vin\UuidPacker\validator
 */
interface ValidatorInterface
{
    /**
     * @param string $packedId
     * @return bool
     */
    public function validate(string $packedId): bool;
}
