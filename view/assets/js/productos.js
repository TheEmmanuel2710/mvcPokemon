
function Create() {
    // Informacion del formulario
    var data = new URLSearchParams();
    data.append('txtNombreP', document.getElementById("txtNombreP").value);
    data.append('txtPrecio', document.getElementById("txtPrecio").value);
    data.append('txtCantidad', document.getElementById("txtCantidad").value);
    data.append('txtDescripcion', document.getElementById("txtDescripcion").value);

    // Configuracion de la peticion
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };

    fetch("../controller/productos.create.php", options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            Read();
            location.reload();
        })
        .catch((error) => {
            console.log("-----Error al crear producto-----");
        });
}


function Read() {
    fetch("../controller/productos.read.php")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let filas = "";
            data.forEach((element, index) => {
                filas += `<tr>`;
                filas += `<th scope='row'>${index + 1}</th>`;
                filas += `<td>${element.nombrePro}</td>`;
                filas += `<td>${element.precioPro}</td>`;
                filas += `<td>${element.cantidadPro}</td>`;
                filas += `<td>${element.descripPro}</td>`;
                filas += `<td><div class="form-check form-switch">
                                <input onclick="statusRol('${element.id}','${element.estado}')" class="form-check-input" type="checkbox" role="switch" id="switch"${element.nombreRol}>
                                <label class="form-check-label" for="switch${element.nombrePro}">${element.estado == 'A' ? 'Activo' : 'Inactivo'}</label>
                                </div>
                          </td>`;
                filas += `<td>${element.fechaCreacion}</td>`;
                filas += `<td><a onclick=readId(${element.id}) class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#updateModal'><i class="fa fa-edit text-white" tile="ver/editar" style="font-size: 1rem;"></i></a> <a  onclick="deleteID(${element.id},'${element.nombrePro}')" class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal'><i class="fa fa-trash" title="Eliminar style="font-size: 1rem;"></i></a></td>`;
                filas += `</tr>`;
            });
            document.getElementById("tbl-Producto").innerHTML = filas
            cargarDataTable($("#tblProductos"), "LISTADO PRODUCTOS", 7);
            actualizarEstado();
        })
        .catch((error) => {
            console.log("-----Error al consultar producto-----");
        });
}


function Update() {
    let nombrePro = document.getElementById("txtNombreEditar").value;
    let precioPro = document.getElementById("txtPrecioEditar").value;
    let cantidadPro = document.getElementById("txtCantidadEditar").value;
    let descripPro = document.getElementById("txtDescripcionEditar").value;
    let id = localStorage.id;
    let data = `txtNombreEditar=${nombrePro}&txtPrecioEditar=${precioPro}&txtCantidadEditar=${cantidadPro}&txtDescripcionEditar=${descripPro}&id=${id}`;
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    fetch("../controller/productos.update.php", options)
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        Read();
        location.reload();
    });
}

function Delete() {
    let id = localStorage.id;
    let data = `id=${id}}`;
    var options = {
        method: "POST",
        body: data,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    };
    fetch("../controller/productos.delete.php", options)
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        Read();
        location.reload();
    });
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

    fetch('../controller/productos.readOne.php', options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            document.getElementById("txtNombreEditar").value = data[0].nombrePro;
            document.getElementById("txtPrecioEditar").value = data[0].precioPro;
            document.getElementById("txtCantidadEditar").value = data[0].cantidadPro;
            document.getElementById("txtDescripcionEditar").value = data[0].descripPro;
            localStorage.id = data[0].id;
        })
        .catch((error) => {
            console.log("-----Error al obtener los productos,por favor revisar-----" + error)
        })
}

function deleteID(id,nombrePro) {
    document.getElementById("mensajeEliminar").innerHTML=`¿Seguro de eliminar el producto? ${nombrePro}`;
    localStorage.id=id
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
    fetch("../controller/productos.estado.php", options)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            Read();
            location.reload();
        });
}

function actualizarEstado() {
    let dato = document.getElementById("tbl-Producto").getElementsByClassName("form-check-input");
    let label = document.getElementById("tbl-Producto").getElementsByClassName("form-check-label");
    for (let i = 0; i < dato.length; i++) {
        if (label[i].innerHTML == 'Activo') {
            dato[i].setAttribute("checked", "");
        }
    }
}

window.onload = (event) => {
    Read();
};
