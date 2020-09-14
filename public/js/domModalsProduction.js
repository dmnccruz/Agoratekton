const createArchiPostWrapper = document.getElementById('createArchiPostWrapper')
const createJobButton = document.getElementById('createJobButton')
const createProductButton = document.getElementById('createProductButton')
const createProjectButton = document.getElementById('createProjectButton')

const updateProjectButton = document.getElementById('updateProjectButton')
const updateJobButton = document.getElementById('updateJobButton')
const updateProductButton = document.getElementById('updateProductButton')

const createSmallPhotosWrapper = document.getElementById('createSmallPhotosWrapper')
const additionalPhotosP = document.getElementById('additionalPhotosP')

function showcaseyourproject(){
	createArchiPostWrapper.style.display = "flex";
	createArchiPostWrapper.style.pointerEvents = "all"
	createProjectButton.style.display = "flex";
	createProjectButton.style.pointerEvents = "all"
}

function createJob(){
	createArchiPostWrapper.style.display = "flex";
	createArchiPostWrapper.style.pointerEvents = "all"
	createJobButton.style.display = "flex";
	createJobButton.style.pointerEvents = "all"

	createSmallPhotosWrapper.style.display = "none";
	createSmallPhotosWrapper.style.pointerEvents = "none"
	additionalPhotosP.style.display = "none";
	additionalPhotosP.style.pointerEvents = "none"
}

function createProduct(){
	createArchiPostWrapper.style.display = "flex";
	createArchiPostWrapper.style.pointerEvents = "all"
	createProductButton.style.display = "flex";
	createProductButton.style.pointerEvents = "all"

	createSmallPhotosWrapper.style.display = "none";
	createSmallPhotosWrapper.style.pointerEvents = "none"
	additionalPhotosP.style.display = "none";
	additionalPhotosP.style.pointerEvents = "none"
}

function closeShowCaseYourProject(){
	const createCoverPhoto = document.getElementById('createPhoto1input')
	const photo1 = document.getElementById('createPhoto1ainput')
	const photo2 = document.getElementById('createPhoto2ainput')
	const photo3 = document.getElementById('createPhoto3ainput')
	const imageCover = document.getElementById('output1');
    const image1 = document.getElementById('output1a');
    const image2 = document.getElementById('output1b');
	const image3 = document.getElementById('output1c');

	createSmallPhotosWrapper.style.display = "flex";
	createSmallPhotosWrapper.style.pointerEvents = "all"
	additionalPhotosP.style.display = "flex";
	additionalPhotosP.style.pointerEvents = "all"

	updateJobButton.style.display = "none";
	updateJobButton.style.pointerEvents = "none"
	updateProjectButton.style.display = "none";
	updateProjectButton.style.pointerEvents = "none"
	updateProductButton.style.display = "none";
	updateProductButton.style.pointerEvents = "none"

	createProjectButton.style.display = "none";
	createProjectButton.style.pointerEvents = "none"
	createJobButton.style.display = "none";
	createJobButton.style.pointerEvents = "none"
	createProductButton.style.display = "none";
	createProductButton.style.pointerEvents = "none"

	document.getElementById('projectTitleInput').value = "";
	document.getElementById('projectBriefInput').value = "";
	createCoverPhoto.value = "";
	photo1.value = "";
	photo2.value = "";
	photo3.value = "";

	imageCover.src = '/images/icons/download_200_transparent.gif'
	imageCover.setAttribute('width', "25%")
	imageCover.removeAttribute('height')
	
	image1.src = '/images/icons/download_200_transparent.gif'
	image1.setAttribute('width', "30%")
	image1.removeAttribute('height')
	
	image2.src = '/images/icons/download_200_transparent.gif'
	image2.setAttribute('width', "30%")
	image2.removeAttribute('height')
	
	image3.src = '/images/icons/download_200_transparent.gif'
	image3.setAttribute('width', "30%")
	image3.removeAttribute('height')
	
	createArchiPostWrapper.style.display = "none";
	createArchiPostWrapper.style.pointerEvents = "none"
}

function clickCoverPhoto() {
	document.getElementById('createPhoto1input').click()
	console.log(1)
}

function clickPhoto1() {
	document.getElementById('createPhoto1ainput').click()
	console.log(2)
}

function clickPhoto2() {
	document.getElementById('createPhoto2ainput').click()
	console.log(3)
}

