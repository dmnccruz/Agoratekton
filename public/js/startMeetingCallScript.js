// PUSHER SCRIPT---------------------------------------------------------

Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '420333140913464ba6be',
    cluster: 'ap2',
    encrypted: true,
});

// START MEETING PUSHER SCRIPT---------------------------------------------------------

window.Echo.private('callChannelstartMeeting.' + receiverIdStartMeeting)
    .listen('StartMeeting', (e) => {
        document.getElementById('meetingDoors').firstElementChild.style.left = "-2000px";
        document.getElementById('meetingDoors').lastElementChild.style.right = "-2000px";
        document.getElementById('waitingStart').style.opacity = "0";
        // console.log(1234)
})

if ('/meeting-room/' + callerMeetingId + '/' + receiverId === meetingPath) {
document.getElementById('startButtonFake').addEventListener('click', function(e){
    fetch("/startMeeting/" + localStorage.getItem('recId'), {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        document.getElementById('meetingDoors').firstElementChild.style.left = "-2000px";
        document.getElementById('meetingDoors').lastElementChild.style.right = "-2000px";
        document.getElementById('startButtonFake').style.opacity = "0";
        // console.log(123)
    });
})

}

// END MEETING PUSHER SCRIPT---------------------------------------------------------

window.Echo.private('callChannelendMeeting.' + receiverIdStartMeeting)
    .listen('EndMeeting', (e) => {
        document.getElementById('meetingDoors').firstElementChild.style.left = "0px";
        document.getElementById('meetingDoors').lastElementChild.style.right = "0px";
        console.log("endrf")

        window.document.body.insertAdjacentHTML( 'afterbegin', `<div id="endMeeting">Meeting has ended. Redirecting in 5 seconds...</div>`);

        setTimeout(function(){ 	
            localStorage.removeItem('recId')
            localStorage.removeItem('callerId')
            localStorage.removeItem('meetingId')
            localStorage.removeItem('userId')
            window.location.href="/timeline";
        }, 4000)
})

document.getElementById('leaveButtonContainer').addEventListener("dblclick", function() {  
    fetch("/endMeeting/" + localStorage.getItem('userId'), {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        document.getElementById('meetingDoors').firstElementChild.style.left = "0px";
        document.getElementById('meetingDoors').lastElementChild.style.right = "0px";
        console.log("ender")

        window.document.body.insertAdjacentHTML( 'afterbegin', `<div id="endMeeting">Meeting has ended. Redirecting in 5 seconds...</div>`);

        setTimeout(function(){ 	
            window.location.href="/timeline";
            localStorage.removeItem('recId')
            localStorage.removeItem('callerId')
            localStorage.removeItem('meetingId')
            localStorage.removeItem('userId')
        }, 4000)
    });
})

// ADD NOTE PUSHER SCRIPT---------------------------------------------------------

window.Echo.private('addNoteMeeting.' + receiverIdStartMeeting)
    .listen('AddNote', (e) => {
        console.log("note receiver")
        let randomNumber = Math.floor(Math.random() * (2 - -2 + 1)) -2;

        if(receiverIdStartMeeting === localStorage.getItem('callerId')) {
            var newNote = document.createElement("div");
            newNote.innerHTML = `<div class="insertedNote2" style="transform: scale(1) rotate(` + randomNumber +`deg); animation: insertedNote ease 1s forwards;" onMouseOver="this.style.transform='scale(1.1) rotate(0deg)'" onMouseOut="this.style.transform='scale(1) rotate(` + randomNumber +`deg)'">` + receiverName + ": " + e.noteBody + `</div>`;
            notesActualContainer2.appendChild(newNote);
        }

        else {
            var newNote = document.createElement("div");
            newNote.innerHTML = `<div class="insertedNote" style="transform: scale(1) rotate(` + randomNumber +`deg); animation: insertedNote ease 1s forwards;" onMouseOver="this.style.transform='scale(1.1) rotate(0deg)'" onMouseOut="this.style.transform='scale(1) rotate(` + randomNumber +`deg)'">` + localStorage.getItem('callerName2') + ": " + e.noteBody + `</div>`;
            notesActualContainer2.appendChild(newNote);
        }
})

document.getElementById('notesInputIcon').addEventListener("click", function() {  
    fetch("/addNote/" + localStorage.getItem('userId') + "/" +  notesInputMain.value, {
        method: "GET",
    }).then( function(response){
        return response.text();
    }).then( function(data){
        console.log("note sender")
        let randomNumber = Math.floor(Math.random() * (2 - -2 + 1)) -2;

        if(receiverIdStartMeeting === localStorage.getItem('callerId')) {
            var newNote = document.createElement("div");
            newNote.innerHTML = `<div class="insertedNote" style="transform: scale(1) rotate(` + randomNumber +`deg); animation: insertedNote ease 1s forwards;" onMouseOver="this.style.transform='scale(1.1) rotate(0deg)'" onMouseOut="this.style.transform='scale(1) rotate(` + randomNumber +`deg)'">` + "You(" + receiverIdStartMeetingName + "): " +  notesInputMain.value + `</div>`;
            notesActualContainer2.appendChild(newNote);
        }

        else {
            var newNote = document.createElement("div");
            newNote.innerHTML = `<div class="insertedNote2" style="transform: scale(1) rotate(` + randomNumber +`deg); animation: insertedNote ease 1s forwards;" onMouseOver="this.style.transform='scale(1.1) rotate(0deg)'" onMouseOut="this.style.transform='scale(1) rotate(` + randomNumber +`deg)'">` + "You(" + receiverIdStartMeetingName + "): " + notesInputMain.value + `</div>`;
            notesActualContainer2.appendChild(newNote);
        }

        notesInputMain.value=""

    });
})
