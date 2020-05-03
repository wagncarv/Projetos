<?php

namespace Tests\FFMpeg\Unit\Media;

<<<<<<< HEAD
<<<<<<< HEAD
use FFMpeg\Exception\RuntimeException;
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
use FFMpeg\Media\Audio;
use Alchemy\BinaryDriver\Exception\ExecutionFailureException;
use FFMpeg\Format\AudioInterface;

class AudioTest extends AbstractStreamableTestCase
{
    public function testFiltersReturnsAudioFilters()
    {
        $driver = $this->getFFMpegDriverMock();
        $ffprobe = $this->getFFProbeMock();

        $audio = new Audio(__FILE__, $driver, $ffprobe);
        $this->assertInstanceOf('FFMpeg\Filters\Audio\AudioFilters', $audio->filters());
    }

    public function testAddFiltersAddsAFilter()
    {
        $driver = $this->getFFMpegDriverMock();
        $ffprobe = $this->getFFProbeMock();

        $filters = $this->getMockBuilder('FFMpeg\Filters\FiltersCollection')
            ->disableOriginalConstructor()
            ->getMock();

        $audio = new Audio(__FILE__, $driver, $ffprobe);
        $audio->setFiltersCollection($filters);

<<<<<<< HEAD
<<<<<<< HEAD
        $filter = $this->getMockBuilder('FFMpeg\Filters\Audio\AudioFilterInterface')->getMock();
=======
        $filter = $this->getMock('FFMpeg\Filters\Audio\AudioFilterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $filter = $this->getMock('FFMpeg\Filters\Audio\AudioFilterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $filters->expects($this->once())
            ->method('add')
            ->with($filter);

        $audio->addFilter($filter);
    }

    public function testAddAVideoFilterThrowsException()
    {
        $driver = $this->getFFMpegDriverMock();
        $ffprobe = $this->getFFProbeMock();

        $filters = $this->getMockBuilder('FFMpeg\Filters\FiltersCollection')
            ->disableOriginalConstructor()
            ->getMock();

        $audio = new Audio(__FILE__, $driver, $ffprobe);
        $audio->setFiltersCollection($filters);

<<<<<<< HEAD
<<<<<<< HEAD
        $filter = $this->getMockBuilder('FFMpeg\Filters\Video\VideoFilterInterface')->getMock();
=======
        $filter = $this->getMock('FFMpeg\Filters\Video\VideoFilterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $filter = $this->getMock('FFMpeg\Filters\Video\VideoFilterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $filters->expects($this->never())
            ->method('add');

<<<<<<< HEAD
<<<<<<< HEAD
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
        $this->setExpectedException('FFMpeg\Exception\InvalidArgumentException');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->setExpectedException('FFMpeg\Exception\InvalidArgumentException');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $audio->addFilter($filter);
    }

    public function testSaveWithFailure()
    {
        $driver = $this->getFFMpegDriverMock();
        $ffprobe = $this->getFFProbeMock();
        $outputPathfile = '/target/file';

<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $format->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array()));

<<<<<<< HEAD
<<<<<<< HEAD
        $configuration = $this->getMockBuilder('Alchemy\BinaryDriver\ConfigurationInterface')->getMock();
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $driver->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValue($configuration));

<<<<<<< HEAD
<<<<<<< HEAD
        $failure = new RuntimeException('failed to encode');
=======
        $failure = new ExecutionFailureException('failed to encode');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $failure = new ExecutionFailureException('failed to encode');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $driver->expects($this->once())
            ->method('command')
            ->will($this->throwException($failure));

        $audio = new Audio(__FILE__, $driver, $ffprobe);
<<<<<<< HEAD
<<<<<<< HEAD
        $this->expectException('\FFMpeg\Exception\RuntimeException');
=======
        $this->setExpectedException('FFMpeg\Exception\RuntimeException');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->setExpectedException('FFMpeg\Exception\RuntimeException');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $audio->save($format, $outputPathfile);
    }

    public function testSaveAppliesFilters()
    {
        $driver = $this->getFFMpegDriverMock();
        $ffprobe = $this->getFFProbeMock();
        $outputPathfile = '/target/file';
<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $format->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array()));