function clickPhoto3() {
	document.getElementById('createPhoto3ainput').click()
	console.log(4)
}

const composeMessageMainContainer = document.getElementById('composeMessageMainContainer')
const composeMessageHorizontalLines = document.getElementById('composeMessageHorizontalLines')
const composeMessageVerticalLines = document.getElementById('composeMessageVerticalLines')
const sendMessage = document.getElementById('sendMessage')
const messageInput = document.getElementById('messageInput')

function openMessaging(openMessage){
	composeMessageMainContainer.firstElementChild.style.display = "none";
	composeMessageMainContainer.style.display = "flex";
	composeMessageMainContainer.style.pointerEvents = "all"
	console.log(openMessage.getAttribute('data-id'))
	console.log(openMessage.getAttribute('data-name'))
	sendMessage.setAttribute("data-id", openMessage.getAttribute('data-id'))
	sendMessage.setAttribute("data-name", openMessage.getAttribute('data-name'))
	console.log(sendMessage.getAttribute('data-id'))
	console.log(sendMessage.getAttribute('data-name'))
	sendMessage.parentElement.previousElementSibling.textContent = "Type your message for: " + sendMessage.getAttribute('data-name')
}

function messageSent(sendButton){

	fetch("/sendmessage/" + myId + "/" + sendMessage.getAttribute('data-id') + "/" + messageInput.value, 
	{
		method: 'GET',

	}).then( function(response){
		return response.text();
	}).then( function(data){
		console.log(data);
	});

	sendButton.parentElement.parentElement.previousElementSibling.style.display = "flex"

	setTimeout(function(){ 
		composeMessageMainContainer.style.opacity = "0"

	}, 1500);

	setTimeout(function(){ 
		composeMessageMainContainer.style.pointerEvents = "none"
		composeMessageMainContainer.style.display = "none"
		composeMessageMainContainer.style.opacity = "1"
		messageInput.value=""
	}, 2000);
}

document.addEventListener("keydown", ({key}) => {
	if (key === "Escape") {
		composeMessageMainContainer.style.opacity = "0"
		// createArchiPostWrapper.style.opacity = "0"

		const createCoverPhoto = document.getElementById('createPhoto1input')
		const photo1 = document.getElementById('createPhoto1ainput')
		const photo2 = document.getElementById('createPhoto2ainput')
		const photo3 = document.getElementById('createPhoto3ainput')
		const imageCover = document.getElementById('output1');
		const image1 = document.getElementById('output1a');
		const image2 = document.getElementById('output1b');
		const image3 = document.getElementById('output1c');

		createSmallPhotosWrapper.style.display = "flex";
		createSmallPhotosWrapper.style.pointerEvents = "all"
		additionalPhotosP.style.display = "flex";
		additionalPhotosP.style.pointerEvents = "all"

		updateJobButton.style.display = "none";
		updateJobButton.style.pointerEvents = "none"
		updateProjectButton.style.display = "none";
		updateProjectButton.style.pointerEvents = "none"
		updateProductButton.style.display = "none";
		updateProductButton.style.pointerEvents = "none"

		createProjectButton.style.display = "none";
		createProjectButton.style.pointerEvents = "none"
		createJobButton.style.display = "none";
		createJobButton.style.pointerEvents = "none"
		createProductButton.style.display = "none";
		createProductButton.style.pointerEvents = "none"

		document.getElementById('projectTitleInput').value = "";
		document.getElementById('projectBriefInput').value = "";
		createCoverPhoto.value = "";
		photo1.value = "";
		photo2.value = "";
		photo3.value = "";

		imageCover.src = '/images/icons/download_200_transparent.gif'
		imageCover.setAttribute('width', "25%")
		imageCover.removeAttribute('height')
		
		image1.src = '/images/icons/download_200_transparent.gif'
		image1.setAttribute('width', "30%")
		image1.removeAttribute('height')
		
		image2.src = '/images/icons/download_200_transparent.gif'
		image2.setAttribute('width', "30%")
		image2.removeAttribute('height')
		
		image3.src = '/images/icons/download_200_transparent.gif'
		image3.setAttribute('width', "30%")
		image3.removeAttribute('height')
		
		createArchiPostWrapper.style.display = "none";
		createArchiPostWrapper.style.pointerEvents = "none"

	
		setTimeout(function(){ 
			composeMessageMainContainer.style.pointerEvents = "none"
			composeMessageMainContainer.style.display = "none"
			composeMessageMainContainer.style.opacity = "1"
			// createArchiPostWrapper.style.display = "none";
			// createArchiPostWrapper.style.pointerEvents = "none"
			// createArchiPostWrapper.style.opacity = "1"
			messageInput.value=""
		}, 750);
	}
})

