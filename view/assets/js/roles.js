function Create() {
    //Informacion del formulario
    var data = `txtRol=${document.getElementById("txtRol").value}`;
    //Configuracion de la peticion
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    fetch("../controller/roles.create.php", options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            Read();
        })
        .catch((error) => {
            console.log("Error al crear rol");
        });

}
function Read() {
    fetch("../controller/roles.read.php")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let filas="";
            data.forEach((element,index)=> {
                filas+=`<tr>`;
                filas+=`<th scope='row'>${index+1}</th>`;    
                filas+=`<td>${element.nombreRol}</td>`;    
                filas+=`<td>${element.estado}</td>`;    
                filas+=`<td>${element.fechaCreacion}</td>`;    
                filas+=`<td><a onclick=readId(${element.id}) class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#updateModal'>Editar</a> <a class='btn btn-danger'>Eliminar</a></td>`;    
                filas+=`</tr>`;    
            });
            document.getElementById("tbl-Rol").innerHTML=filas
        })
        .catch((error) => {
            console.log("Error al consultar rol");
        });
}
function Update() {
    
}
function Delete() {

}
function readId(id) {
    console.log(id);
}

window.onload = (event) => {
    Read();
};