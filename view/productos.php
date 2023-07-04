<?php include_once "header.php"; ?>
<!-- body -->

<form id="roles">
    <div class="row">
        <h2 class="text-center bg-dark text-white">Productos</h2>
    </div>
    <div class="my-3 row d-flex justify-content-center">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="txtNombreP" class="fw-bold">Nombre:</label>
                <input type="text" name="txtNombreP" id="txtNombreP" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="txtPrecio" class="fw-bold">Precio:</label>
                <input type="number" name="txtPrecio" id="txtPrecio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="txtCantidad" class="fw-bold">Cantidad:</label>
                <input type="number" name="txtCantidad" id="txtCantidad" class="form-control" required>
            </div>
            <div class="form-group row mt-2 ">
                <div class="mb-3 col-lg-12">
                    <label for="txtDescripcion" class="fw-bold">Descripcion:</label>
                    <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-success" type="button" onclick="Create()">Agregar <i class="bi bi-plus-circle-fill" style="font-size: 1rem;"></i></button>
            </div>
            <br>
        </div>
    </div>
    <div class="row">
        <h2 class="text-center bg-dark text-white">Datos Productos</h2>
        <table class="table table-bordered" id="tblProductos">
            <thead>
                <tr style="color: black;">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                    <th scope="col">FechaCreacion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="tbl-Producto" style="color: black;">

            </tbody>
        </table>

    </div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">Editar Rol</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <label for="" class="">Edición Producto:</label><br>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="txtNombreEditar" placeholder="Digite el producto">
                                <label for="txtNombreEditar">Nombre Producto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="txtPrecioEditar" placeholder="Digite el precio">
                                <label for="txtPrecioEditar">Precio Producto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="txtCantidadEditar" placeholder="Digite el Cantidad">
                                <label for="txtCantidadEditar">Cantidad</label>
                            </div>
                            <div class="form-group row mt-2 ">
                                <div class="mb-3 col-lg-12">
                                    <label for="txtDescripcionEditar" class="fw-bold">Descripcion:</label>
                                    <textarea name="txtDescripcionEditar" id="txtDescripcionEditar" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button onclick="Update()" type="button" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

        <!-- Modal Eliminar-->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="daleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 id="mensajeEliminar"></h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button onclick="Delete()" type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include_once "footer.php"; ?>
<script src="assets/js/productos.js"></script>
<script src="assets/js/dataTable.js"></script>