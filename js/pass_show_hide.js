let pass = document.querySelector(".form input[type='password']");
let toggleEye = document.querySelector(".form .field i");

toggleEye.onclick = () => {
    if(pass.type == "password") {
        pass.type = "text";
        toggleEye.classList.add("active");
    } else{
        pass.type = "password";
        toggleEye.classList.remove("active");
    }
}