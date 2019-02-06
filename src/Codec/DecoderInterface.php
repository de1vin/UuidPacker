<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker\Codec;

/**
 * Interface DecoderInterface
 * @package de1vin\UuidPacker\codec
 */
interface DecoderInterface
{
    /**
     * @param string $packedId
     * @return string
     */
    public function decode(string $packedId): string;
}
