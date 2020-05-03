<?php

namespace Tests\FFMpeg\Unit\FFProbe;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Alchemy\BinaryDriver\Exception\ExecutionFailureException;
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
use Alchemy\BinaryDriver\Exception\ExecutionFailureException;
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\FFProbe\OptionsTester;

class OptionsTesterTest extends TestCase
{
<<<<<<< HEAD
<<<<<<< HEAD
    public function testHasOptionWithOldFFProbe()
    {
        $this->expectException(
            '\FFMpeg\Exception\RuntimeException',
            'Your FFProbe version is too old and does not support `-help` option, please upgrade.'
        );
        $cache = $this->getCacheMock();

        $executionFailerExceptionMock = $this->getMockBuilder('Alchemy\BinaryDriver\Exception\ExecutionFailureException')
            ->disableOriginalConstructor()
            ->getMock();

=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException FFMpeg\Exception\RuntimeException
     * @expectedExceptionMessage Your FFProbe version is too old and does not support `-help` option, please upgrade.
     */
    public function testHasOptionWithOldFFProbe()
    {
        $cache = $this->getCacheMock();

<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $ffprobe = $this->getFFProbeDriverMock();
        $ffprobe->expects($this->once())
            ->method('command')
            ->with(array('-help', '-loglevel', 'quiet'))
<<<<<<< HEAD
<<<<<<< HEAD
            ->will($this->throwException($executionFailerExceptionMock));
=======
            ->will($this->throwException(new ExecutionFailureException('Failed to execute')));
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
            ->will($this->throwException(new ExecutionFailureException('Failed to execute')));
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb

        $tester = new OptionsTester($ffprobe, $cache);
        $tester->has('-print_format');
    }

    /**
     * @dataProvider provideOptions
     */
    public function testHasOptionWithCacheEmpty($isPresent, $data, $optionName)
    {
        $cache = $this->getCacheMock();

        $cache->expects($this->never())
            ->method('fetch');

        $cache->expects($this->exactly(2))
            ->method('contains')
            ->will($this->returnValue(false));

        $cache->expects($this->exactly(2))
            ->method('save');

        $ffprobe = $this->getFFProbeDriverMock();
        $ffprobe->expects($this->once())
            ->method('command')
            ->with(array('-help', '-loglevel', 'quiet'))
            ->will($this->returnValue($data));

        $tester = new OptionsTester($ffprobe, $cache);
        $this->assertTrue($isPresent === $tester->has($optionName));
    }

    public function provideOptions()
    {
        $data = file_get_contents(__DIR__ . '/../../fixtures/ffprobe/help.raw');

        return array(
            array(true, $data, '-print_format'),
            array(false, $data, '-another_print_format'),
        );
    }

    /**
     * @dataProvider provideOptions
     */
    public function testHasOptionWithHelpCacheLoaded($isPresent, $data, $optionName)
    {
        $cache = $this->getCacheMock();

        $cache->expects($this->once())
            ->method('fetch')
            ->will($this->returnValue($data));

        $cache->expects($this->at(0))
            ->method('contains')
            ->will($this->returnValue(false));

        $cache->expects($this->at(1))
            ->method('contains')
            ->will($this->returnValue(true));

        $cache->expects($this->once())
            ->method('save');

        $ffprobe = $this->getFFProbeDriverMock();
        $ffprobe->expects($this->never())
            ->method('command');

        $tester = new OptionsTester($ffprobe, $cache);
        $this->assertTrue($isPresent === $tester->has($optionName));
    }

    /**
     * @dataProvider provideOptions
     */
    public function testHasOptionWithCacheFullyLoaded($isPresent, $data, $optionName)
    {
        $cache = $this->getCacheMock();

        $cache->expects($this->once())
            ->method('fetch')
            ->with('option-' . $optionName)
            ->will($this->returnValue($isPresent));

        $cache->expects($this->once())
            ->method('contains')
            ->with('option-' . $optionName)
            ->will($this->returnValue(true));

        $ffprobe = $this->getFFProbeDriverMock();
        $ffprobe->expects($this->never())
            ->method('command');

        $tester = new OptionsTester($ffprobe, $cache);
        $this->assertTrue($isPresent === $tester->has($optionName));
    }
}
