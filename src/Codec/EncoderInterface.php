<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker\Codec;

/**
 * Interface EncoderInterface
 * @package de1vin\UuidPacker\codec
 */
interface EncoderInterface
{
    /**
     * @param string $uuid
     * @return string
     */
    public function encode(string $uuid): string ;
}
