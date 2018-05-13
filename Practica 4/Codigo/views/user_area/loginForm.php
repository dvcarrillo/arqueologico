<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 13/5/18
 * Time: 21:01
 */
?>

<div class="main">
    <div class="form-title-box">
        <h1><?php
            if ($this->loginItem == '0') {
                echo("Entrar como usuario registrado");
            }
            if ($this->loginItem == '1') {
                echo("Creación de una nueva cuenta");
            }
        ?></h1>

        <p><?php
            if ($this->loginItem == '0') {
                echo("Los usuarios registrados disfrutan de ventajas adicionales, como poder especificar sus datos de
                usuario y comentar de una forma más personal los artículos. Introduce a continuación tus datos de usuario, o
                bien crea una nueva cuenta.");
            }
            if ($this->loginItem == '1') {
                echo("Como usuario no registrado, no puedes comentar en los artículos ni preservar unos datos de usuario.
                Por ello, te animamos a registrarte en Arqueológico, es un proceso totalmente gratuito y que sólo lleva
                unos minutos.");
            }
        ?></p>
    </div>

    <?php if($this->loginItem == '0') { ?>
        <div class="login box">
            <h1>aqui van cosis</h1>
            <p>por aqui too</p>
        </div>
    <?php } else { ?>
        <div class="login box">
            <h1>aqui van cosis</h1>
            <p>por aqui too</p>
        </div>
    <?php } ?>
</div>
