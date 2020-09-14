// console.log(123123123)
// console.log(123123123)
// console.log(123123123)
// console.log(123123123)
// console.log(123123123)

// window.Laravel = {
//     csrfToken: "{{ csrf_token() }}"
// };

// PUSHER SCRIPT---------------------------------------------------------

Pusher.logToConsole = true;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '420333140913464ba6be',
    cluster: 'ap2',
    // encrypted: true,
    // auth: {
    //     headers: {
    //     //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //       'X-CSRF-TOKEN': ("_token", "{{ csrf_token() }}"),
    //     },
    //   },
    
});

// SET MEETING PUSHER SCRIPT---------------------------------------------------------

const setMeetingPopUp = document.getElementById('setMeetingPopUp')
const setExitButton = document.getElementById('setExitButton')

function setCall(setThisCall) {
    localStorage.setItem('recName', setThisCall.getAttribute('data-name'))
    localStorage.setItem('recId', setThisCall.getAttribute('data-id'))
    localStorage.setItem('recAvatar', setThisCall.getAttribute('data-userAvatar'))
    localStorage.setItem('myName', setThisCall.getAttribute('data-userName'))
    localStorage.setItem('callerId', setThisCall.getAttribute('data-userId'))
    localStorage.setItem('myAvatar', setThisCall.getAttribute('data-myAvatar'))

    var recAvatar = localStorage.getItem('recAvatar')
    var recName = localStorage.getItem('recName')

    // document.getElementById('userAvatar').setAttribute('src', `{{asset(/images/avatar.png)}}`)
    document.getElementById('userAvatar').setAttribute('src', recAvatar)
    document.getElementById('topicInputBox').setAttribute('placeholder', "say something to " + recName )

    setMeetingPopUp.style.display = "flex";
    setMeetingPopUp.style.pointerEvents = "all"
}

function exitSetCall() {
        setMeetingPopUp.style.opacity = "0"

        localStorage.removeItem('recName')
        localStorage.removeItem('recId')
        localStorage.removeItem('recAvatar')
        localStorage.removeItem('myName') 
        localStorage.removeItem('callerId') 
        localStorage.removeItem('myAvatar') 

    setTimeout(function(){ 
        setMeetingPopUp.style.pointerEvents = "none"
        setMeetingPopUp.style.display = "none"
        setMeetingPopUp.style.opacity = "1"

    }, 1500);
}

window.Echo.private('meetChannel.' + receiverId)
    .listen('SetMeeting', (e) => {
        let callerName = e.callerName
        let callerid = e.callerid
        let dateInput = e.dateInput
        let recId = e.recId
        let recName = e.recName
        let topic = e.topic
        let callerAvatar = e.callerAvatar

        localStorage.setItem("callerName", callerName);
        localStorage.setItem("callerid", callerid);
        localStorage.setItem("dateInput", dateInput);
        localStorage.setItem("recId", recId);
        localStorage.setItem("recName", recName);
        localStorage.setItem("topic", topic);

        document.getElementById('requestTopic').textContent = localStorage.getItem('topic')
        document.getElementById('requestDate').textContent = localStorage.getItem('dateInput')
        document.getElementById('requestName').textContent = "Request from " + localStorage.getItem('callerName')

        // var callerAvatar2 = callerAvatar.split('&').join('/')
        // var callerAvatar3 = callerAvatar2.split('%').join('.')

        var callerAvatar2 = callerAvatar.split('z').join('/')
        var callerAvatar3 = callerAvatar2.split('x').join('.')

        document.getElementById('requestAvatar').setAttribute('src', callerAvatar3)

        requestMeetingPopUp.style.display = "flex";
        requestMeetingPopUp.style.pointerEvents = "all"
})

