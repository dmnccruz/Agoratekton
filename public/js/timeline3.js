function startTime() {
	var today = new Date();
	var n = today.toDateString();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('dashboardTime').innerHTML = n +" - " + 
	h + ":" + m + ":" + s;
	var t = setTimeout(startTime, 500);
  }
  function checkTime(i) {
	if (i < 10) {i = "0" + i}; 
	return i;
}

startTime()

function searchFunction() {

	if(document.getElementById("contentAll").style.display === "" || document.getElementById("contentAll").style.display === "flex") {
		var input, filter, i, txtValue;
		input = document.getElementById("searchBarInput");
		filter = input.value.toUpperCase();
		var contentAll = document.querySelectorAll("[data-postType]")
		let searchArr = []
		for (i = 0; i < contentAll.length; i++) {
				txtValue = contentAll[i].getAttribute('data-title');
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				contentAll[i].style.display = "";
				// searchArr.push(i)
				// console.log(searchArr)
			}
			else if(contentAll[i].hasAttribute("data-hidden")){
				contentAll[i].style.display = "none";
			}
			else
			{
				contentAll[i].style.display = "none";
				// searchArr.pop()
				// console.log(searchArr)
			}
		}

		for (i = 0; i < document.getElementById("contentAll").children.length; i++) {
			if (document.getElementById("contentAll").children[i].style.display === "" && document.getElementById("contentAll").children[i].classList[0] !== "spacer2") {
				searchArr.push(i)
				// console.log(searchArr)
			} 
		}
		
		if(searchArr.length === 0){
			document.getElementById('contentBoxPlaceholder').style.display = 'flex'	;
		}
		else if(searchArr.length > 0) {
			document.getElementById('contentBoxPlaceholder').style.display = 'none'	;
			searchArr = []
		}
	}

	else if(document.getElementById("contentJobs").style.display === "flex") {
		var input, filter, i, txtValue;
		input = document.getElementById("searchBarInput");
		filter = input.value.toUpperCase();
		var contentAll = document.querySelectorAll("[data-postType]")
		let searchArr = []
		for (i = 0; i < contentAll.length; i++) {
				txtValue = contentAll[i].getAttribute('data-title');
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				contentAll[i].style.display = "";
				// searchArr.push(i)
				// console.log(searchArr)
			} else {
				contentAll[i].style.display = "none";
				// searchArr.pop()
				// console.log(searchArr)
			}
		}

		for (i = 0; i < document.getElementById("contentJobs").children.length; i++) {
			if (document.getElementById("contentJobs").children[i].style.display === "" && document.getElementById("contentJobs").children[i].classList[0] !== "spacer2") {
				searchArr.push(i)
				// console.log(searchArr)
			} 
		}
		
		if(searchArr.length === 0){
			document.getElementById('contentBoxPlaceholder').style.display = 'flex'	;
		}
		else if(searchArr.length > 0) {
			document.getElementById('contentBoxPlaceholder').style.display = 'none'	;
			searchArr = []
		}
	}

	else if(document.getElementById("contentProjects").style.display === "flex") {
		var input, filter, i, txtValue;
		input = document.getElementById("searchBarInput");
		filter = input.value.toUpperCase();
		var contentAll = document.querySelectorAll("[data-postType]")
		let searchArr = []
		for (i = 0; i < contentAll.length; i++) {
				txtValue = contentAll[i].getAttribute('data-title');
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				contentAll[i].style.display = "";
				// searchArr.push(i)
				// console.log(searchArr)
			} else {
				contentAll[i].style.display = "none";
				// searchArr.pop()
				// console.log(searchArr)
			}
		}

		for (i = 0; i < document.getElementById("contentProjects").children.length; i++) {
			if (document.getElementById("contentProjects").children[i].style.display === "" && document.getElementById("contentProjects").children[i].classList[0] !== "spacer2") {
				searchArr.push(i)
				// console.log(searchArr)
			} 
		}
		
		if(searchArr.length === 0){
			document.getElementById('contentBoxPlaceholder').style.display = 'flex'	;
		}
		else if(searchArr.length > 0) {
			document.getElementById('contentBoxPlaceholder').style.display = 'none'	;
			searchArr = []
		}
	}

	else if(document.getElementById("contentProducts").style.display === "flex") {
		var input, filter, i, txtValue;
		input = document.getElementById("searchBarInput");
		filter = input.value.toUpperCase();
		var contentAll = document.querySelectorAll("[data-postType]")
		let searchArr = []
		for (i = 0; i < contentAll.length; i++) {
				txtValue = contentAll[i].getAttribute('data-title');
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				contentAll[i].style.display = "";
				// searchArr.push(i)
				// console.log(searchArr)
			} else {
				contentAll[i].style.display = "none";
				// searchArr.pop()
				// console.log(searchArr)
			}
		}

		for (i = 0; i < document.getElementById("contentProducts").children.length; i++) {
			if (document.getElementById("contentProducts").children[i].style.display === "" && document.getElementById("contentProducts").children[i].classList[0] !== "spacer2") {
				searchArr.push(i)
				// console.log(searchArr)
			} 
		}
		
		if(searchArr.length === 0){
			document.getElementById('contentBoxPlaceholder').style.display = 'flex'	;
		}
		else if(searchArr.length > 0) {
			document.getElementById('contentBoxPlaceholder').style.display = 'none'	;
			searchArr = []
		}
	}
}

function tasksPlaceholder() {
	if(document.getElementById('tasksPlaceholder').nextElementSibling !== null ){
		document.getElementById('tasksPlaceholder').style.display = 'none';
	}
	else {
		document.getElementById('tasksPlaceholder').style.display = 'flex';
	}
}

tasksPlaceholder()

function removeTaskCheck(element){
	// element.parentElement.parentElement.remove()
	// console.log(element.parentElement.parentElement)

	element.parentElement.parentElement.style.opacity="0"
	element.parentElement.parentElement.style.top="-50px"

	setTimeout(function(){ 	
		element.parentElement.parentElement.remove()
		tasksPlaceholder()
	}, 500)
	
	// console.log(document.getElementById('tasksPlaceholder').nextElementSibling)
}

function removeTaskCross(element){
	// element.parentElement.parentElement.remove()
	// tasksPlaceholder()
	// console.log(123)
	
	element.parentElement.parentElement.style.opacity="0"
	element.parentElement.parentElement.style.top="-50px"

	setTimeout(function(){ 	
		element.parentElement.parentElement.remove()
		tasksPlaceholder()
	}, 500)
}

if(document.getElementById('meetingsPlaceholder').nextElementSibling){
	document.getElementById('meetingsPlaceholder').style.display = 'none';
}

if(document.getElementById('contractsPlaceholder').nextElementSibling){
	document.getElementById('contractsPlaceholder').style.display = 'none';
}

function hideDashboard() {
	document.getElementById('dashboardWindow').firstElementChild.nextElementSibling.nextElementSibling.style.opacity = "0"
	document.getElementById('dashboardWindow').firstElementChild.nextElementSibling.nextElementSibling.style.backdropFilter = "none"
	document.getElementById('dashboardWindow').firstElementChild.style.opacity = ".2"
	document.getElementById('dashboardWindow').firstElementChild.nextElementSibling.style.opacity = ".2"
	document.getElementById('dashboardMinimize').firstElementChild.style.display = "none"
	document.getElementById('dashboardMinimize').firstElementChild.nextElementSibling.style.display = "flex"
}

