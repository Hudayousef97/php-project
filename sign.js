// document.getElementById("signup").addEventListener("submit",function(e){
//     e.preventDefault();
    
//     var fname = document.getElementById("fname").value;
//     var email = document.getElementById("email").value;
//     var password=document.getElementById("password").value;
    
//     fetch("signUp.php",{
//         method: "POST",
//         headers:{
//             "Content-Type":"Application/json",
//         },
//         body:JSON.stringify({fname:fname,email:email,password:password}),
//     })
//     .then(response=>response.json())
//     .then(data=>{
//         alert(data.message);
//         document.getElementById("fname").value="";
//         document.getElementById("email").value="";
//         document.geElemantById("password").value="";
    
//     })
//     .catch(error=>{
//         console.error("Error:",error);
//     })
//     })