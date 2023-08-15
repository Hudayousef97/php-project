// function fetchUsers(){

//     fetch("signUp.php")
//     .then(response=>response.json())
//     .then(data=>{
//         console.log(data);
//     })
// }
document.getElementById("signup").addEventListener("submit",function(e){
    e.preventDefault();
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var fname=document.getElementById("fname").value;
    var mname=document.getElementById("mname").value;
    var lname=document.getElementById("lname").value;
    var familyname=document.getElementById("familyname").value;
    var mobile=document.getElementById("mobile").value;
     var day = document.getElementById("day").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;
    var dob = new Date(year, month - 1, day);
    var today = new Date();
    var minAgeDate = new Date(today.getFullYear() - 16, today.getMonth(), today.getDate());
    // if (!validateEmail(email)) {
    //     alert("Please enter a valid email address.");
    //     return false;
    // }
    // if (!validateMobile(mobile)) {
    //     alert("Mobile number should be 14 digits.");
    //     return false;
    // }
    // if (!validateFullName(fname, lname)) {
    //     alert("Please enter valid first and last names.");
    //     return false;
    // }
    
    // if (!validatePassword(password, passwordConfirm)) {
    //     alert("Password should be at least 8 characters and match the confirmation.");
    //     return false;
    // }
    // if (dob > minAgeDate) {
    //     document.getElementById("ageError").innerText = "You must be at least 16 years old to register.";
    //     return false;
    // }

    // return true;
// }

// function validateEmail(email) {
//     // Email validation regex
//     var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
//     return emailPattern.test(email);
// }

// function validateMobile(mobile) {
//     // Mobile validation regex
//     var mobilePattern = /^\d{14}$/;
//     return mobilePattern.test(mobile);
// }
// function validateFullName(fname, lname) {
//     // Validate that fname and lname contain only letters
//     var namePattern = /^[A-Za-z]+$/;
//     return namePattern.test(fname) && namePattern.test(lname);
// }

// function validatePassword(password, confirmPassword) {
//     // Password strength validation regex
//     var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
//     return password === confirmPassword && passwordPattern.test(password);
// }
fetch("signUp.php",{
    method: "POST",
    headers:{
        "Content-Type":"Application/json",
    },
    body:JSON.stringify({
                password:password,
                email:email,
                fname:fname,
                mname:mname,
                lname:lname,
                familyname:familyname,
                mobile:mobile,
                day:day,
                month:month,
                year:year}),
        })

.then(response=>response.json())
.then(data=>{
    alert(data.message);
    document.getElementById("password").value="";
    document.getElementById("email").value="";
    document.getElementById("fname").value="";
    document.getElementById("mname").value="";
    document.getElementById("lname").value="";
    document.getElementById("familyname").vlue="";
    document.getElementById("mobile").value="";
    document.getElementById("day").value="";
    document.getElementById("month").value="";
    document.getElementById("year").value="";
    window.location.href='signup-success.html';
})

.catch(error=>{
    console.error("Error:",error);
})


 
})


   