<<<<<<< HEAD
<<<<<<< HEAD
        $configuration = $this->getMockBuilder('Alchemy\BinaryDriver\ConfigurationInterface')->getMock();
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $driver->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValue($configuration));

        $audio = new Audio(__FILE__, $driver, $ffprobe);

<<<<<<< HEAD
<<<<<<< HEAD
        $filter = $this->getMockBuilder('FFMpeg\Filters\Audio\AudioFilterInterface')->getMock();
=======
        $filter = $this->getMock('FFMpeg\Filters\Audio\AudioFilterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $filter = $this->getMock('FFMpeg\Filters\Audio\AudioFilterInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $filter->expects($this->once())
            ->method('apply')
            ->with($audio, $format)
            ->will($this->returnValue(array('extra-filter-command')));

        $capturedCommands = array();

        $driver->expects($this->once())
            ->method('command')
            ->with($this->isType('array'), false, $this->anything())
            ->will($this->returnCallback(function ($commands, $errors, $listeners) use (&$capturedCommands) {
                $capturedCommands[] = $commands;
            }));

        $audio->addFilter($filter);
        $audio->save($format, $outputPathfile);

        foreach ($capturedCommands as $commands) {
            $this->assertEquals('-y', $commands[0]);
            $this->assertEquals('-i', $commands[1]);
            $this->assertEquals(__FILE__, $commands[2]);
            $this->assertEquals('extra-filter-command', $commands[3]);
        }
    }

    /**
     * @dataProvider provideSaveData
     */
    public function testSaveShouldSave($threads, $expectedCommands, $expectedListeners, $format)
    {
        $driver = $this->getFFMpegDriverMock();
        $ffprobe = $this->getFFProbeMock();

<<<<<<< HEAD
<<<<<<< HEAD
        $configuration = $this->getMockBuilder('Alchemy\BinaryDriver\ConfigurationInterface')->getMock();
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $driver->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValue($configuration));

        $configuration->expects($this->once())
            ->method('has')
            ->with($this->equalTo('ffmpeg.threads'))
            ->will($this->returnValue($threads));

        if ($threads) {
            $configuration->expects($this->once())
                ->method('get')
                ->with($this->equalTo('ffmpeg.threads'))
                ->will($this->returnValue(24));
        } else {
            $configuration->expects($this->never())
                ->method('get');
        }

        $capturedCommand = $capturedListeners = null;

        $driver->expects($this->once())
            ->method('command')
            ->with($this->isType('array'), false, $this->anything())
            ->will($this->returnCallback(function ($commands, $errors, $listeners) use (&$capturedCommand, &$capturedListeners) {
                $capturedCommand = $commands;
                $capturedListeners = $listeners;
            }));

        $outputPathfile = '/target/file';

        $audio = new Audio(__FILE__, $driver, $ffprobe);
        $audio->save($format, $outputPathfile);

        $this->assertEquals($expectedCommands, $capturedCommand);
        $this->assertEquals($expectedListeners, $capturedListeners);
    }

    public function provideSaveData()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $format->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array()));
        $format->expects($this->any())
            ->method('getAudioKiloBitrate')
            ->will($this->returnValue(663));
        $format->expects($this->any())
            ->method('getAudioChannels')
            ->will($this->returnValue(5));

<<<<<<< HEAD
<<<<<<< HEAD
        $audioFormat = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $audioFormat = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $audioFormat = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $audioFormat->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array()));
        $audioFormat->expects($this->any())
            ->method('getAudioKiloBitrate')
            ->will($this->returnValue(664));
        $audioFormat->expects($this->any())
            ->method('getAudioChannels')
            ->will($this->returnValue(5));
        $audioFormat->expects($this->any())
            ->method('getAudioCodec')
            ->will($this->returnValue('patati-patata-audio'));

<<<<<<< HEAD
<<<<<<< HEAD
        $formatExtra = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $formatExtra = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $formatExtra = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $formatExtra->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array('extra', 'param')));
        $formatExtra->expects($this->any())
            ->method('getAudioKiloBitrate')
            ->will($this->returnValue(665));
        $formatExtra->expects($this->any())
            ->method('getAudioChannels')
            ->will($this->returnValue(5));

<<<<<<< HEAD
<<<<<<< HEAD
        $listeners = array($this->getMockBuilder('Alchemy\BinaryDriver\Listeners\ListenerInterface')->getMock());
