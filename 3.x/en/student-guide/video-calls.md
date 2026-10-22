# One-to-One Video Calls

Chamilo includes optional **one-to-one video calling** inside the **floating platform chat**. It uses your browser's WebRTC support to connect two people who are using Chamilo. This is different from the **Chat course tool** and from meetings created with BigBlueButton or Zoom.

This feature was introduced and improved for [issue #3777](https://github.com/chamilo/chamilo-lms/issues/3777) in PRs [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) and [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Before Starting

* The administrator must allow use of the floating platform chat and set **Hide videochat option in global chat** (`chat.hide_chat_video`) to **No**. It is hidden by default. See [Chat Settings](../admin-guide/platform-settings/chat-settings.md).
* Use a browser that supports WebRTC, with permission to access the camera and microphone. Browser media access typically requires HTTPS (or a trusted local development context).
* Be signed in and set your chat status to **online**. Choose an ordinary user contact; the video button does not appear for a bot or when the feature is disabled.
* The other user must be available to receive and accept the call.

## Starting a Call

1. Open the **floating chat panel** at the bottom of Chamilo (not the course's own Chat page).
2. Select the person you want to contact.
3. In the conversation header, click the **Start video call** camera icon.
4. Grant camera and microphone access when your browser asks.
5. The call shows **Calling...** while Chamilo waits for the other user. When they accept, the status changes through **Connecting...** to **Connected** after the peer connection succeeds.

An unanswered call times out rather than continuing indefinitely. If the other user refuses or cancels, the chat shows an explanatory status message.

## Receiving and Managing a Call

When a contact calls, the floating chat displays an **Incoming video call** dialog. Choose **Accept** to join or **Reject** to decline. Accepting may also ask for permission to use your camera and microphone.

During a call you can **mute or unmute your microphone**, **turn your camera on or off**, and **hang up**. A small preview shows your local video while the main area shows the other person. Closing or ending the call releases the local audio/video streams.

This is a **private call between two users**, not a course-wide meeting. To hold a scheduled group session with recording or collaboration tools, use your organisation's [Video Conferencing](../teacher-guide/collaboration-and-communication/video-conferencing.md) integration.

## If Video Calling Is Unavailable

* **No Start video call icon:** Check the platform's `chat.hide_chat_video` setting, whether the floating chat is available, your online status and browser WebRTC support.
* **Camera or microphone error:** Allow media permissions in the browser and check that the hardware is present and not occupied by another application.
* **No answer:** Ask your contact to open Chamilo and check their availability. The outgoing request has a timeout.
* **Connection fails after acceptance:** Try another network and check browser permissions or firewall restrictions. The current WebRTC implementation uses a public STUN server and does not configure a TURN relay, so connectivity may fail on restrictive networks. Text chat can still work if video signaling fails.

There is no need to configure BigBlueButton or Zoom for this direct-call feature; those integrations provide a separate type of meeting.
