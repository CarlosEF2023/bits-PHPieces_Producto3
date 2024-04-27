<?php 
    foreach($alertas as $key => $alerta):
        foreach($alerta as $mensaje):
?>
<div class="alert text-center <?php echo $key; ?>"><?php echo $mensaje; ?></div>

<?php
        endforeach;
    endforeach;
?>