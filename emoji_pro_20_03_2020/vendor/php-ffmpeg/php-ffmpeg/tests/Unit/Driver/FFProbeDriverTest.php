<?php

namespace Tests\FFMpeg\Unit\Driver;

use Alchemy\BinaryDriver\Configuration;
use FFMpeg\Driver\FFProbeDriver;
use Tests\FFMpeg\Unit\TestCase;
use Symfony\Component\Process\ExecutableFinder;

class FFProbeDriverTest extends TestCase
{
    public function setUp()
    {
        $executableFinder = new ExecutableFinder();

        $found = false;
        foreach (array('avprobe', 'ffprobe') as $name) {
            if (null !== $executableFinder->find($name)) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->markTestSkipped('Neither ffprobe or avprobe found');
        }
    }

    public function testCreate()
    {
        $logger = $this->getLoggerMock();
        $ffprobe = FFProbeDriver::create(array(), $logger);
        $this->assertInstanceOf('FFMpeg\Driver\FFProbeDriver', $ffprobe);
        $this->assertEquals($logger, $ffprobe->getProcessRunner()->getLogger());
    }

    public function testCreateWithConfig()
    {
        $conf = new Configuration();
        $ffprobe = FFProbeDriver::create($conf, $this->getLoggerMock());
        $this->assertEquals($conf, $ffprobe->getConfiguration());
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function testCreateFailureThrowsAnException()
    {
        $this->expectException('\FFMpeg\Exception\ExecutableNotFoundException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException FFMpeg\Exception\ExecutableNotFoundException
     */
    public function testCreateFailureThrowsAnException()
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        FFProbeDriver::create(array('ffprobe.binaries' => '/path/to/nowhere'));
    }
}
