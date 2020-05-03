<?php

namespace Tests\FFMpeg\Unit\Coordinate;

use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\Coordinate\FrameRate;

class FrameRateTest extends TestCase
{
    public function testGetter()
    {
        $fr = new FrameRate(23.997);
        $this->assertEquals(23.997, $fr->getValue());
    }

    /**
     * @dataProvider provideInvalidFrameRates
<<<<<<< HEAD
<<<<<<< HEAD
     */
    public function testInvalidFrameRate($value)
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testInvalidFrameRate($value)
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        new FrameRate($value);
    }

    public function provideInvalidFrameRates()
    {
        return array(
            array(0), array(-1.5), array(-2),
        );
    }
}
