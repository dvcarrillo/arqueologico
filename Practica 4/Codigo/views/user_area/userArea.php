<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 15/5/18
 * Time: 23:53
 */
?>

<?php
if ($this->alertMsg != "") { ?>
    <div class="alert-box">
        <p><i class="fas fa-info-circle"></i> <?php echo($this->alertMsg); ?></p>
    </div>
    <?php
    $this->alertMsg = "";
} ?>

<div style="width: 90%;">
    <h1>Hola de nuevo, <?php echo($this->user->nombre) ?></h1>
    <p>
        Desde aquí puedes llevar a cabo todas las acciones relativas a tu cuenta. A continuación, se muestran tus datos de
        usuario actuales. Si deseas modificar tus datos, por favor pulsa en el botón disponible a continuación.
    </p>
    <h2 style="margin-top: 20px">Tu ficha</h2>
</div>

<div class="user-box">
    <div class="img-container">
        <img src="views/img/avatar/<?php echo($this->user->avatar) ?>" alt="avatar de usuario"/>
    </div>
    <div class="data-container">
        <strong>Nombre y apellidos</strong>
        <p><?php echo($this->user->nombre . " " . $this->user->apellidos) ?></p>
        <strong>Email</strong>
        <p><?php echo($this->user->email) ?></p>
        <strong>Tipo</strong>
        <p class="locked">Usuario <?php echo($this->user->tipo) ?></p>
        <div class="buttons">
            <a class="a-button" href="?option=login&item=modifydata">Modificar datos</a>
        </div>
    </div>
</div>
