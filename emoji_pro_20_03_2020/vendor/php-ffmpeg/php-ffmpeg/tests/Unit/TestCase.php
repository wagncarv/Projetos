<?php

namespace Tests\FFMpeg\Unit;

<<<<<<< HEAD
<<<<<<< HEAD
use Tests\FFMpeg\BaseTestCase;

class TestCase extends BaseTestCase
{
    public function getLoggerMock()
    {
        return $this->getMockBuilder('Psr\Log\LoggerInterface')->getMock();
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function assertScalar($value)
    {
        $this->assertTrue(is_scalar($value));
    }

    public function getLoggerMock()
    {
        return $this->getMock('Psr\Log\LoggerInterface');
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function getCacheMock()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getMockBuilder('Doctrine\Common\Cache\Cache')->getMock();
=======
        return $this->getMock('Doctrine\Common\Cache\Cache');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        return $this->getMock('Doctrine\Common\Cache\Cache');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function getTimeCodeMock()
    {
        return $this->getMockBuilder('FFMpeg\Coordinate\TimeCode')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getDimensionMock()
    {
        return $this->getMockBuilder('FFMpeg\Coordinate\Dimension')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getFramerateMock()
    {
        return $this->getMockBuilder('FFMpeg\Coordinate\Framerate')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getFrameMock()
    {
        return $this->getMockBuilder('FFMpeg\Media\Frame')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getWaveformMock()
    {
        return $this->getMockBuilder('FFMpeg\Media\Waveform')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getFFMpegDriverMock()
    {
        return $this->getMockBuilder('FFMpeg\Driver\FFMpegDriver')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getFFProbeDriverMock()
    {
        return $this->getMockBuilder('FFMpeg\Driver\FFProbeDriver')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getFFProbeMock()
    {
        return $this->getMockBuilder('FFMpeg\FFProbe')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getStreamMock()
    {
        return $this->getMockBuilder('FFMpeg\FFProbe\DataMapping\Stream')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getFFProbeParserMock()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getMockBuilder('FFMpeg\FFProbe\OutputParserInterface')->getMock();
=======
        return $this->getMock('FFMpeg\FFProbe\OutputParserInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        return $this->getMock('FFMpeg\FFProbe\OutputParserInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function getFFProbeOptionsTesterMock()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getMockBuilder('FFMpeg\FFProbe\OptionsTesterInterface')->getMock();
=======
        return $this->getMock('FFMpeg\FFProbe\OptionsTesterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        return $this->getMock('FFMpeg\FFProbe\OptionsTesterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function getFFProbeMapperMock()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getMockBuilder('FFMpeg\FFProbe\MapperInterface')->getMock();
=======
        return $this->getMock('FFMpeg\FFProbe\MapperInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        return $this->getMock('FFMpeg\FFProbe\MapperInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function getFFProbeOptionsTesterMockWithOptions(array $options)
    {
        $tester = $this->getFFProbeOptionsTesterMock();

        $tester->expects($this->any())
            ->method('has')
            ->will($this->returnCallback(function ($option) use ($options) {
                return in_array($option, $options);
            }));

        return $tester;
    }

    public function getConfigurationMock()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->getMockBuilder('Alchemy\BinaryDriver\ConfigurationInterface')->getMock();
=======
        return $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        return $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    public function getFormatMock()
    {
        return $this->getMockBuilder('FFMpeg\FFProbe\DataMapping\Format')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getStreamCollectionMock()
    {
        return $this->getMockBuilder('FFMpeg\FFProbe\DataMapping\StreamCollection')
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function getAudioMock()
    {
        return $this->getMockBuilder('FFMpeg\Media\Audio')
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function getVideoMock($filename = null)
    {
        $video = $this->getMockBuilder('FFMpeg\Media\Video')
            ->disableOriginalConstructor()
            ->getMock();

        $video->expects($this->any())
            ->method('getPathfile')
            ->will($this->returnValue($filename));

        return $video;
    }

    public function getConcatMock()
    {
        return $this->getMockBuilder('FFMpeg\Media\Concat')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function getFormatInterfaceMock()
    {
        $FormatInterface = $this->getMockBuilder('FFMpeg\Format\FormatInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $FormatInterface->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array()));

        return $FormatInterface;
    }
}
