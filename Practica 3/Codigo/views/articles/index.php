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
        <a href="?option=article&item=<?php echo $article->id; ?>"><img src="<?php echo $article->imagen_principal; ?>" style="margin-left: auto; margin-right:auto;"></a>
        <div id="img-strip">
            <h1><a href="?option=article&item=<?php echo $article->id; ?>"><?php echo $article->titulo; ?></a></h1>
            <p>
                <?php echo $article->subtitulo; ?>
            </p>
        </div>
    </div>
<?php } ?>
