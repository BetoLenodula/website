
	function msgAlert(msg){
		$('.alert-back').find('p').html(msg);
		$('.alert-back').show();
	}

	function cerrar_alert_focus(element){
		$('.cerrar-modal').click(function(){
			$(this).parent().parent().hide();
			if(element){
				$(element).focus();
			}
		})
	}


	$('.cerrar-box').click(function(){
		$(this).parent().hide();
	})

	$(window).scroll(function(){
		if($(this).scrollTop() >= 100){
			$('header').css({'height': '58px'});
		}
		else{
			$('header').css({'height': '94px'});	
		}

		if($(this).scrollTop() > 10 && $(this).scrollTop() < 30){
			$('.biglogo i').animate({'font-size': '8em'},300);
		}
		if($(this).scrollTop() > 32 && $(this).scrollTop() < 40){
			$('.biglogo i').animate({'font-size': '9em'},300);	
		}
	})

	$('#frmContacto').submit(function(){
		nom = $('#nombre').val();
		mai = $('#email').val();
		bod = $('#cuerpo_mail').val();

		exprUser = /^[a-zA-z0-9áéíóúÁÉÍÓÓñÑ\s]{1,255}$/;
		exprMail = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(nom.length == 0){
			msgAlert("Falta indicar tu nombre!");
			cerrar_alert_focus("#nombre");
			return false;
		}


		if(mai.length == 0){
			msgAlert("Falta indicar tu correo electrónico!");
			cerrar_alert_focus("#email");
			return false;
		}

		if(! exprMail.test(mai)){
			msgAlert("El formato del correo no es correcto!");
			cerrar_alert_focus("#email");
			return false;
		}

		if(bod.length == 0){
			msgAlert("Falta indicar el contenido del correo!");
			cerrar_alert_focus("#cuerpo_mail");
			return false;
		}

		frm = $(this).serializeArray();
		frm.push({'name' : 'post_type', 'value' : 'ajax'});

		$.ajax({
			url  : '/informacion/contacto',
			type : 'post',
			data : frm
		}).done(function(info){
			if(info == "true"){
				msgAlert("SE ENVIÓ TU CORREO CORRECTAMENTE!");
				cerrar_alert_focus();
			}
			else if(info == "error"){
				msgAlert("Hubo un error!");
				cerrar_alert_focus("#cuerpo_mail");
			}
		})
		return false;

	})


	$('#frmLoginBlog').submit(function(){
		user = $('#usuario').val();
		pass = $('#password').val();

		exprUser = /^[a-zA-z0-1áéíóúÁÉÍÓÓñÑ]{1,15}$/;
		exprPass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&_.]{8,15}$/;

		if(user.length == 0){
			msgAlert("Falta el nombre de usuario!");
			cerrar_alert_focus("#usuario");
			return false;
		}

		if(user.length > 15){
			msgAlert("Nombre de usuario muy largo!");
			cerrar_alert_focus("#usuario");
			return false;
		}

		if(! exprUser.test(user)){
			msgAlert("El nombre de usuario no debe contener caracteres extraños!");
			cerrar_alert_focus("#usuario");
			return false;
		}

		if(pass.length == 0){
			msgAlert("Falta el password!");
			cerrar_alert_focus("#password");
			return false;
		}

		if(pass.length > 15){
			msgAlert("Password demasiado largo!");
			cerrar_alert_focus("#password");
			return false;
		}

		if(pass.length < 8){
			msgAlert("Password muy corto, debe tener al menos 8 caracteres!");
			cerrar_alert_focus("#password");
			return false;
		}

		if(! exprPass.test(pass)){
			msgAlert("El password debe tener al menos una letra y un número y puede tener caracteres @$!%*#?&_.");
			cerrar_alert_focus("#password");
			return false;
		}
	})

	$('#publicar_articulo').click(function(){
		me = $(this);

		tit = $('#titulo').val();
		por = $('#portada').val();
		des = $('#descripcion').val();
		htm = $(".richText-editor").html();

		exprTit = /^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,80}$/;
		exprURl = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
		exprDes = /^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s\,\(\)\:\"\+\-\*\/\;\.\_\¿\?\¡\!\&\-\$\=\%]{1,150}$/;


		if(tit.length == 0){
			msgAlert('Falta el título!');
			cerrar_alert_focus("#titulo");
			return false;
		}

		if(tit.length > 80){
			msgAlert('El titulo es demasiado largo!');
			cerrar_alert_focus("#titulo");
			return false;
		}

		if(!exprTit.test(tit)){
			msgAlert('El título No soporta alguno caracteres extraños!');
			cerrar_alert_focus("#titulo");
			return false;
		}

		if(por.length > 0){
			if(!exprURl.test(por)){
				msgAlert('La dirección de la imagen no es una URL válida!');
				cerrar_alert_focus("#portada");
				return false;
			}
		}

		if(des.length == 0){
			msgAlert('Escribe una breve descripción del artículo!');
			cerrar_alert_focus("#descripcion");
			return false;
		}

		if(des.length > 150){
			msgAlert('La descripción es muy larga!');
			cerrar_alert_focus("#descripcion");
			return false;
		}

		if(!exprDes.test(des)){
			msgAlert('La descripción No permite algunos caracteres extraños!');
			cerrar_alert_focus("#descripcion");
			return false;
		}

		if(htm == '<div><br></div>' || htm == ""){
			msgAlert('Escribe algo para el blog!');
			cerrar_alert_focus(".richText-editor");
			return false;
		}

		frm = $('#frmPostBlog').serializeArray();
		frm.push({'name' : 'articulo', 'value' : htm});
		frm.push({'name' : 'post_type', 'value' : 'ajax'});
	

		$(me).attr('disabled', 'disabled');

		$.ajax({
			url  : '/blog/nuevo',
			type : 'post',
			data : frm
		}).done(function(info){
			if(info == "true"){
				msgAlert('SE PUBLICÓ CORRECTAMENTE EL ARTÍCULO EN EL BLOG!! :D');
				cerrar_alert_focus();
			}
			else{
				alert(info);
			}
			$(me).removeAttr('disabled');
		})
	})

	$('.search').click(function(){
		a  = window.location + "/buscar/" + $('.search-input').val();
		window.location.href = a;
	})