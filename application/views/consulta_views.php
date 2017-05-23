<div class="container">
    <div class="row">
        <form action="" class="formulario col-sm-12 col-md-8 col-md-offset-2">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="">Correo Electronico:</label>
                <input type="email" class="form-control" id="email" placeholder="Correo Electronico">
            </div>

            <div class="form-group">
                <label for="motivo">Motivo de consulta:</label>
                <select name="motivo_consulta" id="motivo" class="form-control">
                    <option value="Uniforme Escolar">Uniforme Escolar</option>
                    <option value="Prendas General">Prendas General</option>
                    <option value="Serigrfia">Serigrfia</option>
                    <option value="Bordados">Bordados</option>
                    <option value="Sublimaciones">Sublimaciones</option>
                    <option value="Otros">Otros...</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Escriba su Consulta..."></textarea>
            </div>

            <div class="form-group">
                <label for="archivo">Archivo:</label>
                <input type="file" id="archivo">
                <p class="help-block">Maximo 50MB.</p>
            </div>

            <input type="submit" class="btn btn-lg btn-primary btn-block">
        </form>
    </div>
</div>