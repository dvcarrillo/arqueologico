<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 4/6/18
 * Time: 20:28
 */
?>

<div class="main">

    <?php
    if ($this->alertMsg != "") { ?>
        <div class="alert-box">
            <p><i class="fas fa-info-circle"></i> <?php echo($this->alertMsg); ?></p>
        </div>
        <?php
        $this->alertMsg = "";
    } ?>

    <div style="width: 90%;">
        <h1>Administración de usuarios</h1>
        <p>
            Como superusuario, puedes administrar los permisos de cada usuario. Para ello, hay un determinado número de
            tipos de usuario, cada uno con diferentes permisos. Desde este panel, puedes elegir el tipo de usuario que
            cada usuario debe tener.
        </p>
        <h2 style="margin-top: 20px">Gestión de permisos</h2>
    </div>

    <?php foreach ($users as $user) { ?>
        <div class="user-permission-box">
            <div class="img-container">
                <img src="views/img/avatar/<?php echo $user->avatar ?>" alt="avatar del usuario"/>
            </div>
            <div class="info-container">
                <h2><?php echo ($user->nombre . " " . $user->apellidos . " (#" . $user->id . ")") ?></h2>
                <p><?php echo $user->email ?></p>
            </div>
            <div class="form-container">
                <form action="?option=login&item=modifytypes&action=modify-permissions&user=<?php echo $user->id ?>" method="post">
                    <select name="new-permission">
                        <?php foreach ($user_types as $type) { ?>
                            <option value="<?php echo $type->nombre ?>" <?php
                                if($user->tipo == $type->nombre)
                                    echo ("selected");
                            ?>><?php echo $type->nombre ?></option>
                        <?php } ?>
                    </select>
                    <button id="loading-button" onclick="swapByLoadingIcon()" type="submit">Modificar</button>
                </form>
            </div>
        </div>
    <?php } ?>


</div>
