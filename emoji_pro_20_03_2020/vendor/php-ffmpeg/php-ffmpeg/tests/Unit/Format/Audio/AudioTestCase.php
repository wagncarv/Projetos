<?php

namespace Tests\FFMpeg\Unit\Format\Audio;

use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\Format\Audio\DefaultAudio;

abstract class AudioTestCase extends TestCase
{
    public function testExtraParams()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $extraParams = $this->getFormat()->getExtraParams();

        $this->assertIsArray($extraParams);

        foreach ($extraParams as $param) {
=======
        foreach ($this->getFormat()->getExtraParams() as $param) {
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        foreach ($this->getFormat()->getExtraParams() as $param) {
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
            $this->assertScalar($param);
        }
    }

    public function testGetAudioCodec()
    {
        $this->assertScalar($this->getFormat()->getAudioCodec());
        $this->assertContains($this->getFormat()->getAudioCodec(), $this->getFormat()->getAvailableAudioCodecs());
    }

    public function testSetAudioCodec()
    {
        $format = $this->getFormat();

        foreach ($format->getAvailableAudioCodecs() as $codec) {
            $format->setAudioCodec($codec);
            $this->assertEquals($codec, $format->getAudioCodec());
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function testSetInvalidAudioCodec()
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testSetInvalidAudioCodec()
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $this->getFormat()->setAudioCodec('invalid-random-audio-codec');
    }

    public function testGetAvailableAudioCodecs()
    {
        $this->assertGreaterThan(0, count($this->getFormat()->getAvailableAudioCodecs()));
    }

    public function testGetAudioKiloBitrate()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertIsInt($this->getFormat()->getAudioKiloBitrate());
=======
        $this->assertInternalType('integer', $this->getFormat()->getAudioKiloBitrate());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->assertInternalType('integer', $this->getFormat()->getAudioKiloBitrate());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function testSetAudioKiloBitrate()
    {
        $format = $this->getFormat();
        $format->setAudioKiloBitrate(256);
        $this->assertEquals(256, $format->getAudioKiloBitrate());
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function testSetInvalidKiloBitrate()
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
        $this->getFormat()->setAudioKiloBitrate(0);
    }

    public function testSetNegativeKiloBitrate()
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testSetInvalidKiloBitrate()
    {
        $this->getFormat()->setAudioKiloBitrate(0);
    }

    /**
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testSetNegativeKiloBitrate()
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $this->getFormat()->setAudioKiloBitrate(-10);
    }

    public function testGetAudioChannels()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->assertNull($this->getFormat()->getAudioChannels());
=======
        $this->assertInternalType('null', $this->getFormat()->getAudioChannels());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->assertInternalType('null', $this->getFormat()->getAudioChannels());
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function testSetAudioChannels()
    {
        $format = $this->getFormat();
        $format->setAudioChannels(2);
        $this->assertEquals(2, $format->getAudioChannels());
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function testSetInvalidChannels()
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
        $this->getFormat()->setAudioChannels(0);
    }

    public function testSetNegativeChannels()
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testSetInvalidChannels()
    {
        $this->getFormat()->setAudioChannels(0);
    }

    /**
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testSetNegativeChannels()
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $this->getFormat()->setAudioChannels(-10);
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
            $this->assertInstanceOf('FFMpeg\Format\ProgressListener\AudioProgressListener', $listener);
            $this->assertSame($ffprobe, $listener->getFFProbe());
            $this->assertSame(__FILE__, $listener->getPathfile());
            $this->assertSame(1, $listener->getCurrentPass());
            $this->assertSame(3, $listener->getTotalPass());
        }
    }

    /**
     * @return DefaultAudio
     */
    abstract public function getFormat();
}