// function setMeet(callUser){
function setMeet(){
    console.log("hotdog234")

    let recId = localStorage.getItem('recId')
    let recName = localStorage.getItem('recName')
    let callerId = localStorage.getItem('callerId')
    let myName = localStorage.getItem('myName')
    let myAvatar = localStorage.getItem('myAvatar')
    let dateInput = document.getElementById('dateInput').value
    let topic = document.getElementById('topicInputBox').value

    localStorage.setItem("dateInput", dateInput);

    // var myAvatar2 = myAvatar.split('/').join('&')
    // var myAvatar3 = myAvatar2.split('.').join('%')

    var myAvatar2 = myAvatar.split('/').join('z')
    var myAvatar3 = myAvatar2.split('.').join('x')


    // fetch("/setmeet/" + recId + "/" + recName + "/" + callerId + "/" + myName + "/" + dateInput + "/" + topic, {
    fetch("/setmeet/" + recId + "/" + recName + "/" + callerId + "/" + myName + "/" + dateInput + "/" + topic + "/" + myAvatar3, {
        method: "GET",
    }).then( function(response){
        console.log("hotdog")
        return response.text();
    }).then( function(data){
        console.log(data);
    });

    document.getElementById('requestSent').style.display = "flex"

	setTimeout(function(){ 
		setMeetingPopUp.style.opacity = "0"
	}, 1500);

	setTimeout(function(){ 
		setMeetingPopUp.style.pointerEvents = "none"
		setMeetingPopUp.style.display = "none"
        setMeetingPopUp.style.opacity = "1"
        document.getElementById('requestSent').style.display = "none"
		dateInput.value=undefined;
		document.getElementById('topicInputBox').value = ""
	}, 2000);
}

// DECLINE AND APPROVE REQUEST PUSHER SCRIPT---------------------------------------------------------

window.Echo.private('declineRequestChannel.' + receiverId)
    .listen('DeclineRequest', (e) => {
        console.log(e)
        console.log('you got declined')
        localStorage.removeItem("recName");
        localStorage.removeItem("recAvatar");
        localStorage.removeItem("recId");
        localStorage.removeItem("callerId");
        localStorage.removeItem("myAvatar");
        localStorage.removeItem("myName");
        localStorage.removeItem("dateInput");

        declinedRequestPopup.style.pointerEvents = "all"
		declinedRequestPopup.style.display = "flex"
})

function declineRequest() { 

    fetch("/declineRequest/" + localStorage.getItem('callerid'), {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        console.log('you declined');
    });

    setTimeout(function(){ 
        requestMeetingPopUp.style.opacity = "0"
        localStorage.removeItem("callerName");
        localStorage.removeItem("callerid");
        localStorage.removeItem("dateInput");
        localStorage.removeItem("recId");
        localStorage.removeItem("recName");
        localStorage.removeItem("topic");

   
	}, 1000);

	setTimeout(function(){ 
		requestMeetingPopUp.style.pointerEvents = "none"
		requestMeetingPopUp.style.display = "none"
        requestMeetingPopUp.style.opacity = "1"
    }, 1500);
}

function closeRequest(closeThis) {
    setTimeout(function(){ 
        closeThis.parentElement.parentElement.style.opacity = "0"
	}, 1000);
	setTimeout(function(){ 
        closeThis.parentElement.parentElement.style.pointerEvents = "none"
        closeThis.parentElement.parentElement.style.display = "none"
        closeThis.parentElement.parentElement.style.opacity = "1"
    }, 1500);
}




window.Echo.private('acceptRequestChannel.' + receiverId)
    .listen('AcceptRequest', (e) => {
        console.log(e)
        console.log('you got approved!')

        var meetingsPlaceholder = document.getElementById('meetingsPlaceholder')
        meetingsPlaceholder.insertAdjacentHTML("afterend", `<div id="meetingsContent">•` + localStorage.getItem('dateInput') + ` - ` + localStorage.getItem('recName') + `</div>`
        )
        document.getElementById('meetingsPlaceholder').style.display = "none"

        localStorage.removeItem("recAvatar");
        localStorage.removeItem("recId");
        localStorage.removeItem("callerId");
        localStorage.removeItem("myAvatar");
        localStorage.removeItem("myName");
        localStorage.removeItem("recName");
        localStorage.removeItem("dateInput");

        approvedRequestPopup.style.pointerEvents = "all"
		approvedRequestPopup.style.display = "flex"
})