function unhideDashboard() {
	document.getElementById('dashboardWindow').firstElementChild.style.opacity = "1"
	document.getElementById('dashboardWindow').firstElementChild.nextElementSibling.style.opacity = "1"
	document.getElementById('dashboardWindow').firstElementChild.nextElementSibling.nextElementSibling.style.opacity = "1"
	document.getElementById('dashboardWindow').firstElementChild.nextElementSibling.nextElementSibling.style.backdropFilter = "blur(3px)"
	document.getElementById('dashboardMinimize').firstElementChild.style.display = "flex"
	document.getElementById('dashboardMinimize').firstElementChild.nextElementSibling.style.display = "none"
}

function hideFilter() {
	document.getElementById('filterTitle').nextElementSibling.style.opacity = "0"
	document.getElementById('filterTitle').nextElementSibling.nextElementSibling.style.opacity = "0"
	document.getElementById('filterTitle').nextElementSibling.nextElementSibling.nextElementSibling.style.opacity = "0"
	// document.getElementById('filterTitle').nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.style.opacity = "0"

	document.getElementById('filterTitle').style.opacity = ".2"
	document.getElementById('filterMinimize').firstElementChild.style.display = "none"
	document.getElementById('filterMinimize').firstElementChild.nextElementSibling.style.display = "flex"
}

function unhideFilter() {
	document.getElementById('filterTitle').nextElementSibling.style.opacity = "1"
	document.getElementById('filterTitle').nextElementSibling.nextElementSibling.style.opacity = "1"
	document.getElementById('filterTitle').nextElementSibling.nextElementSibling.nextElementSibling.style.opacity = "1"
	// document.getElementById('filterTitle').nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.style.opacity = "1"

	document.getElementById('filterTitle').style.opacity = "1"
	document.getElementById('filterMinimize').firstElementChild.style.display = "flex"
	document.getElementById('filterMinimize').firstElementChild.nextElementSibling.style.display = "none"
}


document.getElementById('filterWindow').addEventListener("mouseover", function() {  
	document.getElementById('filterWrapperC').style.borderRight = "1px dashed rgb(221, 221, 221)";
	document.getElementById('filterWrapperC').style.borderLeft = "1px dashed rgb(221, 221, 221)";
})

document.getElementById('filterWindow').addEventListener("mouseout", function() {  
	document.getElementById('filterWrapperC').style.borderRight = "1px dashed rgb(119, 119, 119)";
	document.getElementById('filterWrapperC').style.borderLeft = "1px dashed rgb(119, 119, 119)";
})

document.getElementById('dashboardWindow').addEventListener("mouseover", function() {  
	document.getElementById('dashboardWrapperC').style.borderRight = "1px dashed rgb(221, 221, 221)";
	document.getElementById('dashboardWrapperC').style.borderLeft = "1px dashed rgb(221, 221, 221)";
})

document.getElementById('dashboardWindow').addEventListener("mouseout", function() {  
	document.getElementById('dashboardWrapperC').style.borderRight = "1px dashed rgb(119, 119, 119)";
	document.getElementById('dashboardWrapperC').style.borderLeft = "1px dashed rgb(119, 119, 119)";
})

var filterLatest = document.getElementById('filterLatest')
var filterLikes = document.getElementById('filterLikes')
var filterStars = document.getElementById('filterStars')
var filterComments = document.getElementById('filterComments')
// var filterCheck = document.getElementById('filterCheck')

filterLatest.addEventListener("click", function() {  
	filterLatest.classList.add('filterButtonsSelected')
	filterLikes.classList.remove('filterButtonsSelected')
	filterStars.classList.remove('filterButtonsSelected')
	filterComments.classList.remove('filterButtonsSelected')
	// filterCheck.classList.remove('filterButtonsSelected')
})

filterLikes.addEventListener("click", function() {  
	filterLikes.classList.add('filterButtonsSelected')
	filterLatest.classList.remove('filterButtonsSelected')
	filterStars.classList.remove('filterButtonsSelected')
	// filterCheck.classList.remove('filterButtonsSelected')
	filterComments.classList.remove('filterButtonsSelected')
})

filterStars.addEventListener("click", function() {  
	filterStars.classList.add('filterButtonsSelected')
	filterLatest.classList.remove('filterButtonsSelected')
	filterLikes.classList.remove('filterButtonsSelected')
	// filterCheck.classList.remove('filterButtonsSelected')
	filterComments.classList.remove('filterButtonsSelected')
})

filterComments.addEventListener("click", function() {  
	filterComments.classList.add('filterButtonsSelected')
	filterLatest.classList.remove('filterButtonsSelected')
	filterLikes.classList.remove('filterButtonsSelected')
	filterStars.classList.remove('filterButtonsSelected')
	// filterCheck.classList.remove('filterButtonsSelected')
})

// filterCheck.addEventListener("click", function() {  
// 	console.log(123)
// })

var hidePost = document.getElementsByClassName('hidePost');
var reportPost = document.getElementsByClassName('reportPost');
var hamburgerMenuContainer = document.getElementsByClassName('hamburgerMenuContainer');
var hamburger = document.getElementsByClassName('hamburger');
var hamburgerMenu = document.getElementsByClassName('hamburgerMenu');
var menuExitButton = document.getElementById('menuExitButton');
var menuExit = document.getElementById('menuExit');
var menuLinksContainer = document.getElementById('menuLinksContainer');
var menuLinksHome = document.getElementById('menuLinksHome');
var menuLinksCalendar = document.getElementById('menuLinksCalendar');
var menuLinksPeople = document.getElementById('menuLinksPeople');
var menuLinksTasks = document.getElementById('menuLinksTasks');
var menuLinksStats = document.getElementById('menuLinksStats');
var menuLinksPortfolio = document.getElementById('menuLinksPortfolio');
var menuSvgs = document.getElementById('menuSvgs');
var meSpan1 = document.getElementById('meSpan1');
var meSpan2 = document.getElementById('meSpan2');
var popMenuFooter = document.getElementById('popMenuFooter');
var popMenuFooterLine = document.getElementById('popMenuFooterLine');
var footerCopyright = document.getElementById('footerCopyright');
var socialMediaFb = document.getElementById('socialMediaFb');
var socialMediaIg = document.getElementById('socialMediaIg');
var socialMediaPint = document.getElementById('socialMediaPint');
var openmenu = document.getElementById('openmenu');
var popMenuContainer = document.getElementById('popMenuContainer');
var projectInfo = document.getElementsByClassName('projectInfo');
var architecInfo = document.getElementsByClassName('architecInfo');
var contentPics = document.getElementsByClassName('contentPic');
var contentPicSmall = document.getElementsByClassName('contentPicSmall');
var contentPicSmall1s = document.getElementsByClassName('contentPicSmalls1');
var contentPicSmall2s = document.getElementsByClassName('contentPicSmalls2');
var contentPicSmall3s = document.getElementsByClassName('contentPicSmalls3');
var contentBoxContainer = document.getElementsByClassName('contentBoxContainer');
var mainContentBox = document.getElementsByClassName('mainContentBox');
var contentJobFind = document.getElementsByClassName('contentJobFind');
var contentBoxContainerJob = document.getElementsByClassName('contentBoxContainerJob');
var mainContentBoxJob = document.getElementsByClassName('mainContentBoxJob');
var contentProductFind = document.getElementsByClassName('contentProductFind');
var contentBoxContainerProduct = document.getElementsByClassName('contentBoxContainerProduct');
var mainContentBoxProduct = document.getElementsByClassName('mainContentBoxProduct');
var lines = document.getElementById('lines');
var spacer = document.getElementById('spacer');
var black = document.getElementById('black');
var searchBarLabel = document.getElementById('searchBarLabel');
var jps = document.getElementsByClassName('jps');

const coverPic = "https://via.placeholder.com/1000"
const contentPicSmall1 = "https://via.placeholder.com/700"
const contentPicSmall2 = "https://via.placeholder.com/500"
const contentPicSmall3 = "https://via.placeholder.com/600"

