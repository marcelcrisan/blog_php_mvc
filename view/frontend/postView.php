<?php $title = 'Commentaires blog'; ?>

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

        <h2>Commentaires</h2>

        <?php
            while ($comment = $comments->fetch())
            {
        ?>
        <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> le <?= $comment['comment_date_fr']; ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>
        <?php
            } // End loop comments
            $comments->closeCursor();
        ?>
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>