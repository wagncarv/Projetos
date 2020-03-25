<?php

/*
 * This file is part of PHP-FFmpeg.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FFMpeg\Format;

interface VideoInterface extends AudioInterface
{
    /**
     * Gets the kiloBitrate value.
     *
     * @return integer
     */
    public function getKiloBitrate();

    /**
     * Returns the modulus used by the Resizable video.
     *
     * This used to calculate the target dimensions while maintaining the best
     * aspect ratio.
     *
     * @see http://www.undeadborn.net/tools/rescalculator.php
     *
     * @return integer
     */
    public function getModulus();

    /**
     * Returns the video codec.
     *
     * @return string
     */
    public function getVideoCodec();

    /**
     * Returns true if the current format supports B-Frames.
     *
     * @see https://wikipedia.org/wiki/Video_compression_picture_types
     *
     * @return Boolean
     */
    public function supportBFrames();

    /**
     * Returns the list of available video codecs for this format.
     *
     * @return array
     */
    public function getAvailableVideoCodecs();

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Returns the list of additional parameters for this format.
=======
     * Returns the list of available video codecs for this format.
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
     * Returns the list of available video codecs for this format.
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
     *
     * @return array
     */
    public function getAdditionalParameters();
<<<<<<< HEAD
<<<<<<< HEAD

    /**
     * Returns the list of initial parameters for this format
     *
     * @return array
     */
    public function getInitialParameters();
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
=======
>>>>>>> 0b5c0cc434ab2f3892947f2eff12e6e6eafae9fb
}
