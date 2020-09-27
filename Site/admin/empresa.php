
<?php 
    require_once 'classes/usuarios.php';
    $con = new Usuario;
?>

<head>
</head>

<script type="text/javascript">

    function tableProd() {
        var x = document.getElementById("produtos");
        if (x.style.display === "none") {
            x.style.display = "table";
        } else {
            x.style.display = "none";
        }
    }

    function tableNewProd() {
        var z = document.getElementById("formNovoProd");
        if (z.style.display === "none") {
            z.style.display = "flex";
        } else {
            z.style.display = "none";
        }
    }
</script>

<body>
<div class="page-wrapper chiller-theme toggled">
<?php require('menuLateral.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Clientes</h2>
      <hr>
      <div class="row">
        
      </div>
      
      <hr>

      <?php require('footerAdmin.php'); ?>
    </div>
  </main>
  </div>
  <?php 

  ?>
  </body>