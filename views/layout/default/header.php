
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MoneyTracking</title>
	<link rel="stylesheet" href="<?php echo APP_URL_CSS."bootstrap.min.css"; ?>">
	<link rel="stylesheet" href="<?php echo APP_URL_CSS."font-awesome/css/all.css"; ?>">
	<link rel="stylesheet" href="<?php echo APP_URL_CSS."style.css"; ?>">
</head>
<body>
	<nav class="navbar navbar-inverse">
		 <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MoneyTraking</a>
    </div>
    <ul class="nav navbar-nav">
      	<li>
			<a href="<?php echo APP_URL.'accounts'; ?>">Cuentas</a>
			</li>
		<li>
			<a href="<?php echo APP_URL.'categories'; ?>">Categorias</a>
			</li>
		<li>
			<a href="<?php echo APP_URL.'transactions'; ?>">Transacciones</a>
		</li>
    		</ul>
  		</div>
	</nav>
</nav>