menuExitButton.addEventListener("click", function() {  
	popMenuContainer.style.right="100%"
	meSpan1.style.animation = "none"
	meSpan2.style.animation = "none"
	menuExit.style.animation = "none"	
	menuLinksContainer.style.animation = "none"	
	menuSvgs.style.animation = "none"	
	popMenuFooter.style.animation = "none"	
	popMenuFooterLine.style.animation = "none"	
	socialMediaFb.style.animation = "none"	
	socialMediaIg.style.animation = "none"		
	socialMediaPint.style.animation = "none"	
	menuLinksHome.style.animation = "none"	
	menuLinksCalendar.style.animation = "none"	
	menuLinksPeople.style.animation = "none"	
	menuLinksTasks.style.animation = "none"	
	menuLinksPortfolio.style.animation = "none"	
	footerCopyright.style.animation = "none"	

	document.querySelector("#helloSVG path:nth-child(1)").style.animation = "none"
	document.querySelector("#helloSVG path:nth-child(2)").style.animation = "none"
	document.querySelector("#helloSVG path:nth-child(3)").style.animation = "none"
	document.querySelector("#helloSVG path:nth-child(4)").style.animation = "none"
	document.querySelector("#helloSVG path:nth-child(5)").style.animation = "none"

 	document.getElementById('menuSvg').style.animation = "none"
	document.querySelector("#menuSVG path:nth-child(1)").style.animation = "none"
	document.querySelector("#menuSVG path:nth-child(2)").style.animation = "none"
	document.querySelector("#menuSVG path:nth-child(3)").style.animation = "none"
	document.querySelector("#menuSVG path:nth-child(4)").style.animation = "none"
})

openmenu.addEventListener("click", function() {  
	popMenuContainer.style.right="0%"
	meSpan1.style.animation = "meSpan1 2.5s ease-in-out"
	meSpan2.style.animation = "meSpan2 2.5s ease-in-out"
	menuExit.style.animation = "menuExit 5s forwards"	
	menuLinksContainer.style.animation = "menuExit 2.5s forwards"	
	menuSvgs.style.animation = "menuSvgs 5s ease-in-out forwards"	
	popMenuFooter.style.animation = "popMenuFooter 5s ease-in-out forwards"	
	popMenuFooterLine.style.animation = "popMenuFooterLine 5s forwards"	
	socialMediaFb.style.animation = "smIcons 2s forwards 1.5s"	
	socialMediaIg.style.animation = "smIcons 2s forwards 2s"	
	socialMediaPint.style.animation = "smIcons 2s forwards 2.5s"	
	menuLinksHome.style.animation = "menuLinks .25s forwards 1s"	
	menuLinksCalendar.style.animation = "menuLinks .25s forwards 1.1s"	
	menuLinksPeople.style.animation = "menuLinks .25s forwards 1.2s"	
	// menuLinksTasks.style.animation = "menuLinks .25s forwards 1.3s"	
	menuLinksPortfolio.style.animation = "menuLinks .25s forwards 1.4s"	
	footerCopyright.style.animation = "footerCopyright 1s forwards 1s"	

	document.querySelector("#helloSVG path:nth-child(1)").style.animation = "homeSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(2)").style.animation = "homeSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(3)").style.animation = "homeSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(4)").style.animation = "homeSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(5)").style.animation = "homeSVG 4s ease-in-out forwards"

	document.getElementById('menuSvg').style.animation = "menuSVG 4s ease-in-out forwards"
	document.querySelector("#menuSVG path:nth-child(1)").style.animation = "menuSVG 4s ease-in-out forwards"
	document.querySelector("#menuSVG path:nth-child(2)").style.animation = "menuSVG 4s ease-in-out forwards"
	document.querySelector("#menuSVG path:nth-child(3)").style.animation = "menuSVG 4s ease-in-out forwards"
	document.querySelector("#menuSVG path:nth-child(4)").style.animation = "menuSVG 4s ease-in-out forwards"

})

function stopHomeAnimation() {
	document.querySelector("#homeSVG path:nth-child(1)").style.animation = "none"
	document.querySelector("#homeSVG path:nth-child(2)").style.animation = "none"
	document.querySelector("#homeSVG path:nth-child(3)").style.animation = "none"
	document.querySelector("#homeSVG path:nth-child(4)").style.animation = "none"
}

function stopPeopleAnimation() {
	document.querySelector("#peopleSVG path:nth-child(1)").style.animation = "none"
	document.querySelector("#peopleSVG path:nth-child(2)").style.animation = "none"
	document.querySelector("#peopleSVG path:nth-child(3)").style.animation = "none"
	document.querySelector("#peopleSVG path:nth-child(4)").style.animation = "none"
	document.querySelector("#peopleSVG path:nth-child(5)").style.animation = "none"
	document.querySelector("#peopleSVG path:nth-child(6)").style.animation = "none"
}

function stopPortfolioAnimation() {
	document.querySelector("#portfolioSVG path:nth-child(1)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(2)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(3)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(4)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(5)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(6)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(7)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(8)").style.animation = "none"
	document.querySelector("#portfolioSVG path:nth-child(9)").style.animation = "none"
}

function stopCalendarAnimation() {
	document.querySelector("#calendarSVG path:nth-child(1)").style.animation = "none"
	document.querySelector("#calendarSVG path:nth-child(2)").style.animation = "none"
	document.querySelector("#calendarSVG path:nth-child(3)").style.animation = "none"
	document.querySelector("#calendarSVG path:nth-child(4)").style.animation = "none"
	document.querySelector("#calendarSVG path:nth-child(5)").style.animation = "none"
}

function stopTasksAnimation() {
	document.querySelector("#tasksSVG path:nth-child(1)").style.animation = "none"
	document.querySelector("#tasksSVG path:nth-child(2)").style.animation = "none"
	document.querySelector("#tasksSVG path:nth-child(3)").style.animation = "none"
	document.querySelector("#tasksSVG path:nth-child(4)").style.animation = "none"
	document.querySelector("#tasksSVG path:nth-child(5)").style.animation = "none"
}

menuLinksHome.addEventListener("mouseover", function() {  
	document.getElementById("helloSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#helloSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(4)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(5)").style.animation = "none"; 
	}, 50)
	
	document.querySelector("#homeSVG path:nth-child(1)").style.animation = "homeSVG 2s ease-in-out forwards"
	document.querySelector("#homeSVG path:nth-child(2)").style.animation = "homeSVG 2s ease-in-out forwards"
	document.querySelector("#homeSVG path:nth-child(3)").style.animation = "homeSVG 2s ease-in-out forwards"
	document.querySelector("#homeSVG path:nth-child(4)").style.animation = "homeSVG 2s ease-in-out forwards"
	document.getElementById("homeSVG").style.marginTop = "0px"
})

menuLinksHome.addEventListener("mouseout", function() { 
	document.getElementById("homeSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#homeSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#homeSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#homeSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#homeSVG path:nth-child(4)").style.animation = "none"; 
	}, 50)
	document.querySelector("#helloSVG path:nth-child(1)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(2)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(3)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(4)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(5)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.getElementById("helloSVG").style.marginTop = "0px"

	stopPeopleAnimation()
	stopPortfolioAnimation()
	stopCalendarAnimation()
	// stopTasksAnimation()
})

menuLinksPeople.addEventListener("mouseover", function() {  
	document.getElementById("helloSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#helloSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(4)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(5)").style.animation = "none"; 
	}, 50)
	document.querySelector("#peopleSVG path:nth-child(1)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#peopleSVG path:nth-child(2)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#peopleSVG path:nth-child(3)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#peopleSVG path:nth-child(4)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#peopleSVG path:nth-child(5)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#peopleSVG path:nth-child(6)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.getElementById("peopleSVG").style.marginTop = "0px"
})

