<?php

namespace Tests\FFMpeg\Unit\Format\Video;

use Tests\FFMpeg\Unit\Format\Audio\AudioTestCase;

abstract class VideoTestCase extends AudioTestCase
{
    public function testGetVideoCodec()
    {
        $this->assertScalar($this->getFormat()->getVideoCodec());
        $this->assertContains($this->getFormat()->getVideoCodec(), $this->getFormat()->getAvailableVideoCodecs());
    }

    public function testSupportBFrames()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertIsBool($this->getFormat()->supportBFrames());
=======
        $this->assertInternalType('boolean', $this->getFormat()->supportBFrames());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->assertInternalType('boolean', $this->getFormat()->supportBFrames());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function testSetVideoCodec()
    {
        $format = $this->getFormat();

        foreach ($format->getAvailableVideoCodecs() as $codec) {
            $format->setVideoCodec($codec);
            $this->assertEquals($codec, $format->getVideoCodec());
        }
    }

    public function testGetKiloBitrate()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertIsInt($this->getFormat()->getKiloBitrate());
=======
        $this->assertInternalType('integer', $this->getFormat()->getKiloBitrate());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->assertInternalType('integer', $this->getFormat()->getKiloBitrate());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function testSetKiloBitrate()
    {
        $format = $this->getFormat();
        $format->setKiloBitrate(2560);
        $this->assertEquals(2560, $format->getKiloBitrate());
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function testSetInvalidVideoCodec()
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testSetInvalidVideoCodec()
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $this->getFormat()->setVideoCodec('invalid-random-video-codec');
    }

    public function testGetAvailableVideoCodecs()
    {
        $this->assertGreaterThan(0, count($this->getFormat()->getAvailableVideoCodecs()));
    }

    public function testCreateProgressListener()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $media = $this->getMockBuilder('FFMpeg\Media\MediaTypeInterface')->getMock();
=======
        $media = $this->getMock('FFMpeg\Media\MediaTypeInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $media = $this->getMock('FFMpeg\Media\MediaTypeInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $media->expects($this->any())
            ->method('getPathfile')
            ->will($this->returnValue(__FILE__));
        $format = $this->getFormat();
        $ffprobe = $this->getFFProbeMock();

        foreach ($format->createProgressListener($media, $ffprobe, 1, 3) as $listener) {
            $this->assertInstanceOf('FFMpeg\Format\ProgressListener\VideoProgressListener', $listener);
            $this->assertSame($ffprobe, $listener->getFFProbe());
            $this->assertSame(__FILE__, $listener->getPathfile());
            $this->assertSame(1, $listener->getCurrentPass());
            $this->assertSame(3, $listener->getTotalPass());
        }
    }

    public function testGetPasses()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertIsInt($this->getFormat()->getPasses());
=======
        $this->assertInternalType('integer', $this->getFormat()->getPasses());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->assertInternalType('integer', $this->getFormat()->getPasses());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $this->assertGreaterThan(0, $this->getFormat()->getPasses());
    }

    public function testGetModulus()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertIsInt($this->getFormat()->getModulus());
=======
        $this->assertInternalType('integer', $this->getFormat()->getModulus());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->assertInternalType('integer', $this->getFormat()->getModulus());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $this->assertGreaterThan(0, $this->getFormat()->getModulus());
        $this->assertEquals(0, $this->getFormat()->getModulus() % 2);
    }
}
