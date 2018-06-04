<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 23/5/18
 * Time: 16:31
 */
?>

<div class="main">
    <div style="width: 90%;">
        <h1>Modifica tus datos personales</h1>
        <p>
            A continuación se muestra un formulario con tus datos personales. Si necesitas cambiar alguno, modifica su campo
            correspondiente y pulsa en el botón para actualizarlos. Ten en cuenta que no puedes cambiar tu tipo de usuario.
        </p>
    </div>

    <div class="modify-form">
        <form action="index.php?option=login&item=userarea&action=modify" method="post" enctype="multipart/form-data">
            <div class="img-container">
                <img src="views/img/avatar/<?php echo($this->user->avatar) ?>" alt="avatar de usuario"/>
            </div>

            <div class="container">
                <label for="name">Nombre</label>
                <input type="text" placeholder="Escribe tu nombre" name="name" value="<?php echo($this->user->nombre) ?>" required>

                <label for="surname">Apellidos</label>
                <input type="text" placeholder="Escribe tus apellidos" name="surname" value="<?php echo($this->user->apellidos) ?>">

                <label for="file">Avatar</label>
                <input class="file-upload" name="avatar-upload" type="file" accept="image/*">
                <br><br>

                <label for="email">Correo electrónico</label>
                <input type="email" placeholder="Escribe tu correo electrónico" name="email" value="<?php echo($this->user->email) ?>" required>

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Escribe tu contraseña" name="password" required>

                <label for="confirm-password">Confirma tu contraseña</label>
                <input type="password" placeholder="Escribe de nuevo tu contraseña" name="confirm-password" required>

                <button id="loading-button" onclick="swapByLoadingIcon()" type="submit">Aceptar</button>
            </div>
        </form>
    </div>
</div>