function acceptRequest() {

    fetch("/acceptRequest/" + localStorage.getItem('callerid'), {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        console.log('you accepted');
    });

    fetch("/storeRequest/" + localStorage.getItem('callerid') + "/" + localStorage.getItem('recId') + "/" + localStorage.getItem('callerName') + "/" + localStorage.getItem('recName') + "/" + localStorage.getItem('dateInput') + "/" + localStorage.getItem('topic'), {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        console.log('you accepted');
    });

    setTimeout(function(){ 
        requestMeetingPopUp.style.opacity = "0"
	}, 1000);

	setTimeout(function(){ 
		requestMeetingPopUp.style.pointerEvents = "none"
		requestMeetingPopUp.style.display = "none"
        requestMeetingPopUp.style.opacity = "1"
    }, 1500);
    
    var meetingsPlaceholder = document.getElementById('meetingsPlaceholder')
    meetingsPlaceholder.insertAdjacentHTML("afterend", `<div id="meetingsContent">•` + localStorage.getItem('dateInput') + ` - ` + localStorage.getItem('callerName') + `</div>`
    )
    document.getElementById('meetingsPlaceholder').style.display = "none"

    localStorage.removeItem("recId");
    localStorage.removeItem("callerid");
    localStorage.removeItem("callerName");
    localStorage.removeItem("recName");
    localStorage.removeItem("dateInput");
    localStorage.removeItem("topic");
}

function closeApprovedRequest(closeThis2){
    setTimeout(function(){ 
        closeThis2.parentElement.parentElement.style.opacity = "0"
	}, 1000);
	setTimeout(function(){ 
        closeThis2.parentElement.parentElement.style.pointerEvents = "none"
        closeThis2.parentElement.parentElement.style.display = "none"
        closeThis2.parentElement.parentElement.style.opacity = "1"
    }, 1500);
}




// CALL PUSHER SCRIPT---------------------------------------------------------

window.Echo.private('callChannel.' + receiverId)
    .listen('CallEvent', (e) => {
        console.log(e.callerId2)
        let receiverId = e.receiverId2
        let callerId2 = e.callerId2
        let callerId2meeting = e.meetingId2
        let callerName2 = e.callerName2

        localStorage.setItem("callerId", callerId2);
        localStorage.setItem("meetingId", callerId2meeting);
        localStorage.setItem("userId", callerId2);
        localStorage.setItem("callerName2", callerName2);
        
        document.getElementById('meetingPopUpReceiverContent').textContent = e.callerName2 + " wants to have a meeting with you.";
        // document.getElementById('meetingPopUpReceiver').style.zIndex = '1000';
        // return document.getElementById('meetingPopUpReceiver').style.opacity = '100';
        meetingPopUpReceiver.style.display = "flex";
        meetingPopUpReceiver.style.pointerEvents = "all"
})

const meetingPopUpCaller = document.getElementById('meetingPopUpCaller');
const meetingPopUpCallerContent = document.getElementById('meetingPopUpCallerContent');
const callButtons = document.querySelectorAll('.callButton');

function makeCall(callUser){
    let recId = localStorage.getItem('recId')
    let recieverName = localStorage.getItem('recName')
    let callerName = callUser.getAttribute('data-userName');
    let callerId = callUser.getAttribute('data-userId');
    let meetingId = callUser.getAttribute('data-meetingId');

    localStorage.removeItem('recName')
    localStorage.removeItem('recAvatar')
    localStorage.removeItem('myName') 
    localStorage.removeItem('myAvatar') 

    setMeetingPopUp.style.opacity = "0"

    setTimeout(function(){ 
        setMeetingPopUp.style.pointerEvents = "none"
        setMeetingPopUp.style.display = "none"
        setMeetingPopUp.style.opacity = "1"

    }, 1500);

    fetch("/call/" + recId + "/" + callerName + "/" + callerId + "/" + meetingId, {
        method: "GET",
        // body: data
    }).then( function(response){
        return response.text();
    }).then( function(data){
        // console.log(data);
        meetingPopUpCallerContent.textContent = "Inviting " + recieverName +" to a meeting."

        meetingPopUpCaller.style.display ="flex"
        meetingPopUpCaller.style.pointerEvents ="all"

        localStorage.setItem("recId", recId);
        localStorage.setItem("callerId", callerId);
        localStorage.setItem("meetingId", meetingId);
        localStorage.setItem("userId", recId);
    });
}



// DROP CALL PUSHER SCRIPT---------------------------------------------------------

