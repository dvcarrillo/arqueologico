<div class="main">
    <div class="article">
        <h1><?php echo $article->titulo; ?></h1>
        <p class="date"><?php echo $article->fecha; ?></p>
        <div class="img-container">
            <a href="<?php echo $article->imagenes; ?>"><img src="<?php echo $article->imagenes; ?>" alt=""></a>
            <p><?php echo $article->pie_imagen ?></p>
        </div>
        <p class="description">
            <?php echo $article->contenido; ?>
        </p>
        <!-- Botones de interaccion -->
        <button class="article-button" type="button" onclick="showComments();"><span id="num-comments">0</span> comentarios</button>
        <a href="#"><button class="article-button" type="button">Imprimir artículo</button></a>
        <!-- Bloque de comentarios -->
        <div class="comments-block" id="comments-block">
            <h2>Comentarios</h2>
            <!-- Informacion sobre el autor -->
            <div class="author-info" id="author-box">
                <img id="author-info-avatar" src="views/img/avatar/david.jpg" alt="avatar del autor">
                <h3 id="author-info-name">David Vargas</h3>
                <p id="author-info-subtitle">Usuario registrado</p>
                <button id="author-info-close" class="close" onclick="showInfoBox();">Cerrar</button>
            </div>
            <!-- Lista de comentarios -->
            <div id="comment-list">
                <div class="comment" id="comment-1">
                    <div class="profile-img">
                        <img id="comment-avatar" src="views/img/avatar/david.jpg" alt="avatar" onclick="showInfoBox(1, 'David Vargas', 'david.jpg');">
                    </div>
                    <div class="comment-text">
                        <p class="comment-author">#<span id="comment-number">1</span> <span id="author-name" onclick="showInfoBox(1, 'David Vargas', 'david.jpg');">David Vargas</span><!-- : --></p>
                        <p class="comment-content" id="comment-content">Gran artículo, ¡tendré que ir a verla!</p>
                        <p class="comment-date">A las 16:45:40 el 21 de marzo de 2018</p>
                    </div>

                </div>
                <div class="comment" id="comment-2">
                    <div class="profile-img">
                        <img id="comment-avatar" src="views/img/avatar/sissy.png" alt="avatar" onclick="showInfoBox(2, 'Holly', 'sissy.png');">
                    </div>
                    <div class="comment-text">
                        <p class="comment-author">#<span id="comment-number">2</span> <span id="author-name" onclick="showInfoBox(2, 'Holly', 'sissy.png');">Holly</span><!-- : --></p>
                        <p class="comment-content" id="comment-content">Love the Alhambra, looking forward to my trip to Granada on July!</p>
                        <p class="comment-date">A las 21:10:44 el 21 de marzo de 2018</p>
                    </div>
                </div>
            </div>
            <!-- Nuevo comentario -->
            <div class="profile-img">
                <img src="views/img/avatar/avatar.png" alt="avatar">
            </div>
            <form class="comment-form">
                <textarea class="new-comment-text" id="comment-field" name="comment" onkeypress="banWords(event);" onfocusout="censorBeep();" placeholder="Introduce tu comentario..."></textarea>
                <input class="new-comment-name" id="name-field" type="text" placeholder="Nombre">
                <input class="new-comment-email" id="email-field" type="email" placeholder="Correo electrónico">
                <input class="new-comment-button" id="comment-button" type="button" onclick="addComment();" value="Comentar">
            </form>
        </div>
    </div>
</div>
