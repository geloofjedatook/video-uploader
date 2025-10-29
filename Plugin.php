<?php

namespace Plugins\GeloofJeDatOok\VideoUploader;

use Castopod\Plugins\BasePlugin;
use Castopod\Events\EpisodeSaved;
use Plugins\GeloofJeDatOok\VideoUploader\Src\VideoUploadField;
use Plugins\GeloofJeDatOok\VideoUploader\Src\Events\VideoUploaded;

class Plugin extends BasePlugin
{
    public function boot()
    {
        // Add the video upload field to the episode form
        $this->add_filter('admin_episode_form_fields', [VideoUploadField::class, 'addVideoField']);

        // Handle the upload when the episode is saved
        $this->listen(EpisodeSaved::class, [VideoUploadField::class, 'handleUpload']);
    }
}
