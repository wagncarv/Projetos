<?php

namespace Tests\FFMpeg\Unit\Coordinate;

use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\Coordinate\Dimension;

class DimensionTest extends TestCase
{
    /**
     * @dataProvider provideInvalidDimensions
<<<<<<< HEAD
<<<<<<< HEAD
     */
    public function testInvalidDimensions($width, $height)
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testInvalidDimensions($width, $height)
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        new Dimension($width, $height);
    }

    public function provideInvalidDimensions()
    {
        return array(
            array(320, 0),
            array(320, -10),
            array(0, 240),
            array(-10, 240),
            array(0, 0),
            array(0, -10),
            array(-10, 0),
        );
    }

    public function testGetters()
    {
        $dimension = new Dimension(320, 240);
        $this->assertEquals(320, $dimension->getWidth());
        $this->assertEquals(240, $dimension->getHeight());
    }
}
