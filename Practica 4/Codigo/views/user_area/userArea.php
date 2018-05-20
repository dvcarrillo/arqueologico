<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 15/5/18
 * Time: 23:53
 */
?>

<script>
    // window.onload = function () {
    //     parent.window.location.reload();
    // };
</script>

<h1>WELCOME TO THE GREATEST USER AREA EVER!</h1>
<h3>Oh well, I can sense I have received some important data... let me check...</h3>

<p>Yes! Yes! Got them<br></p>
<p>Is your email... something like... <?php echo($this->user->email) ?>?</p>
<p>And your password <?php echo($this->user->clave)?>?<br></p>

<?php
var_dump($this->user) ?>

<p>Ho ho ho.. I'm all powerful!</p>