=======
        $listeners = array($this->getMock('Alchemy\BinaryDriver\Listeners\ListenerInterface'));
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $listeners = array($this->getMock('Alchemy\BinaryDriver\Listeners\ListenerInterface'));
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $progressableFormat = $this->getMockBuilder('Tests\FFMpeg\Unit\Media\AudioProg')
            ->disableOriginalConstructor()->getMock();
        $progressableFormat->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array()));
        $progressableFormat->expects($this->any())
            ->method('createProgressListener')
            ->will($this->returnValue($listeners));
        $progressableFormat->expects($this->any())
            ->method('getAudioKiloBitrate')
            ->will($this->returnValue(666));
        $progressableFormat->expects($this->any())
            ->method('getAudioChannels')
            ->will($this->returnValue(5));

        return array(
            array(false, array(
                    '-y', '-i', __FILE__,
                    '-b:a', '663k',
                    '-ac', '5',
                    '/target/file',
                ), null, $format),
            array(false, array(
                    '-y', '-i', __FILE__,
                    '-acodec', 'patati-patata-audio',
                    '-b:a', '664k',
                    '-ac', '5',
                    '/target/file',
                ), null, $audioFormat),
            array(false, array(
                    '-y', '-i', __FILE__,
                    'extra', 'param',
                    '-b:a', '665k',
                    '-ac', '5',
                    '/target/file',
                ), null, $formatExtra),
            array(true, array(
                    '-y', '-i', __FILE__,
                    '-threads', 24,
                    '-b:a', '663k',
                    '-ac', '5',
                    '/target/file',
                ), null, $format),
            array(true, array(
                    '-y', '-i', __FILE__,
                    'extra', 'param',
                    '-threads', 24,
                    '-b:a', '665k',
                    '-ac', '5',
                    '/target/file',
                ), null, $formatExtra),
            array(false, array(
                    '-y', '-i', __FILE__,
                    '-b:a', '666k',
                    '-ac', '5',
                    '/target/file',
                ), $listeners, $progressableFormat),
            array(true, array(
                    '-y', '-i', __FILE__,
                    '-threads', 24,
                    '-b:a', '666k',
                    '-ac', '5',
                    '/target/file',
                ), $listeners, $progressableFormat),
        );
    }

    public function testSaveShouldNotStoreCodecFiltersInTheMedia()
    {
        $driver = $this->getFFMpegDriverMock();
        $ffprobe = $this->getFFProbeMock();

<<<<<<< HEAD
<<<<<<< HEAD
        $configuration = $this->getMockBuilder('Alchemy\BinaryDriver\ConfigurationInterface')->getMock();
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $configuration = $this->getMock('Alchemy\BinaryDriver\ConfigurationInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $driver->expects($this->any())
            ->method('getConfiguration')
            ->will($this->returnValue($configuration));

        $configuration->expects($this->any())
            ->method('has')
            ->with($this->equalTo('ffmpeg.threads'))
            ->will($this->returnValue(true));

        $configuration->expects($this->any())
            ->method('get')
            ->with($this->equalTo('ffmpeg.threads'))
            ->will($this->returnValue(24));

        $capturedCommands = array();

        $driver->expects($this->exactly(2))
            ->method('command')
            ->with($this->isType('array'), false, $this->anything())
            ->will($this->returnCallback(function ($commands, $errors, $listeners) use (&$capturedCommands, &$capturedListeners) {
                $capturedCommands[] = $commands;
            }));

        $outputPathfile = '/target/file';

<<<<<<< HEAD
<<<<<<< HEAD
        $format = $this->getMockBuilder('FFMpeg\Format\AudioInterface')->getMock();
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $format = $this->getMock('FFMpeg\Format\AudioInterface');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $format->expects($this->any())
            ->method('getExtraParams')
            ->will($this->returnValue(array('param')));

        $audio = new Audio(__FILE__, $driver, $ffprobe);
        $audio->save($format, $outputPathfile);
        $audio->save($format, $outputPathfile);

        $expected = array(
            '-y', '-i', __FILE__, 'param', '-threads', 24, '/target/file',
        );

        foreach ($capturedCommands as $capturedCommand) {
            $this->assertEquals($expected, $capturedCommand);
        }
    }

    public function getClassName()
    {
        return 'FFMpeg\Media\Audio';
    }
}
