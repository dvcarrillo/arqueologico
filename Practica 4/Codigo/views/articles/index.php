
<div class="main">
    <?php if (isset($_SESSION['user_type']) && (($_SESSION['user_type'] == 'gestor') || ($_SESSION['user_type'] == 'superusuario'))) { ?>
        <div class="article-control-pad">
            <strong>Gestión de obras</strong>
            <p>Pulse en cualquier obra para obtener más opciones</p>
            <a class="new button" onclick="displayNewArticleForm();"><i class="far fa-plus-square" style="margin-right: 5px;"></i> Nuevo artículo</a>

            <form class="new-article-form" id="new-article" action="?option=index&action=new-article" method="post" style="display: none;">
                <h2>Añadir artículo</h2>
                <label for="title">Título</label>
                <input type="text" placeholder="Título del artículo" name="title" required>
                <label for="subtitle">Subtítulo</label>
                <input type="text" placeholder="Subtítulo del artículo" name="subtitle" required>
                <label for="content">Contenido</label>
                <textarea placeholder="Contenido del artículo" name="content" required></textarea>
                <label for="main-image">Imagen principal</label>
                <input type="text" placeholder="Localizada en views/img" name="main-image" required>
                <label for="footer-image">Pie de la imagen principal</label>
                <input type="text" placeholder="Pie de imagen" name="footer-image" required>
                <label for="article-images">Imégenes adicionales del artículo</label>
                <input type="text" placeholder="Localizadas en views/img/galleries" name="article-images" required>

                <button id="loading-button" onclick="swapByLoadingIcon()" type="submit">Publicar</button>
            </form>
        </div>
    <?php } ?>

    <div class="articles-display">
        <?php foreach ($articles as $article) { ?>
            <div class="<?php
                if ($article->id < 1)
                    echo("box");
                else
                    echo("box secondary");
            ?>" id="<?php
                if ($article->id < 1)
                    echo("centralbox");
                else
                    echo("secondarybox");
            ?>">
                <a href="?option=show&item=<?php echo $article->id; ?>"><img src="views/img/<?php echo $article->imagen_principal; ?>" style="margin-left: auto; margin-right:auto;"></a>
                <div id="img-strip">
                    <?php if ($article->id < 1) {
                        echo ("<h1><a href='?option=show&item=" . $article->id . "'>" . $article->titulo . "</a></h1>");
                    }
                    else {
                        echo ("<h2><a href='?option=show&item=" . $article->id . "'>" . $article->titulo . "</a></h2>");
                    }
                    ?>
                    <p>
                        <?php echo $article->subtitulo; ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function displayNewArticleForm() {
        var element = document.getElementById("new-article");
        if (element.style.display === "block")
            element.style.display = "none";
        else
            element.style.display = "block";
    }
</script>
