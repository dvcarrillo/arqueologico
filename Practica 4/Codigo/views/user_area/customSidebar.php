<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 16/5/18
 * Time: 1:06
 */

if(($item == 'login') || ($item == 'registration') || ($item == 'registeruser')) { ?>
    <li><a href="?option=login&item=login" class="<?php
        if ($item == 'login')
            echo ("active");
        ?>">USUARIO EXISTENTE</a></li>
    <li><a href="?option=login&item=registration" class="<?php
        if ($item == 'registration')
            echo ("active");
        ?>">CREA TU CUENTA</a></li>
<?php } else { ?>
    <li><a href="?option=login&item=userarea" class="<?php
        if ($item == 'userarea')
            echo ("active");
        ?>">TU PERFIL</a></li>
    <li><a href="?option=login&item=modifydata" class="<?php
        if ($item == 'modifydata')
            echo ("active");
        ?>">MODIFICA TUS DATOS</a></li>
    <li><a href="?option=login&item=login&action=close">CERRAR SESIÓN</a></li>
<?php } ?>
