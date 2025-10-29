<?php

namespace Plugins\GeloofJeDatOok\VideoUploader\Src;

use Illuminate\Http\Request;
use Castopod\Models\Episode;
use Plugins\Rjgout\VideoUploader\Src\Events\VideoUploaded;

class VideoUploadField
{
    /**
     * Add a video upload input field to the episode creation/edit form.
     */
    public static function addVideoField(array $fields): array
    {
        $fields['video_file'] = [
            'label'  => 'Video file (MP4)',
            'type'   => 'file',
            'accept' => 'video/mp4',
            'help'   => 'Upload an MP4 file that will be associated with this episode.',
        ];

        return $fields;
    }

    /**
     * Handle video upload when an episode is saved.
     */
    public static function handleUpload(Episode $episode, Request $request)
    {
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $slug = $episode->slug;
            $path = base_path("public/media/episodes/$slug/video");

            if (!is_dir($path)) {
                mkdir($path, 0775, true);
            }

            $fileName = $slug . '.mp4';
            $file->move($path, $fileName);

            // Emit an event so other plugins (e.g., YouTube sync) can react
            event(new VideoUploaded($episode, "$path/$fileName"));
        }
    }
}
