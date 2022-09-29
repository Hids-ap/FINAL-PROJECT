
    let but = document.querySelector("button");
    but.addEventListener("click", function(va)
    {
    let first = document.querySelector("#firstname_input");
    if(first == "")
    {
        alert("First name must be filled out");
    }
///////////////////////////////////////////////////////////

    let last = document.querySelector("#lastname_input");
    if(last == "")
    {
        alert("Last name must be filled out");
    }
///////////////////////////////////////////////////////////
    let pass = document.querySelector("#password_input");
    if(pass == "")
    {
        alert("password must be filled out");
    }
///////////////////////////////////////////////////////////
    let cw = document.querySelector("#weight1_input");
    if(cw == "")
    {
        alert ("Current Weight must be fill out");
    }
///////////////////////////////////////////////////////////
let gw = document.querySelector("#weight2_input");
if(cw == "")
{
    alert ("Goal Weight must be fill out");
}
///////////////////////////////////////////////////////////
let age = document.querySelector("#age_input");
if(age == "")
{
    alert("age must be fill out");
}
///////////////////////////////////////////////////////////
let height = document.querySelector("#height_input");
if(height == "")
{
    alert("height must be fill out");
}
///////////////////////////////////////////////////////////

let BMI = document.querySelector("#BMI_input");
if (BMI == "")
{
    alert("BMI must be fill out");
}    
///////////////////////////////////////////////////////////
let street = document.querySelector("#streetaddress_input");
if (street == "")
{
    alert("Street address must be filled");
}
///////////////////////////////////////////////////////////

let option = document.querySelector("option");
if (option.value == 0)
{
    alert("select your province");
}
///////////////////////////////////////////////////////////
let city = document.querySelector("#city_input");
if(city =="")
{
    alert("city must be fill out ");
}
//////////////////////////////////////////////////////////
let zip = document.querySelector("#postal_input");
if (zip == "" || zip.length == 6 )
{
    alert("zip code must be fill out");
}
//////////////////////////////////////////////////////////
let email = document.querySelector("#email_input");
if(email == "")
{
    alert("email must be fill out");
}
//////////////////////////////////////////////////////////
let phone = document.querySelector("#phone_input");
if(phone =="")
{
    alert("phone number must be fill out");
}

});