menuLinksPeople.addEventListener("mouseout", function() { 
	document.getElementById("peopleSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#peopleSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#peopleSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#peopleSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#peopleSVG path:nth-child(4)").style.animation = "none"
		document.querySelector("#peopleSVG path:nth-child(5)").style.animation = "none"
		document.querySelector("#peopleSVG path:nth-child(6)").style.animation = "none"; 
	}, 50)
	document.querySelector("#helloSVG path:nth-child(1)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(2)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(3)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(4)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(5)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.getElementById("helloSVG").style.marginTop = "0px"

	stopHomeAnimation()
	stopPortfolioAnimation()
	stopCalendarAnimation()
	// stopTasksAnimation()
})

menuLinksPortfolio.addEventListener("mouseover", function() {  
	document.getElementById("helloSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#helloSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(4)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(5)").style.animation = "none"; 
	}, 50)
	document.querySelector("#portfolioSVG path:nth-child(1)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(2)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(3)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(4)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(5)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(6)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(7)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(8)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.querySelector("#portfolioSVG path:nth-child(9)").style.animation = "peopleSVG 2s ease-in-out forwards"
	document.getElementById("portfolioSVG").style.marginTop = "0px"
})

menuLinksPortfolio.addEventListener("mouseout", function() { 
	document.getElementById("portfolioSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#portfolioSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(4)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(5)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(6)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(7)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(8)").style.animation = "none"
		document.querySelector("#portfolioSVG path:nth-child(9)").style.animation = "none"; 
	}, 50)
	document.querySelector("#helloSVG path:nth-child(1)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(2)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(3)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(4)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(5)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.getElementById("helloSVG").style.marginTop = "0px"

	stopHomeAnimation()
	stopPeopleAnimation()
	stopCalendarAnimation()
	// stopTasksAnimation()
})

menuLinksCalendar.addEventListener("mouseover", function() {  
	document.getElementById("helloSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#helloSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(4)").style.animation = "none"
		document.querySelector("#helloSVG path:nth-child(5)").style.animation = "none"; 
	}, 50)
	document.querySelector("#calendarSVG path:nth-child(1)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.querySelector("#calendarSVG path:nth-child(2)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.querySelector("#calendarSVG path:nth-child(3)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.querySelector("#calendarSVG path:nth-child(4)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.querySelector("#calendarSVG path:nth-child(5)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.querySelector("#calendarSVG path:nth-child(6)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.querySelector("#calendarSVG path:nth-child(7)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.querySelector("#calendarSVG path:nth-child(8)").style.animation = "calendarSVG 2s ease-in-out forwards"
	document.getElementById("calendarSVG").style.marginTop = "0px"
})

menuLinksCalendar.addEventListener("mouseout", function() { 
	document.getElementById("calendarSVG").style.marginTop = "1000px"
	setTimeout(function(){ 	
		document.querySelector("#calendarSVG path:nth-child(1)").style.animation = "none"
		document.querySelector("#calendarSVG path:nth-child(2)").style.animation = "none"
		document.querySelector("#calendarSVG path:nth-child(3)").style.animation = "none"
		document.querySelector("#calendarSVG path:nth-child(4)").style.animation = "none"
		document.querySelector("#calendarSVG path:nth-child(5)").style.animation = "none"
		document.querySelector("#calendarSVG path:nth-child(6)").style.animation = "none"
		document.querySelector("#calendarSVG path:nth-child(7)").style.animation = "none"
		document.querySelector("#calendarSVG path:nth-child(8)").style.animation = "none"; 
	}, 50)
	document.querySelector("#helloSVG path:nth-child(1)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(2)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(3)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(4)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.querySelector("#helloSVG path:nth-child(5)").style.animation = "helloSVG 4s ease-in-out forwards"
	document.getElementById("helloSVG").style.marginTop = "0px"

	stopHomeAnimation()
	stopPeopleAnimation()
	stopPortfolioAnimation()
	// stopTasksAnimation()
})

// menuLinksTasks.addEventListener("mouseover", function() {  
// 	document.getElementById("helloSVG").style.marginTop = "1000px"
// 	setTimeout(function(){ 	
// 		document.querySelector("#helloSVG path:nth-child(1)").style.animation = "none"
// 		document.querySelector("#helloSVG path:nth-child(2)").style.animation = "none"
// 		document.querySelector("#helloSVG path:nth-child(3)").style.animation = "none"
// 		document.querySelector("#helloSVG path:nth-child(4)").style.animation = "none"
// 		document.querySelector("#helloSVG path:nth-child(5)").style.animation = "none"; 
// 	}, 50)
// 	document.querySelector("#tasksSVG path:nth-child(1)").style.animation = "tasksSVG 2s ease-in-out forwards"
// 	document.querySelector("#tasksSVG path:nth-child(2)").style.animation = "tasksSVG 2s ease-in-out forwards"
// 	document.querySelector("#tasksSVG path:nth-child(3)").style.animation = "tasksSVG 2s ease-in-out forwards"
// 	document.querySelector("#tasksSVG path:nth-child(4)").style.animation = "tasksSVG 2s ease-in-out forwards"
// 	document.querySelector("#tasksSVG path:nth-child(5)").style.animation = "tasksSVG 2s ease-in-out forwards"
// 	document.getElementById("tasksSVG").style.marginTop = "0px"
// })

// menuLinksTasks.addEventListener("mouseout", function() { 
// 	document.getElementById("tasksSVG").style.marginTop = "1000px"
// 	setTimeout(function(){ 	
// 		document.querySelector("#tasksSVG path:nth-child(1)").style.animation = "none"
// 		document.querySelector("#tasksSVG path:nth-child(2)").style.animation = "none"
// 		document.querySelector("#tasksSVG path:nth-child(3)").style.animation = "none"
// 		document.querySelector("#tasksSVG path:nth-child(4)").style.animation = "none"
// 		document.querySelector("#tasksSVG path:nth-child(5)").style.animation = "none"; 
// 	}, 50)
// 	document.querySelector("#helloSVG path:nth-child(1)").style.animation = "helloSVG 4s ease-in-out forwards"
// 	document.querySelector("#helloSVG path:nth-child(2)").style.animation = "helloSVG 4s ease-in-out forwards"
// 	document.querySelector("#helloSVG path:nth-child(3)").style.animation = "helloSVG 4s ease-in-out forwards"
// 	document.querySelector("#helloSVG path:nth-child(4)").style.animation = "helloSVG 4s ease-in-out forwards"
// 	document.querySelector("#helloSVG path:nth-child(5)").style.animation = "helloSVG 4s ease-in-out forwards"
// 	document.getElementById("helloSVG").style.marginTop = "0px"

// 	stopHomeAnimation()
// 	stopPeopleAnimation()
// 	stopPortfolioAnimation()
// 	stopCalendarAnimation()
// })

menuLinksHome.addEventListener("click", function() { 
	window.location.href = "";
})

menuLinksPeople.addEventListener("click", function() { 
	window.location.href = "";
})

menuLinksPortfolio.addEventListener("click", function() { 
	window.location.href = "";
})

menuLinksCalendar.addEventListener("click", function() { 
	window.location.href = "";
})

menuLinksTasks.addEventListener("click", function() { 
	window.location.href = "";
})

// for(let i = 0; i < hamburger.length; i++) {
//   hamburger[i].addEventListener("click", function() {  
// 	  hamburger[i].classList.toggle("is-active");
// 	if(hamburger[i].classList.length === 4) {
// 		hamburgerMenuContainer[i].style.opacity = "1"
// 		hamburgerMenuContainer[i].style.pointerEvents = "all"
// 		hamburgerMenu[i].style.animation = "hambrugerMenu .25s"
// 		hamburgerMenu[i].style.zIndex = "500"
// 	}
// 	else {
// 		hamburgerMenuContainer[i].style.opacity = "0"
// 		hamburgerMenuContainer[i].style.pointerEvents = "none"
// 		hamburgerMenu[i].style.animation = "none"
// 		hamburgerMenu[i].style.zIndex = "0"
// 	}
//   })
// }


function hamburgerOpen(hamburgerMenu) {
		hamburgerMenu.classList.toggle("is-active");
	  if(hamburgerMenu.classList.length === 4) {
		  hamburgerMenu.nextElementSibling.style.opacity = "1"
		  hamburgerMenu.nextElementSibling.style.pointerEvents = "all"
		  hamburgerMenu.nextElementSibling.firstElementChild.style.animation = "hambrugerMenu .25s"
		  hamburgerMenu.nextElementSibling.firstElementChild.style.zIndex = "500"
		  hamburgerMenu.nextElementSibling.firstElementChild.style.pointerEvents = "all"
		//   console.log(hamburgerMenu.getAttribute('data-id'))
	  }
	  else {
		  hamburgerMenu.nextElementSibling.style.opacity = "0"
		  hamburgerMenu.nextElementSibling.style.pointerEvents = "none"
		  hamburgerMenu.nextElementSibling.firstElementChild.style.animation = "none"
		  hamburgerMenu.nextElementSibling.firstElementChild.style.zIndex = "0"
		  hamburgerMenu.nextElementSibling.firstElementChild.style.pointerEvents = "none"
	  }
}

function smallPicHover(hoverThis) {
	var contentPic = hoverThis.parentElement.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling

	contentPic.style.background = "url(" + hoverThis.getAttribute('data-photo') + ") no-repeat"
	contentPic.style.backgroundSize = "cover"
	contentPic.style.backgroundPosition = "center"
	// console.log("cpa")
}

function smallPicOut(hoverOut) {
	var contentPic2 = hoverOut.parentElement.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling

	contentPic2.style.background = "url(" + contentPic2.getAttribute('data-coverPic') + ") no-repeat"
	contentPic2.style.backgroundSize = "cover"
	contentPic2.style.backgroundPosition = "center"
	// console.log("cpb")
}

function picHover(hoverThisPic) {
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .75)"
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .75)"
	lines.style.width = "750px";

	hoverThisPic.parentElement.style.height="450px"
	hoverThisPic.nextElementSibling.nextElementSibling.style.height="450px"
	hoverThisPic.style.height="450px"
	hoverThisPic.style.width="750px"

	// console.log('hover')
}

