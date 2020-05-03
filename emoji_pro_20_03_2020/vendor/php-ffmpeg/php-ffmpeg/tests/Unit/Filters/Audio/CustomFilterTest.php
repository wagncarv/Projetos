<?php

namespace Tests\FFMpeg\Unit\Filters\Audio;

use FFMpeg\Filters\Audio\CustomFilter;
use FFMpeg\Filters\Audio\FrameRateFilter;
use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\Coordinate\FrameRate;

class CustomFilterTest extends TestCase
{
    public function testApplyCustomFilter()
    {
        $audio = $this->getAudioMock();
<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $filter = new CustomFilter('whatever i put would end up as a filter');
        $this->assertEquals(array('-af', 'whatever i put would end up as a filter'), $filter->apply($audio, $format));
    }
}
