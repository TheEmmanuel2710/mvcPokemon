function login() {
    fetch(`../controller/login.php?txtCorreo=${txtCorreo.value}&txtPassword=${txtPassword.value}`)
    .then((response)=>response.json())
    .then((data)=>{
        try {
            console.log(data);
            if (data[0]["correo"]) {
                window.location.href="roles.php"
            }
        } catch (error) {
            alert("Usuario o Password incorrectos");
        }
    });
}