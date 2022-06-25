<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{env('VIDEO_POC_TITLE')}}</title>
  </head>
  <body>
    <script>
      var script = document.createElement("script");
      script.type = "text/javascript";
      //
      script.addEventListener("load", function (event) {
        // Initialize the factory function
        const meeting = new VideoSDKMeeting();

        // Set apikey, meetingId and participant name
        const apiKey = "{{env('VIDEO_POC_API_KEY')}}"; // generated from app.videosdk.live
        const meetingId = "video-poc";
        const name = "";

        const config = {
          name: name,
          apiKey: apiKey,
          meetingId: meetingId,
          
          containerId: null,
          redirectOnLeave: "http://videopoc.test/pocx/",
          // redirectOnLeave: "https://guruu.broadweb.link/poc/",

          micEnabled: true,
          webcamEnabled: true,
          maxResolution: "sd", // Webcam Resolution - (If it is 'sd' then the upload resolution will be 360p else if it is set to 'hd' then it will be 720p. By default it is set to sd)
          participantCanToggleSelfWebcam: true,
          participantCanToggleSelfMic: true,

          chatEnabled: true,
          screenShareEnabled: true,
          pollEnabled: true,
          whiteboardEnabled: true, // We can validate this by providing a condition that if the user is of type "host" the value should be "true" otherwise "false" for others
          raiseHandEnabled: true,

          recordingEnabled: true,
          recordingEnabledByDefault: false,
          recordingWebhookUrl: "https://www.videosdk.live/callback",
          recordingAWSDirPath: `/meeting-recordings/${meetingId}/`, // automatically save recording in this s3 path

          brandingEnabled: true,
          brandLogoURL: "{{ asset('images/guruu-logo.PNG') }}",
          brandName: "{{env('VIDEO_BRAND_NAME')}}",
          poweredBy: false,

          participantCanLeave: true, // if false, leave button won't be visible

          // Live stream meeting to youtube
          livestream: {
            autoStart: true,
            outputs: [
              // {
              //   url: "rtmp://x.rtmp.youtube.com/live2",
              //   streamKey: "<STREAM KEY FROM YOUTUBE>",
              // },
            ],
          },

          permissions: {
            askToJoin: false, // Ask joined participants for entry in meeting
            toggleParticipantMic: true, // Can toggle other participant's mic
            toggleParticipantWebcam: true, // Can toggle other participant's webcam
            removeParticipant: true, // Remove other participant from meeting
            endMeeting: true, // End meeting - (We can validate this by providing a condition that if the user is of type "host" the value should be "true" otherwise "false" for others)
            drawOnWhiteboard: true, // Can draw on Whiteboard - (We can validate this by providing a condition that if the user is of type "host" the value should be "true" otherwise "false" for others)
            toggleWhiteboard: true, // Can toggle whiteboard - (We can validate this by providing a condition that if the user is of type "host" the value should be "true" otherwise "false" for others)
            toggleRecording: true, // Can toggle recording
          },

          joinScreen: {
            visible: true, // Show the join screen ?
            title: "{{env('VIDEO_POC_TITLE')}}", // Meeting title
            meetingUrl: window.location.href, // Meeting joining url
          },

          pin: {
            allowed: true, // participant can pin any participant in meeting
            layout: "GRID", // meeting layout - GRID | SPOTLIGHT | SIDEBAR
          },

          leftScreen: {
            // visible when redirect on leave not provieded
            actionButton: {
              // optional action button
              label: "Video SDK Live", // action button label
              href: "https://videosdk.live/", // action button href
            },
          },
        };

        meeting.init(config);
      });

      script.src =
        "https://sdk.videosdk.live/rtc-js-prebuilt/0.1.30/rtc-js-prebuilt.js";
      document.getElementsByTagName("head")[0].appendChild(script);
    </script>
  </body>
</html>
