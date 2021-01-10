
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administração Site</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/core.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <?php require('menuLateral.php'); ?>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Administração do Site</h2>
      <hr>
      <div class="row clearfix progress-box">
      				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
      					<div class="card-box pd-30 height-100-p">
      						<div class="progress-box text-center">
      							 <input type="text" class="knob dial1" value="80" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff" data-angleOffset="180" readonly>
      							<h5 class="text-blue padding-top-10 h5">Acessos no Site</h5>
      							<span class="d-block">80% Clickes <i class="fa fa-line-chart text-blue"></i></span>
      						</div>
      					</div>
      				</div>
      				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
      					<div class="card-box pd-30 height-100-p">
      						<div class="progress-box text-center">
      							 <input type="text" class="knob dial2" value="70" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091" data-angleOffset="180" readonly>
      							<h5 class="text-light-green padding-top-10 h5">Controle de Clientes</h5>
      							<span class="d-block">70% Clientes <i class="fa text-light-green fa-line-chart"></i></span>
      						</div>
      					</div>
      				</div>
      				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
      					<div class="card-box pd-30 height-100-p">
      						<div class="progress-box text-center">
      							 <input type="text" class="knob dial3" value="90" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767" data-angleOffset="180" readonly>
      							<h5 class="text-light-orange padding-top-10 h5">Vendas</h5>
      							<span class="d-block">90% Vendas <i class="fa text-light-orange fa-line-chart"></i></span>
      						</div>
      					</div>
      				</div>
      				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
      					<div class="card-box pd-30 height-100-p">
      						<div class="progress-box text-center">
      							 <input type="text" class="knob dial4" value="65" data-width="120" data-height="120" data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb" data-angleOffset="180" readonly>
      							<h5 class="text-light-purple padding-top-10 h5">Favoritados</h5>
      							<span class="d-block">65% Favoritos <i class="fa text-light-purple fa-line-chart"></i></span>
      						</div>
      					</div>
      				</div>
      			</div>
            <!-- GRAFICO LINHAS -->
            <div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Controle de Qualidade</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Qualidade dos Serviços</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div>
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Best Selling Products</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Product</th>
							<th>Name</th>
							<th>Size</th>
							<th>Price</th>
							<th>Oty</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-1.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Shirt</h5>
								by John Doe
							</td>
							<td>M</td>
							<td>$1000</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-2.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Boots</h5>
								by Lea R. Frith
							</td>
							<td>9UK</td>
							<td>$900</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-3.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Hat</h5>
								by Erik L. Richards
							</td>
							<td>M</td>
							<td>$100</td>
							<td>4</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-4.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Long Dress</h5>
								by Renee I. Hansen
							</td>
							<td>L</td>
							<td>$1000</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="table-plus">
								<img src="vendors/images/product-5.jpg" width="70" height="70" alt="">
							</td>
							<td>
								<h5 class="font-16">Blazer</h5>
								by Vicki M. Coleman
							</td>
							<td>M</td>
							<td>$1000</td>
							<td>1</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
										<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
										<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
      <hr>

      <?php require('footerAdmin.php') ?>
    </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script src="js/core.js"></script>
        <script src="js/script.min.js"></script>
        <script src="js/process.js"></script>
        <script src="js/layout-settings.js"></script>
        <script src="src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
        <script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
        <script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
        <script src="src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="js/dashboard2.js"></script>

      	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
      	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
      	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
      	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
      	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
      	<script src="js/dashboard.js"></script>
</body>
</html>
