<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019 Zinchenko Vladimir <de1vin@ya.ru>
 */

namespace de1vin\UuidPacker\Test;

use de1vin\UuidPacker\Exception\InvalidValueException;
use de1vin\UuidPacker\UuidPacker;
use PHPUnit\Framework\TestCase;

/**
 * Class UuidPackerTest.
 */
class UuidPackerTest extends TestCase
{
    protected $srcUuid = 'abed9068-5570-4c3e-a074-0a84d999fb2c';
    protected $srcPacked = 'q-2QaFVwTD6gdAqE2Zn7LA';
    protected $invalidPackedSigns = '#-@QaFVwTD6gdAqE2Zn7LA';
    protected $invalidPackedLength = 'QaFVwTD6gdAqE2Zn7LA';

    /**
     * @var UuidPacker
     */
    protected $packer;

    public function setUp(): void
    {
        $this->packer = new UuidPacker();
        parent::setUp();
    }

    public function testPack()
    {
        $packed = $this->packer->pack($this->srcUuid);
        $this->assertEquals($packed, $this->srcPacked);
    }

    public function testUnpack()
    {
        $uuid = $this->packer->unpack($this->srcPacked);
        $this->assertEquals($uuid, $this->srcUuid);
    }

    public function testInvalidSignsUnpack()
    {
        $this->expectException(InvalidValueException::class);
        $this->packer->unpack($this->invalidPackedSigns);
    }

    public function testInvalidLengthUnpack()
    {
        $this->expectException(InvalidValueException::class);
        $this->packer->unpack($this->invalidPackedLength);
    }

    public function testValidator()
    {
        $this->assertTrue($this->packer->validate($this->srcPacked));
        $this->assertFalse($this->packer->validate($this->invalidPackedLength));
        $this->assertFalse($this->packer->validate($this->invalidPackedSigns));
    }
}
