<?php

/*
 * This file is part of PHP-FFmpeg.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FFMpeg\Format\Video;

/**
 * The WebM video format
 */
class WebM extends DefaultVideo
{
    public function __construct($audioCodec = 'libvorbis', $videoCodec = 'libvpx')
    {
        $this
            ->setAudioCodec($audioCodec)
            ->setVideoCodec($videoCodec);
    }

    /**
     * {@inheritDoc}
     */
    public function supportBFrames()
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getExtraParams()
    {
        return array('-f', 'webm');
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableAudioCodecs()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return array('copy', 'libvorbis');
=======
        return array('libvorbis');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
        return array('libvorbis');
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    }

    /**
     * {@inheritDoc}
     */
    public function getAvailableVideoCodecs()
    {
        return array('libvpx', 'libvpx-vp9');
    }
}
