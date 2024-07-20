<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
       
        'dueno' => $_POST['dueno'],
        'nombre' => $_POST['nombre'],
        'mascota' => $_POST['mascota'],
        'raza' => $_POST['raza'],
        'tratamientos' => $_POST['tratamientos'],
        'costo' => $_POST['costo'],
        'fecha' => $_POST['fecha']
    ];
    $context = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json",
            'content' => json_encode($data),
        ]
    ]);
    $url = HTTP_BASE . '/controller/VeterinariaController.php';
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response, true);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el adminsitrador.');</script>";
    }
}


?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modificar Cita</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Editar Cita</h3>
                            </div>
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="dueno">Dueño</label>
                                        <input type="text" class="form-control" name="dueno" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="mascota">Mascota</label>
                                        <input type="text" class="form-control" name="mascota" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="raza">Raza</label>
                                        <input type="text" class="form-control" name="raza" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tratamientos">Tratamientos</label>
                                        <input type="text" class="form-control" name="tratamientos" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="costo">Costo</label>
                                        <input type="text" class="form-control" name="costo" required value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <input type="text" class="form-control" name="fecha" required value="">
                                    </div>
                                                                    
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                                    <a class="btn btn-default" href="<?php echo HTTP_BASE; ?>/web/sg/list">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include ROOT_VIEW . "/template/footer.php"; ?>