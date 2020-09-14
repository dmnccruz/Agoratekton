<!-- COMPOSE MESSAGE TIMELINE-----------------------------------------------------------  -->

<div id="composeMessageMainContainer">
    <div id="sendMessageSuccess">
        <img width="20%" src="{{asset('/images/icons/message-sent_200_transparent.gif')}}" alt="">
        <p>Message sent!</p>
    </div>
    <div id="composeMessageWindow">
        <img width="20%" src="{{asset('/images/icons/chatmessage200transparent.gif')}}" alt="">
        <p></p>
        <div id="messageInputContainer">
            <input id="messageInput"></input>
            <button data-id="" data-name="" id="sendMessage" class="fa fa-send-o" onclick="messageSent(this)"></button>
        </div>
    </div>
    <div id="composeMessageHorizontalLines">
        <div id="composeMessageHorizontalLines1"></div>
    </div>
    <div id="composeMessageVerticalLines">
        <div id="composeMessageVerticalLines1"></div>
    </div>
</div>

<!-- CALL POP UPS-----------------------------------------------------------  -->

<div id="meetingPopUpReceiver">
    <div id="callWrapper">
        <img width="20%" src="{{asset('/images/icons/phonelink-ring_200_transparent.gif')}}" alt="">
        <p id="meetingPopUpReceiverContent"></p>
        <div id="meetingPopUpButtonsReceiver">
            <button id="acceptButton">accept</button>
            <button id="declineButton">decline</button>
        </div>
    </div>
    <div id="callHorizontalLines">
        <div id="callHorizontalLines1"></div>
    </div>
    <div id="callVerticalLines">
        <div id="callVerticalLines1"></div>
    </div>
</div>

<div class="meetingPopUpCaller" id="meetingPopUpCaller">
    <div id="callerWrapper">
        <img width="20%" src="{{asset('/images/icons/phone-ringing_200_transparent.gif')}}" alt="">
        <p class="meetingPopUpCallerContent" id="meetingPopUpCallerContent"></p>
        <button id="cancelButton">Drop invite.</button>
    </div>
    <div id="callHorizontalLines">
        <div id="callHorizontalLines1"></div>
    </div>
    <div id="callVerticalLines">
        <div id="callVerticalLines1"></div>
    </div>
</div>

<!-- SET MEETING POP UP FOR CALLER-----------------------------------------------------------  -->

<div id="setMeetingPopUp">
    <div id="requestSent">
        <img width="20%" src="{{asset('/images/icons/event_200_transparent.gif')}}" alt="">
        <p>Request sent!</p>
    </div>
    <div id="infoWrapper">
        <div id="userPic">
            <img id="userAvatar" width="125" height="125" src="" alt="">
            <img id="calendarIcon" width="80px" src="{{asset('/images/icons/calendar_200_transparent.gif')}}" alt="">
            <div onclick="exitSetCall()" id="setExitButton" class="fa fa-remove"></div>
        </div>
        <div id="setTitle">Set meeting now or choose desired date.</div>
        <div id="dateWrapper">
            <div id="dateInput"></div>
        </div>
        <div id="topicInput">
            <input id="topicInputBox" type="text" placeholder="say something to">
        </div>
        <div id="setMeetingButtonNotNow">
            <!-- <button id="setDate" onclick="setMeet(this)">Set date.</button> -->
            <button id="setDate">Set date.</button>
            <p>-or-</p>
            <button onclick="makeCall(this)" data-userName="{{Auth::user()->name}}" data-userId="{{Auth::user()->id}}" data-meetingId="{{Auth::user()->meetingid}}" id="meetNow">Meet now.</button>
        </div>
    </div>
    <div id="setMeetingHorizontalLines">
        <div id="setMeetingHorizontalLines1"></div>
    </div>
    <div id="setMeetingVerticalLines">
        <div id="setMeetingVerticalLines1"></div>
    </div>
</div>

<!-- REQUEST POP UP FOR RECEIVER-----------------------------------------------------------  -->

<div id="requestMeetingPopUp">
    <div id="requestWrapper">
        <div id="requestPic">
            <!-- <img id="requestAvatar" width="150" height="150" src="{{asset('/images/avatar.png')}}" alt=""> -->
            <!-- <img id="requestAvatar" width="150" height="150" src="{{\App\User::where(['id' => 0])->pluck('avatar')->first()}}" alt=""> -->
            <img id="requestAvatar" width="150" height="150" src="" alt="">
            <p id="requestName"></p>
        </div>
        <p class="requesttitles">Meeting Topic</p>
        <div id="requestTopic"></div>
        <p class="requesttitles">Meeting Date</p>
        <div id="requestDate"></div>
        <div id="requestButtons">
            <button onclick="acceptRequest()" id="requestAccept">Accept</button>
            <button onclick="declineRequest()" id="requestDecline">Decline</button>
        </div>
    </div>
    <div id="requestMeetingHorizontalLines">
        <div id="requestMeetingHorizontalLines1"></div>
    </div>
    <div id="requestMeetingVerticalLines">
        <div id="requestMeetingVerticalLines1"></div>
    </div>
</div>

<!-- DECLINED REQUEST FOR CALLER-----------------------------------------------------------  -->

<div id="declinedRequestPopup">
    <div id="declinedRequestPopupWrapper">
        <img width="40%" src="{{asset('/images/icons/disappointed_200_transparent.gif')}}" alt="">
        <p id="declineTitle">You're request was declined.</p>
        <button onclick="closeRequest(this)">Close</button>
    </div>
    <div id="declinedRequestHorizontalLines">
        <div id="declinedRequestHorizontalLines1"></div>
    </div>
    <div id="declinedRequestVerticalLines">
        <div id="declinedRequestVerticalLines1"></div>
    </div>
