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
            console.log("-----Error al crear rol-----");
        });

}

function Read() {
    fetch("../controller/roles.read.php")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let filas = "";
            data.forEach((element, index) => {
                filas += `<tr>`;
                filas += `<th scope='row'>${index + 1}</th>`;
                filas += `<td>${element.nombreRol}</td>`;
                filas += `<td><div class="form-check form-switch">
                                <input onclick="statusRol('${element.id}','${element.estado}')" class="form-check-input" type="checkbox" role="switch" id="switch"${element.nombreRol}>
                                <label class="form-check-label" for="switch${element.nombreRol}">${element.estado == 'A' ? 'Activo' : 'Inactivo'}</label>
                             </div>
                            </td>`;
                filas += `<td>${element.fechaCreacion}</td>`;
                filas += `<td><a onclick=readId(${element.id}) class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#updateModal'>Editar</a> <a class='btn btn-danger'>Eliminar</a></td>`;
                filas += `</tr>`;
            });
            document.getElementById("tbl-Rol").innerHTML = filas
            actualizarEstado();
        })
        .catch((error) => {
            console.log("-----Error al consultar rol-----");
        });
}

function Update() {
    let nombreRol = document.getElementById("txtRolEditar").value
    let id = localStorage.id;
    let data = `nombreRol=${nombreRol}&id=${id}`;
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    fetch("../controller/roles.update.php", options)
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        Read();
    });
}
function Delete() {

}

function readId(id) {
    console.log(id);

    var data = `id=${id}`;

    //Configuracion de la peticion
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };

    fetch('http://localhost/mvcPokemon/controller/roles.readOne.php', options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            document.getElementById("txtRolEditar").value = data[0].nombreRol;
            localStorage.id = data[0].id;
        })
        .catch((error) => {
            console.log("-----Error al obtener los roles,por favor revisar-----" + error)
        })
}

function statusRol(id, estado) {
    let data = `id=${id}&estado=${estado}`;
    let options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    fetch("../controller/roles.estado.php", options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            Read();
        });
}

function actualizarEstado() {
    let dato = document.getElementById("tbl-Rol").getElementsByClassName("form-check-input");
    let label = document.getElementById("tbl-Rol").getElementsByClassName("form-check-label");
    for (let i = 0; i < dato.length; i++) {
        if (label[i].innerHTML == 'Activo') {
            dato[i].setAttribute("checked", "");
        }
    }
}

window.onload = (event) => {
    Read();
};