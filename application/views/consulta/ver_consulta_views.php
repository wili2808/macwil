<div class="col-sm-10 col-md-10">
    <div class="well">
        <h2 class="text-center">Consulta</h2>					
    </div>	            
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item"><?php echo 'Nombre: '.$nombre; ?></li>
                <li class="list-group-item"><?php echo 'Apellido: '.$apellido; ?></li>
                <li class="list-group-item"><?php echo 'Email: '.$email; ?></li>
                <li class="list-group-item"><?php echo 'Telefono: '.$telefono; ?></li>
                <li class="list-group-item"><?php echo 'Motivo de consulta: '.$motivo; ?></li>
                <li class="list-group-item"><?php echo 'Fecha: '.$fecha; ?></li>
                <li class="list-group-item"><?php echo 'Mensaje: '.$mensaje; ?></li>
                <li class="list-group-item"><a href="<?php echo base_url("borrar_consulta/$id");?>" class='btn btn-primary'>Eliminar Consulta</a></li>
            </ul>   
        </div>

        <div class="col-md-6">
            <?php if($imagen==NULL) {?>
                <h2 align="center">No mando Imagen</h2>
            <?php } else { ?>
                <img  id="imagen_consulta" name="imagen_consulta" class="img-thumbnail" src="<?php  echo base_url($imagen); ?>" >
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
