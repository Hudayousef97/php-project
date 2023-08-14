
document.getElementById("signup").addEventListener("submit",function(e){
    e.preventDefault();

    let email=document.getElementById("email").value;
    let password=document.getElementById("password").value;
    let fname=document.getElementById("fname").value;
    let mname=document.getElementById("mname").value;
    let lname=document.getElementById("lname").value;
    let familyname=document.getElementById("familyname").value;
    let mobile=document.getElementById("mobile").value;
    let day=document.getElementById("day").value;
    let month=document.getElementById("month").value;
    let year=document.getElementById("year").value;
    // if(email!=""){
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
        
        })
        .catch(error=>{
            console.error("Error:",error);
        })

    //     fetch("signUp.php",{
    //         method: "POST",
    //     headers:{
    //         "Content-Type":"Application/json",
    //     },
    //     body:JSON.stringify({
    //         password:password,
    //         email:email,
    //         fname:fname,
    //         mname:mname,
    //         lname:lname,
    //         familyname:familyname,
    //         mobile:mobile,
    //         day:day,
    //         month:month,
    //         year:year}),
    // })
    // .then(response=>response.json())
    // .then(data=>{
    //     alert(data.message);
    //     document.getElementById("password").value="";
    //     document.getElementById("email").value="";
    //     document.getElementById("fname").value="";
    //     document.getElementById("mname").value="";
    //     document.getElementById("lname").value="";
    //     document.getElementById("familyname").vlue="";
    //     document.getElementById("mobile").value="";
    //     document.getElementById("day").value="";
    //     document.getElementById("month").value="";
    //     document.getElementById("year").value="";
    // })
    // .catch(error=>{
    //     console.error("Error:",error);
    // })
// }
})