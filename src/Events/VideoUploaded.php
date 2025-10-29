<?php

namespace Plugins\GeloofJeDatOok\VideoUploader\Src\Events;

use Castopod\Models\Episode;

class VideoUploaded
{
    /**
     * The associated episode instance.
     */
    public Episode $episode;

    /**
     * Absolute path to the uploaded video file.
     */
    public string $filePath;

    public function __construct(Episode $episode, string $filePath)
    {
        $this->episode = $episode;
        $this->filePath = $filePath;
    }
}
