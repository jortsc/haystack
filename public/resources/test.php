<?php $name = (isset($_POST['user']))?$_POST['user']:''; ?>
<h2>Testeando el método .load() de jQuery</h2>
<p id="elemento" style="color:#0079CA;">Fichero procesado por el servidor con un parámetro en la llamada y adjuntando ese parámetro a la respuesta del servidor. user: <?php echo $name; ?></p>
<small>Simple pero potente write less, do more!!</small>