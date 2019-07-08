<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title>Prueba</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/estilo.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">

</head>

<body>

<section class="max-container">
<?php
$json = file_get_contents('https://app.brandme.la/test/campanas');
$obj = json_decode($json, true);
$id=0;


foreach ($obj['campaigns'] AS $c){
?>

<div class="item" onClick="mostrar('<?php echo $id; ?>');">

<img class="logo" src="<?php echo $c['logo'] ?>">

</div>


<div id="container<?php echo $id ?>" class="container">
<i id="x<?php echo $id ?>" class="fa fa-times x" onClick="ocultar('<?php echo $id ?>');"></i>

<div class="logo-wrap">
<img class="logo" src="<?php echo $c['logo'] ?>">
</div>
<h1 class="name"><?php echo $c['name'] ?></h1>

<div class="cover-wrap">
<img class="cover" src="<?php echo $c['cover'] ?>">
</div>



<div class="sm">
<?php foreach ($c['networks'] AS $n){ ?>
<span class="redes"><!--<?php /*echo $n['name']*/ ?>--> <i class="fa <?php echo $n['icon'] ?>"></i></span>
<?php } ?>
</div>

<div class="button">
<input type="submit" value="Enviar Propuesta"></div>
</div>

</div>
<?php
$id++;
} ?>
</section>

<script>
$('.container').hide();
$('.x').hide();

function mostrar(a){
	var container = $('#container' + a);
	var x = $('#x' + a);
	x.slideDown();
	container.slideDown();
}

function ocultar(a){
	var container = $('#container' + a);
	var x = $('#x' + a);
	x.slideUp();
	container.slideUp();
}
</script>
</body>
</html>