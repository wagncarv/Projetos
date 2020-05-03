<?php

namespace Tests\FFMpeg\Unit\FFProbe;

use Tests\FFMpeg\Unit\TestCase;
use FFMpeg\FFProbe\OutputParser;
use FFMpeg\FFProbe;

class OutputParserTest extends TestCase
{
    /**
     * @dataProvider provideTypeDataAndOutput
     */
    public function testParse($type, $data, $expectedOutput)
    {
        $parser = new OutputParser();
        $this->assertEquals($expectedOutput, $parser->parse($type, $data));
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function testParseWithInvalidArgument()
    {
        $this->expectException('\FFMpeg\Exception\InvalidArgumentException');
=======
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * @expectedException FFMpeg\Exception\InvalidArgumentException
     */
    public function testParseWithInvalidArgument()
    {
<<<<<<< HEAD
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
        $parser = new OutputParser();
        $parser->parse('comme ca', 'data');
    }

    public function provideTypeDataAndOutput()
    {
        $expectedFormat = json_decode(file_get_contents(__DIR__ . '/../../fixtures/ffprobe/show_format.json'), true);
        $expectedStreams = json_decode(file_get_contents(__DIR__ . '/../../fixtures/ffprobe/show_streams.json'), true);

        $rawFormat = file_get_contents(__DIR__ . '/../../fixtures/ffprobe/show_format.raw');
        $rawStreams = file_get_contents(__DIR__ . '/../../fixtures/ffprobe/show_streams.raw');

        return array(
            array(FFProbe::TYPE_FORMAT, $rawFormat, $expectedFormat),
            array(FFProbe::TYPE_STREAMS, $rawStreams, $expectedStreams),
        );
    }
}