function picOut(outThisPic) {
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .3)"
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .3)"
	lines.style.width = "500px";
	lines.style.zIndex = "0";

	outThisPic.parentElement.style.height="300px"
	outThisPic.nextElementSibling.nextElementSibling.style.height="300px"
	outThisPic.style.height="300px"
	outThisPic.style.width="500px"

	// console.log('out')
}

function clickPic(clickThisPic) {
	// console.log('clickPic')

	clickThisPic.style.zIndex="102"
	clickThisPic.classList.toggle("contentPictest")
	black.style.opacity="1"
	black.style.zIndex="100"
	clickThisPic.style.width="750px"
	clickThisPic.style.height="450px"

	// content pics small
	clickThisPic.parentElement.nextElementSibling.nextElementSibling.style.zIndex="101"
	clickThisPic.parentElement.nextElementSibling.nextElementSibling.style.width="750px"
	clickThisPic.parentElement.nextElementSibling.nextElementSibling.style.height="225px"

	// projectinfo
	clickThisPic.previousElementSibling.style.zIndex="105"
	// architectinfo
	clickThisPic.nextElementSibling.style.zIndex="105"

	setTimeout(function(){ 	
		// projectinfo
		clickThisPic.previousElementSibling.style.opacity="1"
		// architectinfo
		clickThisPic.nextElementSibling.style.opacity="1"
	}, 350)

	// main content box
	clickThisPic.nextElementSibling.nextElementSibling.style.borderTop = "1.5px dashed rgba(189, 189, 189, 0.6)";
	clickThisPic.nextElementSibling.nextElementSibling.style.borderBottom = "1.5px dashed rgba(189, 189, 189, 0.6)";
	clickThisPic.nextElementSibling.nextElementSibling.style.zIndex = "101";

	lines.style.width = "750px";
	lines.style.borderLeft = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.borderRight = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.zIndex = "103";

	clickThisPic.setAttribute('onmouseover', "picHover2(this)")
	clickThisPic.setAttribute('onmouseout', "picOut2(this)")
}

function picHover2(hoverThisPic) {
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .75)"
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .75)"
	lines.style.width = "750px";
	lines.style.zIndex = "103";
}

function picOut2(outThisPic2) {
	lines.style.width = "750px";
	lines.style.borderLeft = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.borderRight = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.zIndex = "103";

	outThisPic2.parentElement.style.height="450px"
	outThisPic2.nextElementSibling.nextElementSibling.style.height="450px"
	outThisPic2.style.height="450px"
	outThisPic2.style.width="750px"
}

function clickBlack(blackClick) {
	// console.log('blackclick')

	for(let i = 0; i < mainContentBox.length; i++) {
		mainContentBox[i].style.borderTop = "none";
		mainContentBox[i].style.borderBottom = "none";
		mainContentBox[i].style.zIndex = "-1";
		mainContentBox[i].style.height="300px"
	}

	for(let i = 0; i < contentPics.length; i++) {
		contentPics[i].style.width="500px"
		contentPics[i].style.height="300px"
		contentPics[i].style.zIndex="1"
	}





	for(let i = 0; i < contentJobFind.length; i++) {
		contentJobFind[i].style.width="500px"
		contentJobFind[i].style.height="200px"
		contentJobFind[i].style.zIndex="1"
	}

	for(let i = 0; i < contentBoxContainerJob.length; i++) {
		contentBoxContainerJob[i].style.height="200px"
	}

	for(let i = 0; i < mainContentBoxJob.length; i++) {
		mainContentBoxJob[i].style.borderTop = "none";
		mainContentBoxJob[i].style.borderBottom = "none";
		mainContentBoxJob[i].style.zIndex = "-1";
		mainContentBoxJob[i].style.height="200px"
	}



	for(let i = 0; i < contentProductFind.length; i++) {
		contentProductFind[i].style.width="500px"
		contentProductFind[i].style.height="300px"
		contentProductFind[i].style.zIndex="1"
	}

	for(let i = 0; i < contentBoxContainerProduct.length; i++) {
		contentBoxContainerProduct[i].style.height="300px"
	}

	for(let i = 0; i < mainContentBoxProduct.length; i++) {
		mainContentBoxProduct[i].style.borderTop = "none";
		mainContentBoxProduct[i].style.borderBottom = "none";
		mainContentBoxProduct[i].style.zIndex = "-1";
		mainContentBoxProduct[i].style.height="300px"
	}




	for(let i = 0; i < contentBoxContainer.length; i++) {
		contentBoxContainer[i].style.height="300px"
	}

	for(let i = 0; i < contentPicSmall.length; i++) {
		contentPicSmall[i].style.zIndex="1"
		contentPicSmall[i].style.width="500px"
		contentPicSmall[i].style.height="150px"
	}

	for(let i = 0; i < contentBoxContainer.length; i++) {
		contentBoxContainer[i].style.height="300px"
	}

	for(let i = 0; i < projectInfo.length; i++) {
		projectInfo[i].style.opacity="0"
		projectInfo[i].style.zIndex="0"
	}

	for(let i = 0; i < architecInfo.length; i++) {
		architecInfo[i].style.opacity="0"
		architecInfo[i].style.zIndex="0"
	}

	black.style.zIndex="-100"
	black.style.opacity="0"

	lines.style.width = "500px";
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .3)";
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .3)";
	lines.style.zIndex = "1";

	for(let i = 0; i < contentPics.length; i++) {
		contentPics[i].setAttribute('onmouseover', "picHover(this)")
		contentPics[i].setAttribute('onmouseout', "picOut(this)")
	}

	for(let i = 0; i < contentJobFind.length; i++) {
		contentJobFind[i].setAttribute('onmouseover', "picHoverJob(this)")
		contentJobFind[i].setAttribute('onmouseout', "picOutJob(this)")
	}

	for(let i = 0; i < contentProductFind.length; i++) {
		contentProductFind[i].setAttribute('onmouseover', "picHoverProduct(this)")
		contentProductFind[i].setAttribute('onmouseout', "picOutProduct(this)")
	}
}














