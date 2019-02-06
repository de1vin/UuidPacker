<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker\Codec;

/**
 * Class Decoder
 * @package de1vin\UuidPacker\Codec
 */
class Decoder implements DecoderInterface
{
    public function decode(string $packedId): string
    {
        $uuid = str_replace(['-', '_'], ['+', '/'], $packedId);
        $uuid = (string)base64_decode($uuid);
        $uuid = (string)bin2hex($uuid);
//        $uuid = substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4)  . '-' . substr($uuid, 20);
        $uuid = (string)preg_replace('/(\w{8})(\w{4})(\w{4})(\w{4})(\w{12})/i', '$1-$2-$3-$4-$5', $uuid);

        return $uuid;
    }
}
