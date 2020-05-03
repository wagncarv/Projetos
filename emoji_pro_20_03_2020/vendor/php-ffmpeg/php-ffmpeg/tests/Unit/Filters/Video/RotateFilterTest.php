<?php

namespace Tests\FFMpeg\Unit\Filters\Video;

use FFMpeg\FFProbe\DataMapping\Stream;
use FFMpeg\FFProbe\DataMapping\StreamCollection;
use FFMpeg\Filters\Video\RotateFilter;
use Tests\FFMpeg\Unit\TestCase;

class RotateFilterTest extends TestCase
{
    /**
     * @dataProvider provide90degresTranspositions
     */
    public function testApplyWithSizeTransformation($value)
    {
        $stream = new Stream(array('width' => 320, 'height' => 240, 'codec_type' => 'video'));
        $streams = new StreamCollection(array($stream));

        $video = $this->getVideoMock();
        $video->expects($this->once())
            ->method('getStreams')
            ->will($this->returnValue($streams));

<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\VideoInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $filter = new RotateFilter($value);
        $this->assertEquals(array('-vf', $value, '-metadata:s:v:0', 'rotate=0'), $filter->apply($video, $format));

        $this->assertEquals(240, $stream->get('width'));
        $this->assertEquals(320, $stream->get('height'));
    }

    public function provide90degresTranspositions()
    {
        return array(
            array(RotateFilter::ROTATE_90),
            array(RotateFilter::ROTATE_270),
        );
    }

    /**
     * @dataProvider provideDegresWithoutTranspositions
     */
    public function testApplyWithoutSizeTransformation($value)
    {
        $video = $this->getVideoMock();
        $video->expects($this->never())
            ->method('getStreams');

<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\VideoInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\VideoInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $filter = new RotateFilter($value);
        $this->assertEquals(array('-vf', $value, '-metadata:s:v:0', 'rotate=0'), $filter->apply($video, $format));
    }

    public function provideDegresWithoutTranspositions()
    {
        return array(
            array(RotateFilter::ROTATE_180),
        );
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function testApplyInvalidAngle()
    {
        $this->expectException(
            '\FFMpeg\Exception\InvalidArgumentException',
            'Invalid angle value.'
        );
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException \FFMpeg\Exception\InvalidArgumentException
     * @expectedExceptionMessage Invalid angle value.
     */
    public function testApplyInvalidAngle()
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        new RotateFilter('90');
    }
}
