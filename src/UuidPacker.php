<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker;

use de1vin\UuidPacker\Codec\DecoderInterface;
use de1vin\UuidPacker\Codec\EncoderInterface;
use de1vin\UuidPacker\Exception\InvalidValueException;
use de1vin\UuidPacker\Validator\ValidatorInterface;

/**
 * Class UuidPacker
 * @package de1vin\UuidPacker
 */
class UuidPacker
{
    /**
     * @var EncoderInterface
     */
    protected $encoder;

    /**
     * @var DecoderInterface
     */
    protected $decoder;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * UuidPacker constructor.
     * @param Settings|null $settings
     */
    public function __construct(?Settings $settings = null)
    {
        $settings =  $settings ?: new Settings();

        $this->encoder = $settings->getEncoder();
        $this->decoder = $settings->getDecoder();
        $this->validator = $settings->getValidator();
    }

    /**
     * @param string $uuid
     * @return string
     */
    public function pack(string $uuid): string
    {
        return $this->encoder->encode($uuid);
    }

    /**
     * @param string $packedId
     * @return string
     */
    public function unpack(string $packedId): string
    {
        if ($this->validate($packedId)) {
            return $this->decoder->decode($packedId);
        }

        throw new InvalidValueException();
    }


    /**
     * @param string $packedId
     * @return bool
     */
    public function validate(string $packedId): bool
    {
        return $this->validator->validate($packedId);
    }
}
