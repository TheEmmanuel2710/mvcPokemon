<?php include_once "header.php"; ?>
<!-- body -->

<form id="roles">
    <div class="row">
        <h2 class="text-center bg-dark text-white">Roles</h2>
    </div>
    <div class="my-3 row d-flex justify-content-center">
        <label for="inputPassword" class="col-sm-2 col-form-label aling-self-center">Asignacion roles:</label>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="txtRol" placeholder="name">
                <label for="txtRol">Nombre rol</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-success" type="button" onclick="Create()">Agregar</button>
            </div>
            <br>
        </div>
    </div>
    <div class="row">
        <h2 class="text-center bg-dark text-white">Datos Roles</h2>
        <table class="table table-bordered bg-dark">
            <thead>
                <tr style="color: white;">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre rol</th>
                    <th scope="col">Estado</th>
                    <th scope="col">FechaCreacion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="tbl-Rol" style="color: white;">

            </tbody>
        </table>
    </div>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario de Edición</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Acutualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include_once "footer.php"; ?>
<script src="assets/js/roles.js"></script>