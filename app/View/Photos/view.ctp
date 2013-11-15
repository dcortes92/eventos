<div class="inside">
	<br>
	<h2> Ver Foto </h2>
	<h4> Titulo </h4>
	<p><?php echo h($photo['Photo']['title']);?></p>
	<h4> Foto </h4>
	<?php 
		$imagen = h($photo['Photo']['photo']);
		echo "<img src= '/eventos/app/webroot/".$imagen."' width='256' height='256'></img>";
	?>

	<!--<img src="/eventos/app/webroot/files/lennon.png">-->
</div>