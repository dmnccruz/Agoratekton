const loginFormsWrapper = document.getElementById('loginFormsWrapper')
const registerFormsWrapper = document.getElementById('registerFormsWrapper')
const loginButton2 = document.getElementById('loginButton2')

function openLogin() {
	loginFormsWrapper.style.pointerEvents = "all"
	loginFormsWrapper.style.display = "flex"
	loginFormsWrapper.style.opacity = "1"
}

function exitLogin() {
	setTimeout(function(){ 
		loginFormsWrapper.style.opacity = "0"
		loginFormsWrapper.style.pointerEvents = "none"
		}, 500);

	setTimeout(function(){ 
		loginFormsWrapper.style.display = "none"
		loginFormsWrapper.style.opacity = "1"
	}, 2000);
}

function goLogin() {
	document.getElementById('email').value = document.getElementById('loginEmailInput').value
	document.getElementById('password').value = document.getElementById('loginPasswordInput').value
	document.getElementById('laravelLoginButton').click()
	console.log(123)
}

function openRegister() {
	registerFormsWrapper.style.pointerEvents = "all"
	registerFormsWrapper.style.display = "flex"
	registerFormsWrapper.style.opacity = "1"
}

function exitRegister() {
	setTimeout(function(){ 
		registerFormsWrapper.style.opacity = "0"
		registerFormsWrapper.style.pointerEvents = "none"
		}, 500);

	setTimeout(function(){ 
		registerFormsWrapper.style.display = "none"
		registerFormsWrapper.style.opacity = "1"
	}, 2000);
}


