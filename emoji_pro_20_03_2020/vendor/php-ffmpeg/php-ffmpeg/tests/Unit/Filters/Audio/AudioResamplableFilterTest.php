<?php

namespace Tests\FFMpeg\Unit\Filters\Audio;

use FFMpeg\Filters\Audio\AudioResamplableFilter;
use Tests\FFMpeg\Unit\TestCase;

class AudioResamplableFilterTest extends TestCase
{
    public function testGetRate()
    {
        $filter = new AudioResamplableFilter(500);
        $this->assertEquals(500, $filter->getRate());
    }

    public function testApply()
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

        $filter = new AudioResamplableFilter(500);
        $this->assertEquals(array('-ac', 2, '-ar', 500), $filter->apply($audio, $format));
    }
}