function picHoverJob(hoverThisPic) {
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .75)"
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .75)"
	lines.style.width = "750px";

	hoverThisPic.parentElement.style.height="450px"
	hoverThisPic.nextElementSibling.nextElementSibling.style.height="450px"
	hoverThisPic.style.height="450px"
	hoverThisPic.style.width="750px"
}

function picOutJob(outThisPic) {
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .3)"
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .3)"
	lines.style.width = "500px";
	lines.style.zIndex = "0";

	outThisPic.parentElement.style.height="200px"
	outThisPic.nextElementSibling.nextElementSibling.style.height="200px"
	outThisPic.style.height="200px"
	outThisPic.style.width="500px"
}

function picHoverProduct(hoverThisPic) {
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .75)"
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .75)"
	lines.style.width = "750px";

	hoverThisPic.parentElement.style.height="450px"
	hoverThisPic.nextElementSibling.nextElementSibling.style.height="450px"
	hoverThisPic.style.height="450px"
	hoverThisPic.style.width="750px"
}

function picOutProduct(outThisPic) {
	lines.style.borderRight = "2px solid rgba(92, 92, 92, .3)"
	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .3)"
	lines.style.width = "500px";
	lines.style.zIndex = "0";

	outThisPic.parentElement.style.height="300px"
	outThisPic.nextElementSibling.nextElementSibling.style.height="300px"
	outThisPic.style.height="300px"
	outThisPic.style.width="500px"
}



// function picHover2(hoverThisPic) {
// 	lines.style.borderRight = "2px solid rgba(92, 92, 92, .75)"
// 	lines.style.borderLeft = "2px solid rgba(92, 92, 92, .75)"
// 	lines.style.width = "750px";
// 	lines.style.zIndex = "103";
// }

// function picOut2(outThisPic2) {
// 	lines.style.width = "750px";
// 	lines.style.borderLeft = "1.5px dashed rgba(189, 189, 189, 0.6)";
// 	lines.style.borderRight = "1.5px dashed rgba(189, 189, 189, 0.6)";
// 	lines.style.zIndex = "103";

// 	outThisPic2.parentElement.style.height="450px"
// 	outThisPic2.nextElementSibling.nextElementSibling.style.height="450px"
// 	outThisPic2.style.height="450px"
// 	outThisPic2.style.width="750px"
// }



function clickPicJob(clickThisPic) {
	// console.log('clickPic')

	clickThisPic.style.zIndex="102"
	// clickThisPic.classList.toggle("contentPictest")
	black.style.opacity="1"
	black.style.zIndex="100"
	clickThisPic.style.width="750px"
	clickThisPic.style.height="450px"

	// projectinfo
	clickThisPic.previousElementSibling.style.zIndex="105"
	// architectinfo
	clickThisPic.nextElementSibling.style.zIndex="105"

	setTimeout(function(){ 	
		// projectinfo
		clickThisPic.previousElementSibling.style.opacity="1"
		// architectinfo
		clickThisPic.nextElementSibling.style.opacity="1"
	}, 350)

	// main content box
	clickThisPic.nextElementSibling.nextElementSibling.style.borderTop = "1.5px dashed rgba(189, 189, 189, 0.6)";
	clickThisPic.nextElementSibling.nextElementSibling.style.borderBottom = "1.5px dashed rgba(189, 189, 189, 0.6)";
	clickThisPic.nextElementSibling.nextElementSibling.style.zIndex = "101";

	lines.style.width = "750px";
	lines.style.borderLeft = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.borderRight = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.zIndex = "103";

	clickThisPic.setAttribute('onmouseover', "picHover2(this)")
	clickThisPic.setAttribute('onmouseout', "picOut2(this)")
}





function clickPicProduct(clickThisPic) {
	// console.log('clickPic')

	clickThisPic.style.zIndex="102"
	// clickThisPic.classList.toggle("contentPictest")
	black.style.opacity="1"
	black.style.zIndex="100"
	clickThisPic.style.width="750px"
	clickThisPic.style.height="450px"

	// projectinfo
	clickThisPic.previousElementSibling.style.zIndex="105"
	// architectinfo
	clickThisPic.nextElementSibling.style.zIndex="105"

	setTimeout(function(){ 	
		// projectinfo
		clickThisPic.previousElementSibling.style.opacity="1"
		// architectinfo
		clickThisPic.nextElementSibling.style.opacity="1"
	}, 350)

	// main content box
	clickThisPic.nextElementSibling.nextElementSibling.style.borderTop = "1.5px dashed rgba(189, 189, 189, 0.6)";
	clickThisPic.nextElementSibling.nextElementSibling.style.borderBottom = "1.5px dashed rgba(189, 189, 189, 0.6)";
	clickThisPic.nextElementSibling.nextElementSibling.style.zIndex = "101";

	lines.style.width = "750px";
	lines.style.borderLeft = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.borderRight = "1.5px dashed rgba(189, 189, 189, 0.6)";
	lines.style.zIndex = "103";

	clickThisPic.setAttribute('onmouseover', "picHover2(this)")
	clickThisPic.setAttribute('onmouseout', "picOut2(this)")
}























// jps[0].classList.toggle("jpsSelect")
jps[1].classList.toggle("jpsSelect")
jps[2].classList.toggle("jpsSelect")
jps[3].classList.toggle("jpsSelect")

jps[0].addEventListener("click", function() { 
	for(let i = 0; i < jps.length; i++) {
		if(jps[i].classList.toggle("jpsSelect")===true){
		jps[i].classList.toggle("jpsSelect")
		}
	}
	jps[0].classList.toggle("jpsSelect")
	searchBarLabel.textContent = "Search all:"
	document.getElementById('contentAll').style.display = 'flex';
	document.getElementById('contentJobs').style.display = 'none';
	document.getElementById('contentProjects').style.display = 'none';
	document.getElementById('contentProducts').style.display = 'none';

	document.getElementById('contentBoxPlaceholder').style.display = 'none';
	
	if (document.getElementById('contentAll').children[0] === undefined){
		document.getElementById('contentBoxPlaceholder').style.display = 'flex'	;
	}
})

jps[1].addEventListener("click", function() { 
	for(let i = 0; i < jps.length; i++) {
		if(jps[i].classList.toggle("jpsSelect")===true){
		jps[i].classList.toggle("jpsSelect")
		}
	}
	jps[1].classList.toggle("jpsSelect")
	searchBarLabel.textContent = "Search jobs:"
	document.getElementById('contentAll').style.display = 'none';
	document.getElementById('contentJobs').style.display = 'flex';
	document.getElementById('contentProjects').style.display = 'none';
	document.getElementById('contentProducts').style.display = 'none';

	document.getElementById('contentBoxPlaceholder').style.display = 'none';
	
	if (document.getElementById('contentJobs').children[0] === undefined){
		document.getElementById('contentBoxPlaceholder').style.display = 'flex';
		// console.log(123)
	}
})