var messageInput2 = tippy(document.getElementById('messageInput'),{
    content: 'message cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var topicInputBox2 = tippy(document.getElementById('topicInputBox'),{
    content: 'add a message. be friendly!', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var dateInput2 = tippy(document.getElementById('dateInput'),{
    content: 'please select date.', 
    trigger: 'manual',
    placement: 'top',
    animation: 'scale',
});

sendMessage.disabled = true;
const setDate = document.getElementById('setDate')
const topicInputBox = document.getElementById('topicInputBox')

messageInput.addEventListener('blur', function(){
    if(messageInput.value === ""){
		messageInput2.show();
        messageInput.style.animation = "shakeAndColor .5s forwards";
		sendMessage.disabled = true;
    }
    else {
        messageInput.style.animation = "none";
		messageInput2.hide();
		sendMessage.disabled = false;
    }
});

// document.getElementById('setDate').disabled = true;

setDate.addEventListener('click', function(){
    if(dateInput.value === undefined && topicInputBox.value === ""){
		dateInput2.show();
		topicInputBox2.show();
		setDate.style.animation = "shakeAndColor .5s forwards";
		topicInputBox.style.animation = "shakeAndColor .5s forwards";
		// document.getElementById('setDate').disabled = true;
		
	}
	else if(dateInput.value !== undefined && topicInputBox.value === "") {
		topicInputBox2.show();
		topicInputBox.style.animation = "shakeAndColor .5s forwards";
		setDate.style.animation = "none";
		// document.getElementById('setDate').disabled = true;

	}
	else if(dateInput.value === undefined && topicInputBox.value !== "") {
		dateInput2.show();
		setDate.style.animation = "shakeAndColor .5s forwards";
		topicInputBox.style.animation = "none";
		// document.getElementById('setDate').disabled = true;

	}
    else if(dateInput.value !== undefined && topicInputBox.value !== ""){
		setDate.style.animation = "none";
		topicInputBox.style.animation = "none";
		dateInput2.hide();
		topicInputBox2.hide();
		// document.getElementById('setDate').disabled = false;
		
		// setMeet(this)
		setMeet()
    }
});

var loadFile = function(event) {
    var image = document.getElementById('output');
    console.log(URL.createObjectURL(event.target.files[0]))
    image.src = URL.createObjectURL(event.target.files[0]);
};

var loadFile1 = function(event) {
    var image = document.getElementById('output1');
	console.log(URL.createObjectURL(event.target.files[0]))
    console.log(event.target.files[0])
	image.src = URL.createObjectURL(event.target.files[0]);
	image.setAttribute('width', "100%")
    image.setAttribute('height', "100%")
};

var loadFile1a = function(event) {
    var image = document.getElementById('output1a');
    console.log(URL.createObjectURL(event.target.files[0]))
    console.log(event.target.files[0])
    console.log(event.target.files[1])
    image.src = URL.createObjectURL(event.target.files[0]);
    image.setAttribute('width', "100%")
    image.setAttribute('height', "100%")
	// image.style.background = 'url("'+ URL.createObjectURL(event.target.files[0]); +'") no-repeat' 
	// console.log('uploaded file')
};

var loadFile1b = function(event) {
    var image = document.getElementById('output1b');
    console.log(URL.createObjectURL(event.target.files[0]))
	image.src = URL.createObjectURL(event.target.files[0]);
	image.setAttribute('width', "100%")
    image.setAttribute('height', "100%")
};

var loadFile1c = function(event) {
    var image = document.getElementById('output1c');
    console.log(URL.createObjectURL(event.target.files[0]))
	image.src = URL.createObjectURL(event.target.files[0]);
	image.setAttribute('width', "100%")
    image.setAttribute('height', "100%")
};

function createPost(create) {

	if(myRoleId === "1") {
		var postType = '2';
	}
	else if(myRoleId === "2") {
		var postType = '1';
	}
	else if(myRoleId === "3") {
		var postType = '3';
	}

	const myId = document.getElementById('idInput').value
	const posttitle = document.getElementById('projectTitleInput').value
	const projectBriefInput = document.getElementById('projectBriefInput').value
	const createCoverPhoto = document.getElementById('createPhoto1input')
	const photo1 = document.getElementById('createPhoto1ainput')
	const photo2 = document.getElementById('createPhoto2ainput')
	const photo3 = document.getElementById('createPhoto3ainput')
    const imageCover = document.getElementById('output1');
    const image1 = document.getElementById('output1a');
    const image2 = document.getElementById('output1b');
	const image3 = document.getElementById('output1c');
	const successPostArchi = document.getElementById('successPostArchi');
	const createArchiPostWindow = document.getElementById('createArchiPostWindow');

	let data = new FormData;
	// data.append("_token", "{{ csrf_token() }}")
	data.append("user_id", myId);
	data.append("postType", postType);
	data.append("posttitle", posttitle);
	data.append("summary", projectBriefInput);
	data.append("createCoverPhoto", createCoverPhoto.files[0]);
	data.append("photo1", photo1.files[0]);
	data.append("photo2", photo2.files[0]);
	data.append("photo3", photo3.files[0]);
	console.log(data)

	fetch("/add-post", {
		headers: {
			// "Content-Type": "application/json",
			// 'Content-Type': 'multipart/form-data',
			// "Accept": "application/json",
			// "X-Requested-With": "XMLHttpRequest",
			"X-CSRF-Token": $('input[name="_token"]').val(),
			// 'Content-Type': 'multipart/form-data'
		},
		method: "POST",
		credentials: "same-origin",
		body: data
	}).then( function(response){
		return response.text();
	}).then( function(data){
		console.log(data);
		var postData = JSON.parse(data)

		localStorage.setItem('postId', postData.id)
	});

	successPostArchi.style.display = "flex";

	setTimeout(function(){ 
		document.getElementById('projectTitleInput').value = "";
		document.getElementById('projectBriefInput').value = "";
		createCoverPhoto.value = "";
		photo1.value = "";
		photo2.value = "";
		photo3.value = "";
	
		imageCover.src = '/images/icons/download_200_transparent.gif'
		imageCover.setAttribute('width', "25%")
		imageCover.removeAttribute('height')
		
		image1.src = '/images/icons/download_200_transparent.gif'
		image1.setAttribute('width', "30%")
		image1.removeAttribute('height')
		
		image2.src = '/images/icons/download_200_transparent.gif'
		image2.setAttribute('width', "30%")
		image2.removeAttribute('height')
		
		image3.src = '/images/icons/download_200_transparent.gif'
		image3.setAttribute('width', "30%")
		image3.removeAttribute('height')

		successPostArchi.style.display = "none";

		createSmallPhotosWrapper.style.display = "flex";
		createSmallPhotosWrapper.style.pointerEvents = "all"
		additionalPhotosP.style.display = "flex";
		additionalPhotosP.style.pointerEvents = "all"
	
		createProjectButton.style.display = "none";
		createProjectButton.style.pointerEvents = "none"
	
		createJobButton.style.display = "none";
		createJobButton.style.pointerEvents = "none"
	
		createProductButton.style.display = "none";
		createProductButton.style.pointerEvents = "none"

		createArchiPostWrapper.style.display = "none";
		createArchiPostWrapper.style.pointerEvents = "none"

		document.getElementById('contentAll').innerHTML = `<div class="newPostBox magic-hover magic-hover__square"><a href=` + "/timeline/" + localStorage.getItem('postId') + `>Post created! View it here.</a></div>
		<div class="spacer2"></div>` + document.getElementById('contentAll').innerHTML;

		document.getElementById('contentJobs').innerHTML = `<div class="newPostBox magic-hover magic-hover__square"><a href=` + "/timeline/" + localStorage.getItem('postId') + `>Post created! View it here.</a></div>
		<div class="spacer2"></div>` + document.getElementById('contentJobs').innerHTML;

		document.getElementById('contentProjects').innerHTML = `<div class="newPostBox magic-hover magic-hover__square"><a href=` + "/timeline/" + localStorage.getItem('postId') + `>Post created! View it here.</a></div>
		<div class="spacer2"></div>` + document.getElementById('contentProjects').innerHTML;

		document.getElementById('contentProducts').innerHTML = `<div class="newPostBox magic-hover magic-hover__square"><a href=` + "/timeline/" + localStorage.getItem('postId') + `>Post created! View it here.</a></div>
		<div class="spacer2"></div>` + document.getElementById('contentProducts').innerHTML;

		console.log(localStorage.getItem('postId'))

		// localStorage.removeItem('postId')
	}, 2500);
}

function deletePost(deleteThis) {
	const deletePostWrapper = document.getElementById('deletePostWrapper')
	deletePostWrapper.style.display = "flex";
	deletePostWrapper.style.pointerEvents = "all"
	localStorage.setItem('deletePost', deleteThis.getAttribute('data-id'))
}

function cancelDeletePost() {
	// console.log("post delete cancelled")
	deletePostWrapper.style.display = "none";
	deletePostWrapper.style.pointerEvents = "none"
	localStorage.removeItem('deletePost')
}

function confirmDeletePost() {
	// console.log("post deleted")
	deletePostWrapper.style.display = "none";
	deletePostWrapper.style.pointerEvents = "none"

	var divs = document.getElementsByTagName("div");

	for(var i = 0; i < divs.length; i++){
		if(divs[i].getAttribute('data-id') === localStorage.getItem('deletePost') )
			divs[i].style.display = "none"
	}

	document.getElementById('contentAll').innerHTML = document.getElementById('contentAll').innerHTML;
	document.getElementById('contentJobs').innerHTML = document.getElementById('contentJobs').innerHTML;
	document.getElementById('contentProjects').innerHTML = document.getElementById('contentProjects').innerHTML;
	document.getElementById('contentProducts').innerHTML = document.getElementById('contentProducts').innerHTML;

	fetch("/deletepost/" + myId + "/" + localStorage.getItem('deletePost'), {
		method: 'GET',

	}).then( function(response){
		return response.text();
	}).then( function(data){
		console.log(data);
		localStorage.removeItem('deletePost')
	});
}

function updatePost(updateThis) {
	const imageCover = document.getElementById('output1');
    const image1 = document.getElementById('output1a');
    const image2 = document.getElementById('output1b');
	const image3 = document.getElementById('output1c');
	const posttitle = document.getElementById('projectTitleInput')
	const projectBriefInput = document.getElementById('projectBriefInput')

	localStorage.setItem('updatePost', updateThis.getAttribute('data-id'))

	if(myRoleId === "1") {
		updateJobButton.style.display = "flex";
		updateJobButton.style.pointerEvents = "all"
		
		createSmallPhotosWrapper.style.display = "none";
		createSmallPhotosWrapper.style.pointerEvents = "none"
		additionalPhotosP.style.display = "none";
		additionalPhotosP.style.pointerEvents = "none"

		createArchiPostWrapper.style.display = "flex";
		createArchiPostWrapper.style.pointerEvents = "all"

		posttitle.value = updateThis.getAttribute('data-posttitle')
		projectBriefInput.value = updateThis.getAttribute('data-summary')

		imageCover.src = updateThis.getAttribute('data-coverPhoto');
		imageCover.setAttribute('width', "100%")
		imageCover.setAttribute('height', "100%")
	}
	else if(myRoleId === "2") {
		updateProjectButton.style.display = "flex";
		updateProjectButton.style.pointerEvents = "all"

		createArchiPostWrapper.style.display = "flex";
		createArchiPostWrapper.style.pointerEvents = "all"

		posttitle.value = updateThis.getAttribute('data-posttitle')
		projectBriefInput.value = updateThis.getAttribute('data-summary')

		imageCover.src = updateThis.getAttribute('data-coverPhoto');
		imageCover.setAttribute('width', "100%")
		imageCover.setAttribute('height', "100%")

		image1.src = updateThis.getAttribute('data-photo1');
		image1.setAttribute('width', "100%")
		image1.setAttribute('height', "100%")

		image2.src = updateThis.getAttribute('data-photo2');
		image2.setAttribute('width', "100%")
		image2.setAttribute('height', "100%")

		image3.src = updateThis.getAttribute('data-photo3');
		image3.setAttribute('width', "100%")
		image3.setAttribute('height', "100%")
	}
	else if(myRoleId === "3") {
		updateProductButton.style.display = "flex";
		updateProductButton.style.pointerEvents = "all"

		createSmallPhotosWrapper.style.display = "none";
		createSmallPhotosWrapper.style.pointerEvents = "none"
		additionalPhotosP.style.display = "none";
		additionalPhotosP.style.pointerEvents = "none"

		createArchiPostWrapper.style.display = "flex";
		createArchiPostWrapper.style.pointerEvents = "all"

		posttitle.value = updateThis.getAttribute('data-posttitle')
		projectBriefInput.value = updateThis.getAttribute('data-summary')

		imageCover.src = updateThis.getAttribute('data-coverPhoto');
		imageCover.setAttribute('width', "100%")
		imageCover.setAttribute('height', "100%")
	}

}

function confirmUpdatePost(updated) {
	
	const myId = document.getElementById('idInput').value
	const posttitle = document.getElementById('projectTitleInput').value
	const projectBriefInput = document.getElementById('projectBriefInput').value
	const createCoverPhoto = document.getElementById('createPhoto1input')
	const photo1 = document.getElementById('createPhoto1ainput')
	const photo2 = document.getElementById('createPhoto2ainput')
	const photo3 = document.getElementById('createPhoto3ainput')
	const imageCover = document.getElementById('output1');
    const image1 = document.getElementById('output1a');
    const image2 = document.getElementById('output1b');
	const image3 = document.getElementById('output1c');
	const successPostArchi = document.getElementById('successPostArchi');

	if(myRoleId === "1") {
		var postType = '2';
	}
	else if(myRoleId === "2") {
		var postType = '1';
	}
	else if(myRoleId === "3") {
		var postType = '3';
	}

	localStorage.getItem('updatePost')

	let data = new FormData;
	// data.append("_token", "{{ csrf_token() }}")
	data.append("user_id", myId);
	data.append("postType", postType);
	data.append("posttitle", posttitle);
	data.append("summary", projectBriefInput);
	data.append("createCoverPhoto", createCoverPhoto.files[0]);
	data.append("photo1", photo1.files[0]);
	data.append("photo2", photo2.files[0]);
	data.append("photo3", photo3.files[0]);

	fetch("/updatepost" + "/" + localStorage.getItem('updatePost'), {
		headers: {
			// "Content-Type": "application/json",
			// 'Content-Type': 'multipart/form-data',
			// "Accept": "application/json",
			// "X-Requested-With": "XMLHttpRequest",
			"X-CSRF-Token": $('input[name="_token"]').val(),
			// 'Content-Type': 'multipart/form-data'
		},
		method: "POST",
		credentials: "same-origin",
		body: data
	}).then( function(response){
		return response.text();
	}).then( function(data){
		console.log(data);
		var updatePostData = JSON.parse(data)
		console.log(updatePostData);
		localStorage.setItem('updatePostId', updatePostData.id)
		localStorage.setItem('updatePostTitle', updatePostData.posttitle)
		localStorage.setItem('updatePostSummary', updatePostData.summary)
		localStorage.setItem('updatePostCoverPhoto', updatePostData.coverPhoto)
		localStorage.setItem('updatePostPhoto1', updatePostData.photo1)
		localStorage.setItem('updatePostPhoto2', updatePostData.photo2)
		localStorage.setItem('updatePostPhoto3', updatePostData.photo3)
	});

	successPostArchi.style.display = "flex";

	setTimeout(function(){ 
		document.getElementById('projectTitleInput').value = "";
		document.getElementById('projectBriefInput').value = "";
		createCoverPhoto.value = "";
		photo1.value = "";
		photo2.value = "";
		photo3.value = "";

		imageCover.src = '/images/icons/download_200_transparent.gif'
		imageCover.setAttribute('width', "25%")
		imageCover.removeAttribute('height')
		
		image1.src = '/images/icons/download_200_transparent.gif'
		image1.setAttribute('width', "30%")
		image1.removeAttribute('height')
		
		image2.src = '/images/icons/download_200_transparent.gif'
		image2.setAttribute('width', "30%")
		image2.removeAttribute('height')
		
		image3.src = '/images/icons/download_200_transparent.gif'
		image3.setAttribute('width', "30%")
		image3.removeAttribute('height')

		successPostArchi.style.display = "none";

		createSmallPhotosWrapper.style.display = "flex";
		createSmallPhotosWrapper.style.pointerEvents = "all"
		additionalPhotosP.style.display = "flex";
		additionalPhotosP.style.pointerEvents = "all"

		updateJobButton.style.display = "none";
		updateJobButton.style.pointerEvents = "none"
		updateProjectButton.style.display = "none";
		updateProjectButton.style.pointerEvents = "none"
		updateProductButton.style.display = "none";
		updateProductButton.style.pointerEvents = "none"

		createArchiPostWrapper.style.display = "none";
		createArchiPostWrapper.style.pointerEvents = "none";

		if(myRoleId === "1") {
			let titles = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisTitle]')

			let summaries = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisSummary]')

			let coverPhotos = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisCoverPhoto]')

			let buttons = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-photo1]')

			titles.forEach((title) => {
				title.innerHTML = localStorage.getItem('updatePostTitle') + `<span class="projectBadge">project</span>`
			});

			summaries.forEach((summary) => {
				summary.innerHTML = localStorage.getItem('updatePostSummary')
			});

			coverPhotos.forEach((coverPhoto) => {
				coverPhoto.setAttribute('style', 'background: url('+ localStorage.getItem('updatePostCoverPhoto') +') no-repeat; background-size: cover; background-position:center;')
				coverPhoto.setAttribute('data-coverPic', localStorage.getItem('updatePostCoverPhoto'))
			});

			buttons.forEach((button) => {
				button.setAttribute('data-coverPhoto', localStorage.getItem('updatePostCoverPhoto'))
			});
		}
		else if(myRoleId === "2") {
			let titles = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisTitle]')

			let summaries = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisSummary]')

			let coverPhotos = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisCoverPhoto]')

			let photos1 = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisPhoto1]')

			let photos2 = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisPhoto2]')

			let photos3 = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisPhoto3]')

			let buttons = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-photo1]')

			titles.forEach((title) => {
				title.innerHTML = localStorage.getItem('updatePostTitle') + `<span class="projectBadge">project</span>`
			});

			summaries.forEach((summary) => {
				summary.innerHTML = localStorage.getItem('updatePostSummary')
			});

			coverPhotos.forEach((coverPhoto) => {
				coverPhoto.setAttribute('style', 'background: url('+ localStorage.getItem('updatePostCoverPhoto') +') no-repeat; background-size: cover; background-position:center;')
				coverPhoto.setAttribute('data-coverPic', localStorage.getItem('updatePostCoverPhoto'))

			});

			photos1.forEach((photo1) => {
				photo1.setAttribute('style', 'background: url('+ localStorage.getItem('updatePostPhoto1') +') no-repeat; background-size: cover; background-position:center;')
				photo1.setAttribute('data-photo', localStorage.getItem('updatePostPhoto1'))
			});

			photos2.forEach((photo2) => {
				photo2.setAttribute('style', 'background: url('+ localStorage.getItem('updatePostPhoto2') +') no-repeat; background-size: cover; background-position:center;')
				photo2.setAttribute('data-photo', localStorage.getItem('updatePostPhoto2'))
			});

			photos3.forEach((photo3) => {
				photo3.setAttribute('style', 'background: url('+ localStorage.getItem('updatePostPhoto3') +') no-repeat; background-size: cover; background-position:center;')
				photo3.setAttribute('data-photo', localStorage.getItem('updatePostPhoto3'))
			});

			buttons.forEach((button) => {
				button.setAttribute('data-coverPhoto', localStorage.getItem('updatePostCoverPhoto'))
				button.setAttribute('data-photo1', localStorage.getItem('updatePostPhoto1'))
				button.setAttribute('data-photo2', localStorage.getItem('updatePostPhoto2'))
				button.setAttribute('data-photo3', localStorage.getItem('updatePostPhoto3'))
			});
			
		}
		else if(myRoleId === "3") {
			let titles = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisTitle]')

			let summaries = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisSummary]')

			let coverPhotos = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-thisCoverPhoto]')

			let buttons = document.querySelectorAll('[data-id=' + `"` + localStorage.getItem('updatePostId') + `"` + '][data-photo1]')

			titles.forEach((title) => {
				title.innerHTML = localStorage.getItem('updatePostTitle') + `<span class="projectBadge">project</span>`
			});

			summaries.forEach((summary) => {
				summary.innerHTML = localStorage.getItem('updatePostSummary')
			});

			coverPhotos.forEach((coverPhoto) => {
				coverPhoto.setAttribute('style', 'background: url('+ localStorage.getItem('updatePostCoverPhoto') +') no-repeat; background-size: cover; background-position:center;')
				coverPhoto.setAttribute('data-coverPic', localStorage.getItem('updatePostCoverPhoto'))
			});

			buttons.forEach((button) => {
				button.setAttribute('data-coverPhoto', localStorage.getItem('updatePostCoverPhoto'))
			});

		}
	
		localStorage.removeItem('updatePost')

	}, 4000);
}