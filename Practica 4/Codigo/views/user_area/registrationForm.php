<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 15/5/18
 * Time: 22:38
 */
?>

<div class="main">
    <div class="big-picture">
        <img src="views/img/patterns/lines.jpg" alt="line pattern"/>
    </div>

    <div class="form-title-box">
        <h1>Creación de una nueva cuenta</h1>
        <p>
            Como usuario no registrado, no puedes comentar en los artículos ni preservar unos datos de usuario.
            Por ello, te animamos a registrarte en Arqueológico, es un proceso totalmente gratuito y que sólo lleva
            unos minutos.
        </p>
    </div>

    <div class="reg-box">
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