jps[2].addEventListener("click", function() { 
	for(let i = 0; i < jps.length; i++) {
		if(jps[i].classList.toggle("jpsSelect")===true){
		jps[i].classList.toggle("jpsSelect")
		}
	}
	jps[2].classList.toggle("jpsSelect")
	searchBarLabel.textContent = "Search projects:"
	document.getElementById('contentAll').style.display = 'none';
	document.getElementById('contentJobs').style.display = 'none';
	document.getElementById('contentProjects').style.display = 'flex';
	document.getElementById('contentProducts').style.display = 'none';

	document.getElementById('contentBoxPlaceholder').style.display = 'none';
	
	if (document.getElementById('contentProjects').children[0] === undefined){
		document.getElementById('contentBoxPlaceholder').style.display = 'flex';
	}
})

jps[3].addEventListener("click", function() { 
	for(let i = 0; i < jps.length; i++) {
		if(jps[i].classList.toggle("jpsSelect")===true){
		jps[i].classList.toggle("jpsSelect")
		}
	}
	jps[3].classList.toggle("jpsSelect")
	searchBarLabel.textContent = "Search suppliers:"
	document.getElementById('contentAll').style.display = 'none';
	document.getElementById('contentJobs').style.display = 'none';
	document.getElementById('contentProjects').style.display = 'none';
	document.getElementById('contentProducts').style.display = 'flex';

	document.getElementById('contentBoxPlaceholder').style.display = 'none';
	
	if (document.getElementById('contentProducts').children[0] === undefined){
		document.getElementById('contentBoxPlaceholder').style.display = 'flex';
	}
})

function sortByLikes() {
	if(document.getElementById('contentAll').style.display === 'flex' || document.getElementById('contentAll').style.display === "") {
		let container = document.getElementById('contentAll');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.likes, 10) - order * parseInt(b.dataset.likes, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentJobs').style.display === 'flex'){
		let container = document.getElementById('contentJobs');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.likes, 10) - order * parseInt(b.dataset.likes, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProjects').style.display === 'flex'){
		let container = document.getElementById('contentProjects');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.likes, 10) - order * parseInt(b.dataset.likes, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProducts').style.display === 'flex'){
		let container = document.getElementById('contentProducts');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.likes, 10) - order * parseInt(b.dataset.likes, 10))
			.forEach(element => container.appendChild(element));
	}
}

function sortByComments() {
	if(document.getElementById('contentAll').style.display === 'flex' || document.getElementById('contentAll').style.display === "") {
		let container = document.getElementById('contentAll');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.comments, 10) - order * parseInt(b.dataset.comments, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentJobs').style.display === 'flex'){
		let container = document.getElementById('contentJobs');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.comments, 10) - order * parseInt(b.dataset.comments, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProjects').style.display === 'flex'){
		let container = document.getElementById('contentProjects');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.comments, 10) - order * parseInt(b.dataset.comments, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProducts').style.display === 'flex'){
		let container = document.getElementById('contentProducts');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.comments, 10) - order * parseInt(b.dataset.comments, 10))
			.forEach(element => container.appendChild(element));
	}
}

function sortByDate() {
	if(document.getElementById('contentAll').style.display === 'flex' || document.getElementById('contentAll').style.display === "") {
		let container = document.getElementById('contentAll');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.datee, 10) - order * parseInt(b.dataset.datee, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentJobs').style.display === 'flex'){
		let container = document.getElementById('contentJobs');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.datee, 10) - order * parseInt(b.dataset.datee, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProjects').style.display === 'flex'){
		let container = document.getElementById('contentProjects');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.datee, 10) - order * parseInt(b.dataset.datee, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProducts').style.display === 'flex'){
		let container = document.getElementById('contentProducts');
		let order = -1;
		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.datee, 10) - order * parseInt(b.dataset.datee, 10))
			.forEach(element => container.appendChild(element));
	}

}

function sortByRating() {
	if(document.getElementById('contentAll').style.display === 'flex' || document.getElementById('contentAll').style.display === "") {
		let container = document.getElementById('contentAll');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.rating, 10) - order * parseInt(b.dataset.rating, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentJobs').style.display === 'flex'){
		let container = document.getElementById('contentJobs');
		let order = -1;
	
		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.rating, 10) - order * parseInt(b.dataset.rating, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProjects').style.display === 'flex'){
		let container = document.getElementById('contentProjects');
		let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.rating, 10) - order * parseInt(b.dataset.rating, 10))
			.forEach(element => container.appendChild(element));
	}
	else if(document.getElementById('contentProducts').style.display === 'flex'){
		let container = document.getElementById('contentProducts');
	
	let order = -1;

		Array.from(container.children)
			.sort((a, b) => order * parseInt(a.dataset.rating, 10) - order * parseInt(b.dataset.rating, 10))
			.forEach(element => container.appendChild(element));
	}
}

const circleType = new CircleType(
	document.getElementById("rotated")
).radius(50);

// document.getElementById('backToTopArrow')

function backToTop() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

document.getElementById('messagingIframe').addEventListener("mouseover", function() {  
	document.getElementById('magicMouseCursor').style.opacity = "0";
	document.getElementById('magicPointer').style.opacity = "0";
})

document.getElementById('messagingIframe').addEventListener("mouseout", function() {  
	document.getElementById('magicMouseCursor').style.opacity = "1";
	document.getElementById('magicPointer').style.opacity = "1";
})

document.getElementById('messagingExitButton').addEventListener("mouseover", function() {  
	document.getElementById('magicMouseCursor').style.opacity = "0";
	document.getElementById('magicPointer').style.opacity = "0";
})

document.getElementById('messagingExitButton').addEventListener("mouseout", function() {  
	document.getElementById('magicMouseCursor').style.opacity = "1";
	document.getElementById('magicPointer').style.opacity = "1";
})

document.getElementById('messagingExitButton').addEventListener("click", function() {  
	document.getElementById('messagingIframeContainer').style.left = "1500px";
})

document.getElementById('messageButtonContainer').addEventListener("click", function() {  
	document.getElementById('messagingIframeContainer').style.left = "0";
})

document.getElementById('logoutButtonContainer').addEventListener("mouseover", function() {  
	document.getElementById('navBar').style.background = "rgba(190, 75, 75, 0.5)";
})

document.getElementById('logoutButtonContainer').addEventListener("mouseout", function() {  
	document.getElementById('navBar').style.background = "rgba(150, 148, 142, 0.7)";
})

document.getElementById('logoutButtonContainer').addEventListener("dblclick", function() {  
	fetch("/logoutt/" + myId, {
		method: 'GET',
    }).then( function(response){
        return response.text();
    }).then( function(data){
		console.log(data);
		window.location.href = "https://evening-stream-02133.herokuapp.com/logout";
    });
})

document.getElementById('logoutButtonContainer').addEventListener("click", function() {  
	document.getElementById('logoutButtonContainerWord').textContent = "click again to confirm";
	setTimeout(function(){ 	
		document.getElementById('logoutButtonContainerWord').textContent = "sign off";
	}, 2000)
})

function loginn() {
	fetch("/loginn/" + myId, {
		method: 'GET',

		
    }).then( function(response){
        return response.text();
    }).then( function(data){
		console.log(data);
   
    });
}

function unhidePost(unhideThisPost){
	unhideThisPost.parentElement.parentElement.parentElement.parentElement.style.display = "none"
	unhideThisPost.parentElement.parentElement.parentElement.parentElement.nextElementSibling.style.display = "flex"
	
	fetch("/unhidepost/" + myId + "/" + unhideThisPost.getAttribute('data-id'), {
		method: 'GET',

    }).then( function(response){
        return response.text();
    }).then( function(data){
		console.log(data);
    });
}

function hideThisPost(hideThis){
	hideThis.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = "none"
	hideThis.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.previousElementSibling.style.display = "flex"
	// console.log(123)

	fetch("/hidepost/" + myId + "/" + hideThis.getAttribute('data-id'), {
		method: 'GET',

    }).then( function(response){
        return response.text();
    }).then( function(data){
		console.log(data);
    });
}

