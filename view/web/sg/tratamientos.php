<?php require(ROOT_VIEW . '/template/header.php'); ?>
<?php
$page = 1;
$ope = 'filterSearch';
$filter = '';
$items_per_page = 10;
$total_pages = 1;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $filter = urlencode(trim(isset($_POST['filter']) ? $_POST['filter'] : ''));
}
$url = HTTP_BASE . "/controller/VeterinariaController.php?ope=" . $ope . "&page=" . $page . "&filter=" . $filter;
$filter = urldecode($filter);
$response = file_get_contents($url);
$responseData = json_decode($response, true);
$records = $responseData['DATA'];
$totalItems = $responseData['LENGTH'];
try {
    $total_pages =  ceil($totalItems / $items_per_page);
} catch (Exception $e) {
    $total_pages = 1;
}
//paginacion
$max_links = 5;
$half_max_link = floor($max_links / 2);
$start_page = $page - $half_max_link;
$end_page = $page + $half_max_link;
if ($start_page < 1) {
    $end_page += abs($start_page) + 1;
    $start_page = 1;
}
if ($end_page > $total_pages) {
    $start_page -= ($end_page - $total_pages);
    $end_page = $total_pages;
    if ($start_page < 1) {
        $start_page = 1;
    }
}
?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">tratamientos pendientes</h1>
                        </div><!-- /.col -->
                        <!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="m-0">tratamientos: </h1>
                        </div>
                        <div class="card-header">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="filter" name="filter" class="form-control form-control-lg" placeholder="Buscar" value="<?php echo $filter; ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Mascota</th>
                                            <th>Raza</th>
                                            <th>Tratamientos</th>
                                            <th>Costo</th>
                                            <th>Fecha</th>
                                            <th>progreso</th>
                                            <th>porcentaje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($records as  $row) : ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                                <td><?php echo htmlspecialchars($row['mascota']); ?></td>
                                                <td><?php echo htmlspecialchars($row['raza']); ?></td>
                                                <td><?php echo htmlspecialchars($row['tratamientos']); ?></td>
                                                <td><?php echo htmlspecialchars($row['costo']); ?></td>
                                                <td><?php echo htmlspecialchars($row['fecha']); ?></td>
                                                <?php $porcent=rand(1,100);
                                                $col='';
                                                if ($porcent>75){
                                                    $col="success";
                                                }else if ($porcent>50){
                                                    $col="primary";
                                                }else if($porcent>25){
                                                    $col="warning";
                                                }else{
                                                    $col="danger";
                                                }
                                                ?>
                                                <td>
                                                    <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar bg-<?php echo htmlspecialchars($col);?>" style="width: <?php echo htmlspecialchars($porcent).'%';?>"></div>
                                                    </div>
                                                </td>
                                                </td>
                                                <td><span class="badge bg-<?php echo htmlspecialchars($col);?>"><?php echo htmlspecialchars($porcent).'%';?></span></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination">
                                    <?php if ($page > 1) : ?>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="1">
                                                <button type="submit" class="page-link">Primera</button>
                                            </form>
                                        </li>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo ($page - 1); ?>">
                                                <button type="submit" class="page-link">&laquo;</button>
                                            </form>

                                        </li>
                                    <?php endif; ?>
                                    <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                                        <li class="page-item <?php echo ($page == $i ? 'active' : '') ?>">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo ($i); ?>">
                                                <button type="submit" class="page-link"><?php echo ($i); ?></button>
                                            </form>
                                        </li>
                                    <?php endfor; ?>
                                    <?php if ($page < $total_pages) : ?>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo ($page+1);?>">
                                                <button type="submit" class="page-link">&raquo;</button>
                                            </form>
                                        </li>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo $total_pages; ?>">
                                                <button type="submit" class="page-link">Ultima </button>
                                            </form>

                                        </li>
                                    <?php endif; ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php require(ROOT_VIEW . '/template/footer.php'); ?>