<?php

namespace Tests\FFMpeg\Unit\Filters\Audio;

use FFMpeg\Filters\Audio\AudioFilters;
use FFMpeg\Coordinate\TimeCode;
use Tests\FFMpeg\Unit\TestCase;

class AudioClipTest extends TestCase {

    public function testClipping() {
        $capturedFilter = null;

        $audio = $this->getAudioMock();
        $audio->expects($this->once())
            ->method('addFilter')
            ->with($this->isInstanceOf('FFMpeg\Filters\Audio\AudioClipFilter'))
            ->will($this->returnCallback(function ($filter) use (&$capturedFilter) {
                $capturedFilter = $filter;
        }));
<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $filters = new AudioFilters($audio);

        $filters->clip(TimeCode::fromSeconds(5));
        $this->assertEquals(array(0 => '-ss', 1 => '00:00:05.00', 2 => '-acodec', 3 => 'copy'), $capturedFilter->apply($audio, $format));
    }

    public function testClippingWithDuration() {
        $capturedFilter = null;

        $audio = $this->getAudioMock();
        $audio->expects($this->once())
            ->method('addFilter')
            ->with($this->isInstanceOf('FFMpeg\Filters\Audio\AudioClipFilter'))
            ->will($this->returnCallback(function ($filter) use (&$capturedFilter) {
                $capturedFilter = $filter;
        }));
<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $filters = new AudioFilters($audio);

        $filters->clip(TimeCode::fromSeconds(5), TimeCode::fromSeconds(5));
        $this->assertEquals(array(0 => '-ss', 1 => '00:00:05.00', 2 => '-t', 3 => '00:00:05.00', 4 => '-acodec', 5 => 'copy'), $capturedFilter->apply($audio, $format));
    }

<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
}
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
