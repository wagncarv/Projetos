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

use FFMpeg\FFProbe;
use FFMpeg\Exception\InvalidArgumentException;
use FFMpeg\Format\Audio\DefaultAudio;
use FFMpeg\Format\VideoInterface;
use FFMpeg\Media\MediaTypeInterface;
use FFMpeg\Format\ProgressListener\VideoProgressListener;

/**
 * The abstract default Video format
 */
abstract class DefaultVideo extends DefaultAudio implements VideoInterface
{
    /** @var string */
    protected $videoCodec;

    /** @var Integer */
    protected $kiloBitrate = 1000;

    /** @var Integer */
    protected $modulus = 16;

    /** @var Array */
    protected $additionalParamaters;

<<<<<<< HEAD
<<<<<<< HEAD
    /** @var Array */
    protected $initialParamaters;

=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    /**
     * {@inheritdoc}
     */
    public function getKiloBitrate()
    {
        return $this->kiloBitrate;
    }

    /**
     * Sets the kiloBitrate value.
     *
     * @param  integer                  $kiloBitrate
     * @throws InvalidArgumentException
     */
    public function setKiloBitrate($kiloBitrate)
    {
        if ($kiloBitrate < 1) {
            throw new InvalidArgumentException('Wrong kiloBitrate value');
        }

        $this->kiloBitrate = (int) $kiloBitrate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVideoCodec()
    {
        return $this->videoCodec;
    }

    /**
     * Sets the video codec, Should be in the available ones, otherwise an
     * exception is thrown.
     *
     * @param  string                   $videoCodec
     * @throws InvalidArgumentException
     */
    public function setVideoCodec($videoCodec)
    {
        if ( ! in_array($videoCodec, $this->getAvailableVideoCodecs())) {
            throw new InvalidArgumentException(sprintf(
                    'Wrong videocodec value for %s, available formats are %s'
                    , $videoCodec, implode(', ', $this->getAvailableVideoCodecs())
            ));
        }

        $this->videoCodec = $videoCodec;

        return $this;
    }

    /**
     * @return integer
     */
    public function getModulus()
    {
        return $this->modulus;
    }

    /**
     * {@inheritdoc}
     */
    public function getAdditionalParameters()
    {
        return $this->additionalParamaters;
    }

    /**
     * Sets additional parameters.
     *
     * @param  array                    $additionalParamaters
     * @throws InvalidArgumentException
     */
    public function setAdditionalParameters($additionalParamaters)
    {
        if (!is_array($additionalParamaters)) {
            throw new InvalidArgumentException('Wrong additionalParamaters value');
        }

        $this->additionalParamaters = $additionalParamaters;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function getInitialParameters()
    {
        return $this->initialParamaters;
    }

    /**
     * Sets initial parameters.
     *
     * @param  array                    $initialParamaters
     * @throws InvalidArgumentException
     */
    public function setInitialParameters($initialParamaters)
    {
        if (!is_array($initialParamaters)) {
            throw new InvalidArgumentException('Wrong initialParamaters value');
        }

        $this->initialParamaters = $initialParamaters;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
    public function createProgressListener(MediaTypeInterface $media, FFProbe $ffprobe, $pass, $total, $duration = 0)
    {
        $format = $this;
        $listeners = array(new VideoProgressListener($ffprobe, $media->getPathfile(), $pass, $total, $duration));

        foreach ($listeners as $listener) {
            $listener->on('progress', function () use ($format, $media) {
               $format->emit('progress', array_merge(array($media, $format), func_get_args()));
            });
        }

        return $listeners;
    }
}
