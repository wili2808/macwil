<!---------------------------------------------- FOOTER -------------------------------------->
        <div class="container">
            <footer>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <p><a href="<?php echo base_url();?>" class="">MAC-WIL</a></p>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9">
                        <ul class="list-inline text-right">
                            <li><a href="<?php echo base_url();?>">Inicio</a></li>
                            <li><a href="<?php echo base_url("contacto");?>">Contacto</a></li>
                            <li><a href="<?php echo base_url("terminos");?>">Terminos de Uso</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div> <!--- Cierro div del container --->
        
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.0.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/responsive-tab.js"); ?>"></script>
        <script type="text/javascript"> fakewaffle.responsiveTabs(["xs","sm"]);</script>
        <script type="text/javascript">
            //Codigo para login ajax
            $(document).ready(function(){
                //$(".navbar-right").hide(); //Al inciar mi sitio el cerrar sesión se oculta
                $('#btn-login').click(function(){ 
                    //Caputuro datos de los input       
                    var usuario = $('#usuario').val();
                    var pass = $('#pass').val();
                    //Creo array para enviar para ver login
                    var info ="usuario="+usuario+"&pass="+pass;
                    $.ajax({               
                        url: '<?=base_url('login_ajax');?>', //Url del login_ajax 
                        type: 'POST',             //Metodo de envio
                        data: info, //array con el usuario y pass
                        success: function(msg){  //si es correcto la acción
                            if (msg === "error") {
                                $('#msg_username').html('Datos incorrectos, verifique!!!').css('color','red'); //Muestros el mje de datos incorrectos
                            } else {
                                location.reload();//Vuelva a cargar el documento actual
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>