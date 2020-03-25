<?php

namespace Tests\FFMpeg\Unit\Filters\Video;

use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\Filters\Video\SynchronizeFilter;

class SynchronizeFilterTest extends TestCase
{
    public function testApply()
    {
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

        $filter = new SynchronizeFilter();
        $this->assertEquals(array('-async', '1', '-metadata:s:v:0', 'start_time=0'), $filter->apply($video, $format));
    }
}
