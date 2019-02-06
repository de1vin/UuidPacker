<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker;

use de1vin\UuidPacker\Codec\Decoder;
use de1vin\UuidPacker\Codec\DecoderInterface;
use de1vin\UuidPacker\Codec\Encoder;
use de1vin\UuidPacker\Codec\EncoderInterface;
use de1vin\UuidPacker\Validator\Validator;
use de1vin\UuidPacker\Validator\ValidatorInterface;

/**
 * Class Settings
 * @package de1vin\UuidPacker
 */
class Settings
{
    /**
     * @var EncoderInterface
     */
    private $encoder;

    /**
     * @var DecoderInterface
     */
    private $decoder;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct()
    {
    }

    /**
     * @return EncoderInterface
     */
    public function getEncoder(): EncoderInterface
    {
        if ($this->encoder === null) {
            $this->encoder = new Encoder();
        }

        return $this->encoder;
    }


    /**
     * @param EncoderInterface $encoder
     * @return Settings
     */
    public function setEncoder(EncoderInterface $encoder): Settings
    {
        $this->encoder = $encoder;
        return $this;
    }

    /**
     * @return DecoderInterface
     */
    public function getDecoder(): DecoderInterface
    {
        if ($this->decoder === null) {
            $this->decoder = new Decoder();
        }

        return $this->decoder;
    }

    /**
     * @param DecoderInterface $decoder
     * @return Settings
     */
    public function setDecoder(DecoderInterface $decoder): Settings
    {
        $this->decoder = $decoder;
        return $this;
    }

    /**
     * @return ValidatorInterface
     */
    public function getValidator(): ValidatorInterface
    {
        if ($this->validator === null) {
            $this->validator = new Validator();
        }

        return $this->validator;
    }

    /**
     * @param ValidatorInterface $validator
     * @return Settings
     */
    public function setValidator(ValidatorInterface $validator): Settings
    {
        $this->validator = $validator;
        return $this;
    }
}