window.Echo.private('callChannelCancel.' + receiverId)
    .listen('CancelCall', (e) => {
        console.log(e.callerId2cancel)
        console.log("cancelling call")
        localStorage.removeItem("callerId");
        localStorage.removeItem("meetingId");
        localStorage.removeItem("userId");

        setTimeout(function(){ 
            document.getElementById('callWrapper').style.background = "rgba(160, 51, 51, 0.432)"
            document.getElementById('meetingPopUpReceiverContent').textContent = "Call was dropped."
        }, 500);

        setTimeout(function(){ 
            meetingPopUpReceiver.style.opacity = "0"
        }, 1500);

        setTimeout(function(){ 
            document.getElementById('callWrapper').style.background = "rgba(124, 124, 124, 0.5)"
            meetingPopUpReceiver.style.pointerEvents = "none"
            meetingPopUpReceiver.style.display = "none"
            meetingPopUpReceiver.style.opacity = "1"
        }, 3000);

})

const cancelButton = document.getElementById('cancelButton');

cancelButton.addEventListener('click', function(e){
    console.log('cancel');

    let recId = localStorage.getItem("recId");

    fetch("/cancelCall/" + recId, {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        console.log(recId);

        // console.log('cancelasd');

        setTimeout(function(){ 
            meetingPopUpCaller.style.opacity = "0"
        }, 750);

        setTimeout(function(){ 
            meetingPopUpCaller.style.pointerEvents = "none"
            meetingPopUpCaller.style.display = "none"
            meetingPopUpCaller.style.opacity = "1"
        }, 1500);

        localStorage.removeItem("recId");
        localStorage.removeItem("callerId");
        localStorage.removeItem("meetingId");
        localStorage.removeItem("userId");

    });
})

// DECLINE CALL PUSHER SCRIPT---------------------------------------------------------
// const callerId = localStorage.getItem('2')
const callerWrapper = document.getElementById('callerWrapper');

window.Echo.private('callChannelDecline.' + receiverId)
    .listen('DeclineCall', (e) => {

        localStorage.removeItem("callerId");
        localStorage.removeItem("recId");
        localStorage.removeItem("meetingId");
        localStorage.removeItem("userId");

        setTimeout(function(){ 
            callerWrapper.style.background = "rgba(160, 51, 51, 0.432)"
            meetingPopUpCallerContent.textContent = "Your call has been declined."
        }, 500);

        setTimeout(function(){ 
            meetingPopUpCaller.style.opacity = "0"
        }, 1500);

        setTimeout(function(){ 
            callerWrapper.style.background = "rgba(124, 124, 124, 0.5)"
            meetingPopUpCaller.style.pointerEvents = "none"
            meetingPopUpCaller.style.display = "none"
            meetingPopUpCaller.style.opacity = "1"
        }, 3000);

        return console.log("hotdog");
})

const declineButton = document.getElementById('declineButton');

declineButton.addEventListener('click', function(e){

    fetch("/declineCall/" + localStorage.getItem('callerId'), {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){

        console.log('declined');
        localStorage.removeItem("callerId");
        localStorage.removeItem("meetingId");
        localStorage.removeItem("userId");
        

        setTimeout(function(){ 
            meetingPopUpReceiver.style.opacity = "0"
        }, 750);

        setTimeout(function(){ 
            meetingPopUpReceiver.style.pointerEvents = "none"
            meetingPopUpReceiver.style.display = "none"
            meetingPopUpReceiver.style.opacity = "1"
        }, 1500);

        return console.log("hamburger");

    });
})

// MEETING REDIRECT CALL PUSHER SCRIPT---------------------------------------------------------

window.Echo.private('callChannelMeeting.' + receiverId)
    .listen('MeetingRoom', (e) => {
        document.getElementById('meetingPopUpCaller').style.opacity ="0"
        document.getElementById('meetingPopUpCaller').style.zIndex ="-50"
        console.log("redirecting");
        window.location.href="/meeting-room" + "/" + localStorage.getItem('meetingId') + "/" + localStorage.getItem('recId');
})

const acceptButton = document.getElementById('acceptButton');

acceptButton.addEventListener('click', function(e){

    fetch("meetingRoom/" + localStorage.getItem('meetingId') + "/" + localStorage.getItem('callerId') + "/" + receiverId, {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        document.getElementById('meetingPopUpReceiver').style.opacity ="0"
        document.getElementById('meetingPopUpReceiver').style.zIndex ="-50"
        console.log('redirecting');
        window.location.href="/meeting-room" + "/" + localStorage.getItem('meetingId') + "/" + receiverId;
    });
})

