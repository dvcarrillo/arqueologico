
<div class="main">
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
            <a href="?option=show&item=<?php echo $article->id; ?>"><img src="<?php echo $article->imagen_principal; ?>" style="margin-left: auto; margin-right:auto;"></a>
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