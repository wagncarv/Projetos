<?php

namespace Tests\FFMpeg\Unit\Filters\Video;

use FFMpeg\Filters\Video\FrameRateFilter;
use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\Coordinate\FrameRate;

class FrameRateFilterTest extends TestCase
{
    public function testApplyWithAFormatThatSupportsBFrames()
    {
        $framerate = new FrameRate(54);
        $gop = 42;

        $video = $this->getVideoMock();
<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\VideoInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $format->expects($this->any())
            ->method('supportBFrames')
            ->will($this->returnValue(true));

        $expected = array('-r', 54, '-b_strategy', '1', '-bf', '3', '-g', 42);

        $filter = new FrameRateFilter($framerate, $gop);
        $this->assertEquals($expected, $filter->apply($video, $format));
    }

    public function testApplyWithAFormatThatDoesNotSupportsBFrames()
    {
        $framerate = new FrameRate(54);
        $gop = 42;

        $video = $this->getVideoMock();
<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\VideoInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $format->expects($this->any())
            ->method('supportBFrames')
            ->will($this->returnValue(false));

        $expected = array('-r', 54);

        $filter = new FrameRateFilter($framerate, $gop);
        $this->assertEquals($expected, $filter->apply($video, $format));
    }
}
