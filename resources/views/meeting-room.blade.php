<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/x-icon"/>


    <link href="{{ secure_asset('css/meeting-room.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{secure_asset('/js/echo.js')}}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <!-- <link rel="stylesheet" href="{{asset('/css/doodle.css')}}"> -->

    <script src="//cdn.pubnub.com/pubnub-3.14.1.min.js" defer></script>
    <script type="text/javascript" src="{{secure_asset('/js/doodle.js')}}" defer></script>

    @if(auth()->user())
    <script>
        window.user = {
            id: {{ auth()->id() }},
            name: "{{ auth()->user()->name }}"
        };

        window.csrfToken = "{{ csrf_token() }}";
    </script>
    @endif

    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <title>Agoratekton | Meeting Room</title>
</head>
<body>

    <div id="meetingDoors">
        <div id="meetingDoorLeft"></div>
        <div id="meetingDoorRight"></div>
    </div>

    <div id="navBar">
        <div id="colorSwatchContainer">
            <div id="colorSwatch">
                <input onclick="opacityColor(this)" type="radio" name="color" id="color00" data-color="white" checked><label for="color00"></label> 
                <input onclick="opacityColor(this)" type="radio" name="color" id="color01" data-color="gold"><label for="color01"></label> 
                <input onclick="opacityColor(this)" type="radio" name="color" id="color02" data-color="darkorange"><label for="color02"></label>  
                <input onclick="opacityColor(this)" type="radio" name="color" id="color03" data-color="navy"><label for="color03"></label>  
                <input onclick="opacityColor(this)" type="radio" name="color" id="color04" data-color="yellowgreen"><label for="color04"></label>  
                <input onclick="opacityColor(this)" type="radio" name="color" id="color05" data-color="firebrick"><label for="color05"></label>  
                <input onclick="opacityColor(this)" type="radio" name="color" id="color06" data-color="powderblue"><label for="color06"></label> 
                <input onclick="opacityColor(this)" type="radio" name="color" id="color07" data-color="black"><label for="color07"></label> 
            </div>
        </div>

        <div id="meetingTitleContainer">
            @if(Auth::user()->meetingid === $meetingID)
                <!-- <p>Agoratekton | Meeting with {{$user->id}}-{{$user->name}}</p> -->
                <p>Agoratekton | Meeting with {{$user->name}}</p>
            @else
                <!-- <p>Agoratekton | Meeting with {{$callerMeetingId->id}}-{{$callerMeetingId->name}}</p> -->
                <p>Agoratekton | Meeting with {{$callerMeetingId->name}}</p>
            @endif
        </div>

        <div id="notesLeaveContainer">
            <div id="notesInputContainer">
                <div id="notesInputIcon" class="fa fa-check"></div>
                <div id="notesInputIconRemove" class="fa fa-remove"></div>
                <input id="notesInputMain" type="text" placeholder="type note here.">
            </div>
            <div id="notesContainer">
                <div class="fa fa-sticky-note"></div>
                <p id="notesContainerWord">add a note</p>
            </div>
            <div id="leaveButtonContainer">
                <div class="fa fa-power-off"></div>
                <p id="leaveButtonContainerWord">end meeting</p>
            </div>
        </div>
    </div>

    <div id="notesActualContainer">
        <div id="notesActualContainer2"></div>
    </div>

    <div id="app"></div>

    <div id="doodleVideoWrapper">
        <div id="doodle">
            <div class="bubble" style="display: none;">
                <span id="occupancy">0</span>
                <span id="unit">doodler</span>
            </div>
            <canvas id="drawCanvas" width="300" height="300">Canvas is not supported on this browser!</canvas>
        </div>
    </div>

    <script>
        
        let receiverId = parseInt({{$user->id}})
        let receiverName = '{{$user->name}}'
        let callerMeetingId = '{{Auth::user()->meetingid}}'
        let meetingPath = window.location.pathname;
        let receiverIdStartMeeting = '{{Auth::user()->id}}'
        let receiverIdStartMeetingName = '{{Auth::user()->name}}'


            if ('/meeting-room/' + callerMeetingId + '/' + receiverId === meetingPath) {
                window.document.body.insertAdjacentHTML( 'afterbegin', `<div id="startButtonFake" onclick="document.getElementById('startButton').click()">Start meeting with {{$user->name}}</div>`);

                
                // document.getElementById('startButtonFake').addEventListener("click", function() {  
                    // document.getElementById('meetingDoors').firstElementChild.style.left = "-2000px";
                    // document.getElementById('meetingDoors').lastElementChild.style.right = "-2000px";
                    // document.getElementById('startButtonFake').style.opacity = "0";
                // })
            }
            if ('/meeting-room/' + callerMeetingId + '/' + receiverId !== meetingPath) {
                window.document.body.insertAdjacentHTML( 'afterbegin', `<div id="waitingStart">Waiting for {{$callerMeetingId->name}} to start the meeting.</div>`);
            }

            
		var drawHistory = false;

    </script>

    <script type="text/javascript" src="{{secure_asset('/js/startMeetingCallScript.js')}}"></script>
    <script type="text/javascript" src="{{secure_asset('/js/meetingRoom.js')}}"></script>
    

</body>
</html>