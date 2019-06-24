<?php $title = 'Modifier le commentaire' ?>

<?php ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']); ?>
                <em>le <?= $post['creation_date_fr']; ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content']));?>
            </p>
        </div>
        <h2>Commentaire à modifier</h2>
        <?php
            $showComment = $comment->fetch(PDO::FETCH_ASSOC);
            
        ?>
        <form action="index.php?action=updateComment&id=<?= $showComment['id'] ?>" method="post">
            <div>
                <input type="hidden" name="postId" value="<?= $showComment['post_id'] ?>">
                <label for="author">Auteur</label><br>
                <input type="text" id="author" name="author" value="<?= htmlspecialchars($showComment['author']) ?>">
            </div>
            <div>
                <label for="comment">Commentaire</label><br>
                <textarea name="comment" id="comment" cols="30" rows="10" value=""><?= nl2br(htmlspecialchars($showComment['comment'])) ?></textarea>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
        
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
