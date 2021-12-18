<div class="container">
  <div class="row justify-content-center">
      <div class="row vertical-align" id="info_contacto">
        <div class="col-lg-6 col-md-6 col-12 text-center map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7507.016218388006!2d-101.79294624256772!3d19.818442529442752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842dc936f8711299%3A0x33884940769c3dfc!2sCentro%2C%20Zacapu%2C%20Mich.!5e0!3m2!1ses!2smx!4v1579495044147!5m2!1ses!2smx" width="330" height="280" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <p class="text-center text-info lead">
              <img src="/Views/assets/images/email.svg" alt="Enviar-email-a-Lenodula" class="rounded col-2"><br>
              • Puedes contactar por facebook.&nbsp;<i class="fa fa-facebook-square"></i><br>  
              • o enviando un correo en el formulario de contacto de abajo.&nbsp;<i class="fa fa-envelope"></i>
          </p>
        </div>
      </div>
        <div id="frm_contacto" class="col-lg-12">
            <form method="post" action="" id="frmContacto">
            <div class="form-group">
              <label for="nombre">&nbsp;&nbsp;Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="Nombre" placeholder="Tu nombre...">
            </div>
            <div class="form-group">
              <label for="email">&nbsp;&nbsp;Correo</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo electrónico...">
            </div>
            <div class="form-group">
              <label for="cuerpo_mail">&nbsp;&nbsp;Mensaje</label>
              <textarea name="cuerpo_mail" id="cuerpo_mail" class="form-control" rows="6" placeholder="Mensaje..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
      </div>
</div>
<?php 
  include_once(MSG . "alert.php");
  if(!empty($callback_datos)) 
  include_once(MSG . "error.php");
?>