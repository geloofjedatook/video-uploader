[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)
[![Castopod](https://img.shields.io/badge/Castopod-v2-blue)](https://castopod.org)
[![Podcast](https://img.shields.io/badge/Podcast-Geloof%20je%20dat%20ook-ff69b4)](https://geloofjedatook.nl)

# Video Uploader Plugin for Castopod v2

This plugin adds an **MP4 upload field** to the episode creation and edit form.

When a video file is uploaded:
- It is stored under `public/media/episodes/<slug>/video/<slug>.mp4`.
- The plugin emits a `VideoUploaded` event containing:
  - The related `Episode` model
  - The absolute path to the uploaded file

Other plugins (such as `video-youtube-sync`, `video-apple-feed`, or `video-spotify-helper`) can listen to this event to automatically:
- Upload the video to external platforms
- Generate separate video RSS feeds
- Link or embed the video in the episode’s metadata

## Installation

1. Place this folder in `plugins/video-uploader`.
2. Activate it in the Castopod admin panel.
3. When editing or creating an episode, you’ll see a new field:
   **“Video file (MP4)”**.
4. Once uploaded, integration plugins can handle the new `VideoUploaded` event.

## Example usage

- **YouTube plugin:** listen for `VideoUploaded` and upload the MP4 to YouTube.
- **Apple Video Feed plugin:** listen for `VideoUploaded` and generate `/feed/video`.
- **Spotify Helper plugin:** prompt manual upload to Spotify for Podcasters.

# video-uploader
Castopod plugin that adds video upload support and triggers integration events

# Geloof je dat ook – Video Uploader for Castopod

This plugin is developed by the **Geloof je dat ook Podcast**  
🎙️ https://geloofjedatook.nl  

It allows creators to upload video files to Castopod episodes and automatically trigger integrations for YouTube, Apple Podcasts (video feed), or Spotify.

---
© Geloof je dat ook Podcast. Licensed under MIT.
