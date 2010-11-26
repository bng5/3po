
   <fieldset>
	<legend>Acceder a tu cuenta</legend>
	<ul>
	 <li>Usuario
	  <form name="login" action="/acceso" method="post">
       <input type="hidden" name="cuenta" value="acceder" />

       <input type="hidden" name="ref" value="%2Fbandas%2F%3Findice%3Dk" />
       <ul>
        <li><label for="usuario">Usuario</label> <input type="text" name="usuario" id="usuario" value="" maxlength="32" /></li>
	    <li><label for="clave">Contraseña</label> <input type="password" name="clave" id="clave" /></li>
	    <li class="boton"><button type="submit"><span>Acceder</span></button></li>
	    <li class="links"><a href="/usuarios/recuperarclave">Recuperar contraseña</a></li>

       </ul>
	  </form></li>
	 <li>OpenId
	  <form name="openid" action="/openid" method="post">
       <input type="hidden" name="cuenta" value="openid" />
       <input type="hidden" name="ref" value="%2Fbandas%2F%3Findice%3Dk" />
       <ul>
	    <li><input type="text" name="openid_identifier" value="" style="background: #FFFFFF url('/img/openid-icon-small.gif') no-repeat scroll 0pt 50%;padding-left: 18px;" /></li>
		<li><input type="submit" name="openid_action" value="login" /></li>

	   </ul>
      </form>
	 </li>
	</ul>
   </fieldset>


   <fieldset>

	<legend>Registro</legend>
    <ul>
	 <li>Usuario
      <form name="registro" action="/registro" method="post">
       <input type="hidden" name="cuenta" value="crear" />
       <input type="hidden" name="ref" value="%2Fbandas%2F%3Findice%3Dk" />
	   <ul>
        <li><label for="regusuario">Usuario</label> <input type="text" name="reg_usuario" id="regusuario" value="" maxlength="32" /></li>

        <li><label for="regclave">Contraseña</label> <input type="password" name="reg_clave" id="regclave" /></li>
        <li><label for="regclave2">Repita su contraseña</label> <input type="password" name="reg_clave2" id="regclave2" /></li>
        <li><label for="regemail">Correo electrónico</label> <input type="text" name="reg_email" id="regemail" /></li>
        <li class="boton"><button type="submit"><span>Registrarse</span></button></li>
       </ul>

      </form>
	 </li>
	 <li>OpenId
	  <form name="openid" action="/acceso" method="post">
       <input type="hidden" name="cuenta" value="openid" />
       <input type="hidden" name="ref" value="%2Fbandas%2F%3Findice%3Dk" />
       <ul>
	    <li><input type="text" name="openid_identifier" value="" style="background: #FFFFFF url('/img/openid-icon-small.gif') no-repeat scroll 0pt 50%;padding-left: 18px;" /></li>
		<li><input type="button" name="openid_action" value="login" /></li>

	   </ul>
      </form>
	 </li>
	</ul>
   </fieldset>

