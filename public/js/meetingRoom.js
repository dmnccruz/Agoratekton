document.getElementById('leaveButtonContainer').addEventListener("mouseover", function() {  
	document.getElementById('navBar').style.background = "rgba(190, 75, 75, 0.5)";
})

document.getElementById('leaveButtonContainer').addEventListener("mouseout", function() {  
	document.getElementById('navBar').style.background = "rgba(150, 148, 142, 0.7)";
})

document.getElementById('color00').nextElementSibling.style.opacity = "1";
document.getElementById('color00').nextElementSibling.style.border = "2px dashed rgb(49, 49, 49)";

function opacityColor(ele) {
	ele.nextElementSibling.style.opacity = "1";
	ele.nextElementSibling.style.border = "2px dashed rgb(49, 49, 49)";

	var children = document.getElementById('colorSwatch').children

	for (i = 0; i < children.length; i+=2) {
		if(children[i].checked === false) {
			children[i].nextElementSibling.style.opacity = ".5"
			children[i].nextElementSibling.style.border = "1px dashed rgb(49, 49, 49)";
		}
	}
}

const notesInputIconRemove = document.getElementById('notesInputIconRemove')
const notesInputIcon = document.getElementById('notesInputIcon')
const notesInputMain = document.getElementById('notesInputMain')
const notesContainer = document.getElementById('notesContainer')
const notesActualContainer2 = document.getElementById('notesActualContainer2')

notesInputIconRemove.addEventListener("click", function() {  
	notesInputIcon.style.top = "-300px";
	notesInputIconRemove.style.top = "-300px";

	setTimeout(function(){ 	
		notesInputMain.style.width = "0px";
	}, 250)
})

notesContainer.addEventListener("click", function() {  
	notesInputIcon.style.top = "0px";
	notesInputIconRemove.style.top = "0px";

	setTimeout(function(){ 	
		notesInputMain.style.width = "300px";
	}, 250)
})

// notesInputIcon.addEventListener("click", function() {  

// 	let randomNumber = Math.floor(Math.random() * (2 - -2 + 1)) -2;

// 	// notesActualContainer2.innerHTML += `<div class="insertedNote" style="transform: scale(1) rotate(` + randomNumber +`deg); animation: insertedNote ease 1s forwards;" onMouseOver="this.style.transform='scale(1.1) rotate(0deg)'" onMouseOut="this.style.transform='scale(1) rotate(` + randomNumber +`deg)'">` + notesInputMain.value + `</div>`

//     var newNote = document.createElement("div");
//     newNote.innerHTML = `<div class="insertedNote" style="transform: scale(1) rotate(` + randomNumber +`deg); animation: insertedNote ease 1s forwards;" onMouseOver="this.style.transform='scale(1.1) rotate(0deg)'" onMouseOut="this.style.transform='scale(1) rotate(` + randomNumber +`deg)'">` + notesInputMain.value + `</div>`;
//     notesActualContainer2.appendChild(newNote);

// 	notesInputMain.value=""
// })

document.getElementById('leaveButtonContainer').addEventListener("click", function() {  
	document.getElementById('leaveButtonContainerWord').textContent = "click again to confirm";
	// document.getElementById('leaveButtonContainerWord').style.textShadow = "rgb(255, 181, 181)";
	// document.getElementById('leaveButtonContainerWord').style.color = "rgb(255, 146, 146)";

	setTimeout(function(){ 	
		document.getElementById('leaveButtonContainerWord').textContent = "end meeting";
	}, 2000)
})

// document.getElementById('leaveButtonContainer').addEventListener("dblclick", function() {  
// 	document.getElementById('leaveButtonContainerWord').textContent = "click again to confirm";
// 	document.getElementById('meetingDoors').firstElementChild.style.left = "0px";
// 	document.getElementById('meetingDoors').lastElementChild.style.right = "0px";
// })