</div>

<div id="approvedRequestPopup">
    <div id="approvedRequestPopupWrapper">
        <img width="40%" src="{{asset('/images/icons/blushing_200_transparent.gif')}}" alt="">
        <p id="approveTitle">You're request was approved!</p>
        <button onclick="closeApprovedRequest(this)">Close</button>
    </div>
    <div id="approvedRequestHorizontalLines">
        <div id="approvedRequestHorizontalLines1"></div>
    </div>
    <div id="approvedRequestVerticalLines">
        <div id="approvedRequestVerticalLines1"></div>
    </div>
</div>

<!--CREATE ARCHI POST -----------------------------------------------------------  -->

<div id="createArchiPostWrapper">
    <div id="successPostArchi">
        <img width="15%" src="{{asset('/images/icons/blushing_200_transparent.gif')}}" alt="" >
        <p>Posted!</p>
    </div>
    <form id="createArchiPostWindow" action="/add-post" method="POST" enctype="multipart/form-data">
    @csrf
        <input id="idInput" type="hidden" name="user_id" value="{{Auth::user()->id}}">
        
        <div id="picturesWrapper">
            <div id="createCoverPhoto" onclick="clickCoverPhoto()">
                <p style="position: absolute; top: 32.5px; z-index: 10000;" style="opacity: .5;">upload a cover photo here.</p>
                <img id="output1"  style="z-index: 100;" width="25%" height="" src="{{asset('/images/icons/download_200_transparent.gif')}}" alt="" >
                <input style="position: absolute" type="file" id="createPhoto1input" name="createCoverPhoto" onchange="loadFile1(event)"/>
                <p id="additionalPhotosP" style="position: absolute; bottom: 255px; z-index: 10000;" style="transform: scale(.65); opacity: .5;">upload additional photos here.</p>
            </div>
            <div id="createSmallPhotosWrapper">
                <div id="createPhoto1" class="createSmallPhotos" onclick="clickPhoto1()">
                    <img id="output1a"  style="z-index: 100;" width="30%" height="" src="{{asset('/images/icons/download_200_transparent.gif')}}" alt="" >
                    <input style="position: absolute" type="file" id="createPhoto1ainput" name="photo1" onchange="loadFile1a(event)"/>
                </div>
                <div id="createPhoto2" class="createSmallPhotos" onclick="clickPhoto2()">
                    <img id="output1b"  style="z-index: 100;" width="30%" height="" src="{{asset('/images/icons/download_200_transparent.gif')}}" alt="" >
                    <input style="position: absolute" type="file" id="createPhoto2ainput" name="photo2" onchange="loadFile1b(event)"/>
                </div>
                <div id="createPhoto3" class="createSmallPhotos" onclick="clickPhoto3()">
                    <img id="output1c"  style="z-index: 100;" width="30%" height="" src="{{asset('/images/icons/download_200_transparent.gif')}}" alt="" >
                    <input style="position: absolute" type="file" id="createPhoto3ainput" name="photo3" onchange="loadFile1c(event)"/>
                </div>
            </div>
        </div>
        <div id="wordsWrapper">
            <div id="createIcon">
                <img width="35%" src="{{asset('/images/icons/edit_200_transparent.gif')}}" alt="">
            </div>
            <div id="projectTitle">
                <input id="projectTitleInput" class="createArchiPostInputs" type="text" name="posttitle" placeholder="think of a title.">
            </div>
            <div id="projectBrief">
                <textarea id="projectBriefInput" class="createArchiPostInputs" type="text" name="summary" placeholder="write a description."></textarea>
            </div>
            <div id="postButton">
                <div style="display:none; pointer-events: none;" class="createPost2" id="createProjectButton" onclick="createPost(this)">post project!</div> 
                <div style="display:none; pointer-events: none;" class="createPost2" id="createJobButton" onclick="createPost(this)">post job!</div> 
                <div style="display:none; pointer-events: none;" class="createPost2" id="createProductButton" onclick="createPost(this)">post product!</div> 

                <div style="display:none; pointer-events: none;" class="createPost2" id="updateProjectButton" onclick="confirmUpdatePost(this)">update project!</div> 
                <div style="display:none; pointer-events: none;" class="createPost2" id="updateJobButton" onclick="confirmUpdatePost(this)">update job!</div> 
                <div style="display:none; pointer-events: none;" class="createPost2" id="updateProductButton" onclick="confirmUpdatePost(this)">update product!</div> 
            </div>
        </div>
    </form>

    <div id="createArchiPostWindowHorizontalLines" onclick="closeShowCaseYourProject(this)">
        <div id="createArchiPostWindowHorizontalLines1"></div>
    </div>
    <div id="createArchiPostWindowVerticalLines" onclick="closeShowCaseYourProject(this)">
        <div id="createArchiPostWindowVerticalLines1"></div>
    </div>
</div>

<!--DELETE ARCHI POST -----------------------------------------------------------  -->

<div id="deletePostWrapper">
    <div id="deletePostWindow">
        <img width="20%" src="{{asset('/images/icons/disappointed_200_transparent.gif')}}" alt="" >
        <p>Are you sure?</p>
        <div id="deletePostButtons">
            <button id="confirmDelete" onclick="confirmDeletePost()">Delete!</button>
            <button id="cancelDelete" onclick="cancelDeletePost()">Cancel</button>
        </div>
    </div>
   
    <div id="deletePostHorizontalLines">
        <div id="deletePostHorizontalLines1"></div>
    </div>
    <div id="deletePostVerticalLines">
        <div id="deletePostVerticalLines1"></div>
    </div>
</div>