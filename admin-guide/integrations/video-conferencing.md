# Video Conferencing

Chamilo integrates with video conferencing platforms to enable live sessions within courses.

## Supported Platforms

### BigBlueButton

**BigBlueButton** (BBB) is an open-source web conferencing system designed for online learning. It is the most commonly used video conferencing solution with Chamilo.

#### Configuration

1. Install BigBlueButton on a separate server (see [BigBlueButton documentation](https://docs.bigbluebutton.org/))
2. In Chamilo platform settings, configure:
   * **BBB server URL** — The address of your BBB server
   * **BBB salt/secret** — The API secret from your BBB server
   * **Enable video conferencing** — Turn the feature on
3. Save

#### Features Available in Chamilo

* Start/join meetings from within a course
* Automatic room creation per course
* Meeting recordings (if enabled)
* Screen sharing, whiteboard, breakout rooms
* Chat alongside video

### Zoom

Chamilo can integrate with **Zoom** for video conferencing.

#### Configuration

1. Create a Zoom app in the Zoom Marketplace
2. In Chamilo, configure the Zoom API credentials
3. Enable the Zoom integration

#### How It Works

When Zoom is configured, teachers can create and launch Zoom meetings from within their course. Learners join through the Chamilo interface.

## Choosing Between BBB and Zoom

| Feature | BigBlueButton | Zoom |
|---------|--------------|------|
| Cost | Free (open-source), but requires your own server | Requires a Zoom subscription |
| Hosting | Self-hosted | Cloud-hosted by Zoom |
| Integration depth | Deep (built for LMS use) | Standard |
| Recording | Server-side, stored on your infrastructure | Zoom cloud or local |
| Whiteboard | Built-in | Built-in |
| Breakout rooms | Yes | Yes |

## Tips

* **Separate server for BBB** — BigBlueButton should run on its own dedicated server for best performance, not on the same server as Chamilo
* **Test before classes** — Always test the video conferencing setup before a live session
* **Check bandwidth** — Ensure your server and network can handle the expected number of concurrent users
