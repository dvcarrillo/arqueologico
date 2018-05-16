<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 16/5/18
 * Time: 1:06
 */

if(($item == 'login') || ($item == 'registration')) { ?>
    <li><a href="?option=login&item=login" class="<?php
        if ($item == 'login')
            echo ("active");
        ?>">USUARIO EXISTENTE</a></li>
    <li><a href="?option=login&item=registration" class="<?php
        if ($item == 'registration')
            echo ("active");
        ?>">CREA TU CUENTA</a></li>
<?php } else if ($item == 'userarea') { ?>
    <li><a href="#">MODIFICA TUS DATOS</a></li>
    <li><a href="#">CERRAR SESIÓN</a></li>
<?php } ?>