var loginEmailInput2 = tippy(document.getElementById('loginEmailInput'),{
    content: 'email cannot be blank', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var loginPasswordInput2 = tippy(document.getElementById('loginPasswordInput'),{
    content: 'password cannot be blank', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});


loginButton2.disabled = true;
const loginEmailInput = document.getElementById('loginEmailInput')
const loginPasswordInput = document.getElementById('loginPasswordInput')

loginEmailInput.addEventListener('blur', function(){
    if(loginEmailInput.value === ""){
		loginEmailInput2.show();
        loginEmailInput.style.animation = "shakeAndColor .5s forwards";
		loginButton2.disabled = true;
    }
    else {
        loginEmailInput.style.animation = "none";
		loginEmailInput2.hide();
		loginButton2.disabled = false;
    }
});

loginPasswordInput.addEventListener('blur', function(){
    if(loginPasswordInput.value === ""){
		loginPasswordInput2.show();
        loginPasswordInput.style.animation = "shakeAndColor .5s forwards";
		loginButton2.disabled = true;
    }
    else {
        loginPasswordInput.style.animation = "none";
		loginPasswordInput2.hide();
		loginButton2.disabled = false;
    }
});



const registerName = document.getElementById('registerName').firstElementChild
const registerEmail = document.getElementById('registerEmail').firstElementChild
const registerPassword = document.getElementById('registerPassword').firstElementChild
const registerConfirmPassword = document.getElementById('registerConfirmPassword').firstElementChild
const registerButtonMain = document.getElementById('registerButtonMain')

var firstNameTippy = tippy(document.getElementById('firstName'),{
    content: 'First name field cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var firstNameTippy2 = tippy(document.getElementById('firstName'),{
    content: 'First name cannot contain numbers or symbols.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var lastNameTippy = tippy(document.getElementById('lastName'),{
    content: 'Last name field cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var lastNameTippy2 = tippy(document.getElementById('lastName'),{
    content: 'Last name cannot contain numbers or symbols.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var registerEmailTippy = tippy(document.getElementById('registerEmail'),{
    content: 'Email field cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var registerEmailTippy2 = tippy(document.getElementById('registerEmail'),{
    content: 'This is not a valid email.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var registerEmailTippy3 = tippy(document.getElementById('registerEmail'),{
    content: 'Email address is already taken', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var registerPasswordTippy = tippy(document.getElementById('registerPassword'),{
    content: 'Password field cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var registerPasswordTippy2 = tippy(document.getElementById('registerPassword'),{
    content: 'Password must contain atleast: 1 Capital letter, 1 small letter, 1 Number, 1 Symbol, and atleast be 8-32 characters long.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var confirmPasswordTippy = tippy(document.getElementById('registerConfirmPassword'),{
    content: 'Confirm Password field cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var confirmPasswordTippy2 = tippy(document.getElementById('registerConfirmPassword'),{
    content: 'Passwords does not match.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var nickNameTippy = tippy(document.getElementById('registerName'),{
    content: 'Nickname field cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var nickNameTippy2 = tippy(document.getElementById('registerName'),{
    content: 'Nickname cannot contain numbers or symbols.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

var mottoTippy = tippy(document.getElementById('motto'),{
    content: 'Motto field cannot be blank.', 
    trigger: 'manual',
    placement: 'right',
    animation: 'scale',
});

const registerEmailLetters = 
/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const registerPasswordLetters = /^(?=.*?[0-9])(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[^\w\s]).{8,32}$/;
registerButtonMain.disabled = true
const nickNameLetters = /^[A-Za-z]+$/;


registerEmail.addEventListener('blur', function(){

    if(registerEmail.value === ""){
        registerEmailTippy.show();
        registerEmail.style.animation = "shakeAndColor .5s forwards";
    }
    else if((!registerEmail.value.match(registerEmailLetters))){
        registerEmailTippy2.show();
        registerEmail.style.animation = "shakeAndColor .5s forwards";
    }
    else {
        registerEmailTippy.hide();
        registerEmailTippy2.hide();
		registerEmail.style.animation = "none";
		
		// if( (registerPassword.value !== "") && (registerPassword.value.match(registerPasswordLetters)) && (registerConfirmPassword.value !== "")  && (registerConfirmPassword.value === registerPassword.value) && (!registerName.value.match(nickNameLetters)) && (registerName.value !== "") ){
		// 	registerButtonMain.disabled = false
		// }

		

if(registerName.value !== "" && registerConfirmPassword.value !== "" && registerPassword.value !== "" && registerEmail.value !== "") {
	registerButtonMain.disabled = false
}
		

    }
});



registerPassword.addEventListener('blur', function(){
	console.log(123)
    if(registerPassword.value === ""){
        registerPasswordTippy.show();
        registerPassword.style.animation = "shakeAndColor .5s forwards";
    }
    else if((!registerPassword.value.match(registerPasswordLetters)) && (registerPassword.value !== "")){
        registerPasswordTippy2.show();
        registerPassword.style.animation = "shakeAndColor .5s forwards";
    }
    else {
        registerPasswordTippy.hide();
        registerPasswordTippy2.hide();
		registerPassword.style.animation = "none";
		
		// if( (registerPassword.value !== "") && (registerPassword.value.match(registerPasswordLetters)) && (registerConfirmPassword.value !== "")  && (registerConfirmPassword.value === registerPassword.value) && (!registerName.value.match(nickNameLetters)) && (registerName.value !== "") ){
		// 	registerButtonMain.disabled = false
		// }
		

// if(registerName.style.animation === "none" && registerConfirmPassword.style.animation === "none" && registerPassword.style.animation === "none" && registerEmail.style.animation === "none") {
// 	registerButtonMain.disabled = false

// }


		

if(registerName.value !== "" && registerConfirmPassword.value !== "" && registerPassword.value !== "" && registerEmail.value !== "") {
	registerButtonMain.disabled = false
}
		
	}
	
});


registerConfirmPassword.addEventListener('blur', function(){
    if(registerConfirmPassword.value === ""){
        confirmPasswordTippy.show();
        registerConfirmPassword.style.animation = "shakeAndColor .5s forwards";
    }
    else if(registerConfirmPassword.value !== registerPassword.value){
        confirmPasswordTippy2.show();
        registerConfirmPassword.style.animation = "shakeAndColor .5s forwards";
    }  
    else {
        confirmPasswordTippy2.hide();
		registerConfirmPassword.style.animation = "none";
		
		// if( (registerPassword.value !== "") && (registerPassword.value.match(registerPasswordLetters)) && (registerConfirmPassword.value !== "")  && (registerConfirmPassword.value === registerPassword.value) && (!registerName.value.match(nickNameLetters)) && (registerName.value !== "") ){
		// 	registerButtonMain.disabled = false
		// }

		

// if(registerName.style.animation === "none" && registerConfirmPassword.style.animation === "none" && registerPassword.style.animation === "none" && registerEmail.style.animation === "none") {
// 	registerButtonMain.disabled = false

// }


		

if(registerName.value !== "" && registerConfirmPassword.value !== "" && registerPassword.value !== "" && registerEmail.value !== "") {
	registerButtonMain.disabled = false
}
		
    }
});


registerName.addEventListener('blur', function(){

    // if(!registerName.value.match(nickNameLetters) && (registerName.value !== "")){
    //     nickNameTippy2.show();
    //     registerName.style.animation = "shakeAndColor .5s forwards";
    // }
    if(registerName.value === ""){
        nickNameTippy.show();
        registerName.style.animation = "shakeAndColor .5s forwards";
    }
    else {
        // nickNameTippy2.hide();
        nickNameTippy.hide();
		registerName.style.animation = "none";
		
		// if( (registerPassword.value !== "") && (registerPassword.value.match(registerPasswordLetters)) && (registerConfirmPassword.value !== "")  && (registerConfirmPassword.value === registerPassword.value) && (!registerName.value.match(nickNameLetters)) && (registerName.value !== "") ){
		// }
		

		// if(registerName.style.animation === "none" && registerConfirmPassword.style.animation === "none" && registerPassword.style.animation === "none" && registerEmail.style.animation === "none") {
		// 	registerButtonMain.disabled = false
		
		// }

	
		if(registerName.value !== "" && registerConfirmPassword.value !== "" && registerPassword.value !== "" && registerEmail.value !== "") {
			registerButtonMain.disabled = false
		}

    }
});






function registerNow() {

	setTimeout(function(){ 
		registerFormsWrapper.style.opacity = "0"
		registerFormsWrapper.style.pointerEvents = "none"
		document.getElementById('successRegisterWindow').style.pointerEvents = "all"
		document.getElementById('successRegisterWindow').style.display = "flex"
		document.getElementById('successRegisterWindow').style.opacity = "1"
	}, 500);

	setTimeout(function(){ 
		registerFormsWrapper.style.display = "none"
		registerFormsWrapper.style.opacity = "1"
		document.getElementById('successRegisterWindow').style.pointerEvents = "none"
		document.getElementById('successRegisterWindow').style.display = "none"
		document.getElementById('successRegisterWindow').style.opacity = "0"
		loginFormsWrapper.style.pointerEvents = "all"
		loginFormsWrapper.style.display = "flex"
		loginFormsWrapper.style.opacity = "1"
	}, 4000);

	
		// let data = new FormData; 
		// data.append("_token", "{{ csrf_token() }}")
	
		// data.append("name", registerName.value);
		// data.append("email", registerEmail.value);
		// data.append("password", registerPassword.value);
		// data.append("avatar", profilePic2);


		if(document.getElementById('roleRegular').classList.contains('roleActive')) {
			// data.append("role_id", "2");
			var roleId = "2"
		}

		if(document.getElementById('roleArchitect').classList.contains('roleActive')) {
			// data.append("role_id", "3");
			var roleId = "3"

		}

		if(document.getElementById('roleSupplier').classList.contains('roleActive')) {
			// data.append("role_id", "4");
			var roleId = "4"
		}




		var name = registerName.value;
		var email = registerEmail.value;
		var password = registerPassword.value;
		var avatar = document.getElementById("profilePic").files[0].name;


		// console.log(data);
		// console.log(data.getAll("name"))
		// console.log(data.getAll("email"))
		// console.log(data.getAll("password"))
		// console.log(data.getAll("avatar"))
		// console.log(data.getAll("role_id"))

		fetch("/newUser/" + name + "/" +  email + "/" + password + "/" + avatar + "/" + roleId, {
			method: "GET",
		}).then(function(response){
			return response.text();
			console.log($POST);
	
		}).then(function(reponse_from_fetch){
			console.log(reponse_from_fetch);

		})

}


var loadFile = function(event) {
	var image2 = document.getElementById('output');
	console.log(URL.createObjectURL(event.target.files[0]))
	image2.src = URL.createObjectURL(event.target.files[0]);
  };

function regularUser(regUser){
	regUser.classList.add('roleActive')
	regUser.nextElementSibling.classList.remove('roleActive')
	regUser.nextElementSibling.nextElementSibling.classList.remove('roleActive')
}

function archUser(arUser){
	arUser.classList.add('roleActive')
	arUser.nextElementSibling.classList.remove('roleActive')
	arUser.previousElementSibling.classList.remove('roleActive')
}

function suppUser(supUser){
	supUser.classList.add('roleActive')
	supUser.previousElementSibling.classList.remove('roleActive')
	supUser.previousElementSibling.previousElementSibling.classList.remove('roleActive')
}


var loadFile = function(event) {
    var image = document.getElementById('output');
    console.log(URL.createObjectURL(event.target.files[0]))
    image.src = URL.createObjectURL(event.target.files[0]);
};

