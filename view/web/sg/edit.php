<?php include ROOT_VIEW . "/template/header.php"; ?>
<?php
$pId = $_GET['id'] ?? null;

$record = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['id'],
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
            'method' => 'PUT',
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
if ($pId) {
    $url = HTTP_BASE . '/controller/VeterinariaController.php?ope=filterId&id=' . $pId;
    $reponse = file_get_contents($url);
    $reponseData = json_decode($reponse, true);
    if ($reponseData &&  $reponseData['ESTADO'] == 1 && !empty($reponseData['DATA'])) {
        $record = $reponseData['DATA'][0];
    } else {
        $record = null;
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
                                        <label for="id">Nro Registro</label>
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $record['id']; ?>">
                                        <input type="text" class="form-control" value="<?php echo $record['id']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="dueno">Dueño</label>
                                        <input type="text" class="form-control" name="dueno" required value="<?php echo $record['dueno']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" required value="<?php echo $record['nombre']; ?>" >
                                    </div
                                    <div class="form-group">
                                        <label for="mascota">Mascota</label>
                                        <input type="text" class="form-control" name="mascota" required value="<?php echo $record['mascota']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="raza">Raza</label>
                                        <input type="text" class="form-control" name="raza" required value="<?php echo $record['raza']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="tratamientos">Tratamientos</label>
                                        <input type="text" class="form-control" name="tratamientos" required value="<?php echo $record['tratamientos']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="costo">Costo</label>
                                        <input type="text" class="form-control" name="costo" required value="<?php echo $record['costo']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <input type="text" class="form-control" name="fecha" required value="<?php echo $record['fecha']; ?>" >
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