function editComment(editThis) {

	if(editThis.classList.contains('fa-pencil')) {
		editThis.parentElement.previousElementSibling.removeAttribute("disabled");
		editThis.style.color = "green"
		editThis.nextElementSibling.style.color = "red"
	
		editThis.classList.remove("fa-pencil");
		editThis.classList.add("fa-check");

		editThis.nextElementSibling.classList.remove("fa-trash");
		editThis.nextElementSibling.classList.add("fa-remove");

		editThis.parentElement.previousElementSibling.setAttribute("data-commentBody", editThis.parentElement.previousElementSibling.value);

		// console.log("update comment")
		// console.log(editThis.parentElement.previousElementSibling.getAttribute("data-commentBody"))
	}

	else {
		editThis.parentElement.previousElementSibling.setAttribute("disabled", "true");

		editThis.style.color = "black"
		editThis.nextElementSibling.style.color = "black"

		editThis.classList.remove("fa-check");
		editThis.classList.add("fa-pencil");

		editThis.nextElementSibling.classList.remove("fa-remove");
		editThis.nextElementSibling.classList.add("fa-trash");

		// console.log("go update")
		var csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

		fetch("/editcomment/" + myId + "/" + editThis.getAttribute('data-id') + "/" + editThis.getAttribute('data-commentid') + "/" + editThis.parentElement.previousElementSibling.value, {
			method: 'GET',
			headers: {
				'Content-Type': 'application/json',
				"X-CSRF-Token": csrfToken
			}
	
		}).then( function(response){
			return response.text();
		}).then( function(data){
			console.log(data);
		});
	}
}

function deleteComment(deleteThis) {

	if( deleteThis.previousElementSibling !== null) {
		if(deleteThis.previousElementSibling.classList.contains('fa-check')) {
			deleteThis.parentElement.previousElementSibling.setAttribute("disabled", "true");
			deleteThis.parentElement.previousElementSibling.value = deleteThis.parentElement.previousElementSibling.getAttribute("data-commentBody");

			deleteThis.style.color = "black"
			deleteThis.previousElementSibling.style.color = "black"
	
			deleteThis.previousElementSibling.classList.remove("fa-check");
			deleteThis.previousElementSibling.classList.add("fa-pencil");
	
			deleteThis.classList.remove("fa-remove");
			deleteThis.classList.add("fa-trash");
			
			// console.log("cancel update")
		}
	
		else {

			var deleteCommentTippy = tippy(deleteThis,{
				content: 'Double click to delete comment.', 
				trigger: 'manual',
				placement: 'right',
				animation: 'scale',
			});

			deleteCommentTippy.show();

			setTimeout(function(){ 	
				deleteCommentTippy.hide();
			}, 1000)
			
			// console.log("double click to delete.")
		}
	}

	else {
		var deleteCommentTippy = tippy(deleteThis,{
			content: 'Double click to delete comment.', 
			trigger: 'manual',
			placement: 'right',
			animation: 'scale',
		});

		deleteCommentTippy.show();

		setTimeout(function(){ 	
			deleteCommentTippy.hide();
		}, 1000)

		// console.log("delete comment")
	}
}

function deleteCommentConfirm(deleteThisConfirm) {
	// console.log("comment deleted")
	deleteThisConfirm.parentElement.parentElement.parentElement.style.display = "none";

	deleteThisConfirm.parentElement.parentElement.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.nextElementSibling.lastElementChild.textContent = (JSON.parse(deleteThisConfirm.parentElement.parentElement.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.nextElementSibling.lastElementChild.textContent)) - 1

	fetch("/deletecomment/" + myId + "/" + deleteThisConfirm.getAttribute('data-id') + "/" + deleteThisConfirm.getAttribute('data-commentid'), {
		method: 'GET',

	}).then( function(response){
		return response.text();
	}).then( function(data){
		console.log(data);
	});
}

var commentSendButton = document.getElementsByClassName('commentSendButton')
var contentJobCommentsWindow = document.getElementsByClassName('contentJobCommentsWindow')

function sendComment(sendThisComment) {
		sendThisComment.parentElement.parentElement.previousElementSibling.innerHTML = 
		`<div class="contentJobCommentsWindowCommentWrapper">
			<div class="contentJobCommentsWindowPic" style='background: url("` + myAvatar + `") no-repeat; background-size: cover; background-position:center;'></div>
		
			<div class="contentJobCommentsWindowComment">
				<div class="commentName">
					<strong>
						You
					</strong>: 
				</div>
		
				<input disabled class="commentBody" value="` + sendThisComment.parentElement.previousElementSibling.value + `" data-commentBody="`+ sendThisComment.parentElement.previousElementSibling.value +`"></input>

				<div class="commentButtons">
						<i onclick="editComment(this)" data-id="" data-commentid="" class="editComment fa fa fa-pencil magic-hover magic-hover__square"></i>

						<i data-id="" data-commentid="" onclick="deleteComment(this)" ondblclick="deleteCommentConfirm(this)" class="deleteComment fa fa-trash magic-hover magic-hover__square"></i>
				</div>
			</div>
		</div>` + sendThisComment.parentElement.parentElement.previousElementSibling.innerHTML

		sendThisComment.parentElement.parentElement.previousElementSibling.parentElement.nextElementSibling.firstElementChild.nextElementSibling.lastElementChild.textContent = (JSON.parse(sendThisComment.parentElement.parentElement.previousElementSibling.parentElement.nextElementSibling.firstElementChild.nextElementSibling.lastElementChild.textContent)) + 1
	
		fetch("/sendcomment/" + myId + "/" + sendThisComment.getAttribute('data-id') + "/" + sendThisComment.parentElement.previousElementSibling.value, {
			method: 'GET',
	
		}).then( function(response){
			return response.text();
		}).then( function(data){
			console.log(data);
			var commentdata = JSON.parse(data)
			// console.log(commentdata);
			// console.log(commentdata.id);
			// console.log(commentdata.postid);

			sendThisComment.parentElement.parentElement.previousElementSibling.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.setAttribute("data-id", commentdata.postid)

			sendThisComment.parentElement.parentElement.previousElementSibling.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.setAttribute("data-commentid", commentdata.id)

			sendThisComment.parentElement.parentElement.previousElementSibling.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.setAttribute("data-id", commentdata.postid)

			sendThisComment.parentElement.parentElement.previousElementSibling.firstElementChild.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.setAttribute("data-commentid", commentdata.id)
		});
	
		sendThisComment.parentElement.previousElementSibling.value = ""
}

function heartButtonClick(heartButton2) {
	if(heartButton2.classList.contains('fa-heart-o')){
		heartButton2.classList.remove('fa-heart-o')
		heartButton2.classList.add('fa-heart')
		// console.log(heartButton2)

		fetch("/likepost/" + myId + "/" + heartButton2.getAttribute('data-id'), {
			method: 'GET',
	
		}).then( function(response){
			return response.text();
		}).then( function(data){
			console.log(data);
		});

		heartButton2.nextElementSibling.textContent = (JSON.parse(heartButton2.nextElementSibling.textContent)) + 1
	}
	else{

		fetch("/unlikepost/" + myId + "/" + heartButton2.getAttribute('data-id'), {
			method: 'GET',
	
		}).then( function(response){
			return response.text();
		}).then( function(data){
			console.log(data);
		});

		heartButton2.classList.remove('fa-heart')
		heartButton2.classList.add('fa-heart-o')
		// console.log(heartButton2)
		heartButton2.nextElementSibling.textContent = (JSON.parse(heartButton2.nextElementSibling.textContent)) - 1
	}
}













