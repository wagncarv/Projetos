<?php

namespace Tests\FFMpeg\Unit;

use FFMpeg\FFMpegServiceProvider;
use Silex\Application;
<<<<<<< HEAD
<<<<<<< HEAD

class FFMpegServiceProviderTest extends TestCase
=======
use PHPUnit\Framework\TestCase as BaseTestCase;

class FFMpegServiceProviderTest extends BaseTestCase
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
use PHPUnit\Framework\TestCase as BaseTestCase;

class FFMpegServiceProviderTest extends BaseTestCase
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
{
    public function testWithConfig()
    {
        $app = new Application();
        $app->register(new FFMpegServiceProvider(), array(
            'ffmpeg.configuration' => array(
                'ffmpeg.threads'   => 12,
                'ffmpeg.timeout'   => 10666,
                'ffprobe.timeout'  => 4242,
            )
        ));

        $this->assertInstanceOf('FFMpeg\FFMpeg', $app['ffmpeg']);
        $this->assertSame($app['ffmpeg'], $app['ffmpeg.ffmpeg']);
        $this->assertInstanceOf('FFMpeg\FFProbe', $app['ffmpeg.ffprobe']);

        $this->assertEquals(12, $app['ffmpeg']->getFFMpegDriver()->getConfiguration()->get('ffmpeg.threads'));
        $this->assertEquals(10666, $app['ffmpeg']->getFFMpegDriver()->getProcessBuilderFactory()->getTimeout());
        $this->assertEquals(4242, $app['ffmpeg.ffprobe']->getFFProbeDriver()->getProcessBuilderFactory()->getTimeout());
    }

    public function testWithoutConfig()
    {
        $app = new Application();
        $app->register(new FFMpegServiceProvider());

        $this->assertInstanceOf('FFMpeg\FFMpeg', $app['ffmpeg']);
        $this->assertSame($app['ffmpeg'], $app['ffmpeg.ffmpeg']);
        $this->assertInstanceOf('FFMpeg\FFProbe', $app['ffmpeg.ffprobe']);

        $this->assertEquals(4, $app['ffmpeg']->getFFMpegDriver()->getConfiguration()->get('ffmpeg.threads'));
        $this->assertEquals(300, $app['ffmpeg']->getFFMpegDriver()->getProcessBuilderFactory()->getTimeout());
        $this->assertEquals(30, $app['ffmpeg.ffprobe']->getFFProbeDriver()->getProcessBuilderFactory()->getTimeout());
    }

    public function testWithFFMpegBinaryConfig()
    {
        $app = new Application();
        $app->register(new FFMpegServiceProvider(), array(
            'ffmpeg.configuration' => array(
                'ffmpeg.binaries' => '/path/to/ffmpeg',
            )
        ));

<<<<<<< HEAD
<<<<<<< HEAD
        $this->expectException('\FFMpeg\Exception\ExecutableNotFoundException', 'Unable to load FFMpeg');
=======
        $this->setExpectedException('FFMpeg\Exception\ExecutableNotFoundException', 'Unable to load FFMpeg');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->setExpectedException('FFMpeg\Exception\ExecutableNotFoundException', 'Unable to load FFMpeg');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $app['ffmpeg'];
    }

    public function testWithFFMprobeBinaryConfig()
    {
        $app = new Application();
        $app->register(new FFMpegServiceProvider(), array(
            'ffmpeg.configuration' => array(
                'ffprobe.binaries' => '/path/to/ffprobe',
            )
        ));

<<<<<<< HEAD
<<<<<<< HEAD
        $this->expectException('\FFMpeg\Exception\ExecutableNotFoundException', 'Unable to load FFProbe');
=======
        $this->setExpectedException('FFMpeg\Exception\ExecutableNotFoundException', 'Unable to load FFProbe');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        $this->setExpectedException('FFMpeg\Exception\ExecutableNotFoundException', 'Unable to load FFProbe');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $app['ffmpeg.ffprobe'];
    }
}
