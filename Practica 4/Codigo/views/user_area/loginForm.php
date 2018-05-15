<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 13/5/18
 * Time: 21:01
 */
?>

<div class="main">
    <div class="big-picture">
        <img src="views/img/patterns/lines.jpg" alt="line pattern"/>
    </div>

    <div class="form-title-box">
        <h1>Entrar como usuario registrado</h1>
        <p>
            Los usuarios registrados disfrutan de ventajas adicionales, como poder especificar sus datos de
            usuario y comentar de una forma más personal los artículos. Introduce a continuación tus datos de usuario, o
            bien crea una nueva cuenta.
        </p>
    </div>

    <div class="login-box">
        <form action="index.php?option=login&item=userarea" method="post">
            <div class="img-container">
                <img src="views/img/avatar/avatar.png" alt="avatar de usuario"/>
            </div>

            <div class="container">
                <label for="username">Correo electrónico</label>
                <input type="text" placeholder="Escribe tu correo electrónico" name="email" required>

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Escribe tu contraseña" name="password" required>

                <button type="submit">Entrar</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Mantener la sesión iniciada
                </label>
            </div>
        </form>
    </div>
</div>
