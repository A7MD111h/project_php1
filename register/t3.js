function fetchUsers(){

    fetch("read.php")
    .then(response=>response.json())
    .then(data=>{
        console.log(data);
        
    })
}


    //fetching data from the server using POST method and passing the values to it as a JSON object
    //fetch("insert.php?name="+name+"&email="+email)

// //Event Listener for form submission
document.getElementById("registrationForm").addEventListener("submit",
function(e){
    e.preventDefault();
    
    var name = document.getElementById("name").value;
    var middle_name = document.getElementById("middle_name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var phone = document.getElementById("phone").value;
    var birthday = document.getElementById("birthday").value;
    // console.log("name",name,"email",email);
    

fetch("create.php",{
    method: "POST",
    headers:{
        "Content-Type":"Application/json",
    },
    body:JSON.stringify({
        name:name,
        middle_name:middle_name,
        last_name:last_name,
        email:email,
        password:password,
        phone: phone,
        birthday: birthday
    }),
})
.then(response=>response.json())
.then(data=>{
    // alert(data.message);
    document.getElementById("name").value="";
    document.getElementById("middle_name").value="";
    document.getElementById("last_name").value="";
    document.getElementById("email").value="";
    document.getElementById("password").value="";
    document.getElementById("phone").value="";
    document.getElementById("birthday").value="";
    window.location.href='../index.html';
})
.catch(error=>{
    console.error("Error:",error);
})
})
fetchUsers();



// <==========================>//

const form = document.getElementById('registrationForm');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const btn_signup = document.getElementById('btn_signup');

btn_signup.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Password2 cannot be blank');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Passwords does not match');
	} else{
		setSuccessFor(password2);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

