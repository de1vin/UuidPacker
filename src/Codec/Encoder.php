<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker\Codec;

/**
 * Class Encoder
 * @package de1vin\UuidPacker\Codec
 */
class Encoder implements EncoderInterface
{
    public function encode(string $uuid): string
    {
        $packedId = str_replace('-', '', $uuid);
        $packedId = hex2bin($packedId);

        if ($packedId === false) {
            throw new \RuntimeException();
        }

        $packedId = base64_encode($packedId);
        $packedId = str_replace(['=', '+', '/'], ['', '-', '_'], $packedId);
        $packedId = str_replace('=', '', $packedId);
        return $packedId;
    }
}
