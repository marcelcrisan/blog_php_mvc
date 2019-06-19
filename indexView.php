<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
        <?php
            while ($data = $posts->fetch())
                {
        ?>

        <div class="news">
            <h3>
                <!-- php echo change with = -->
                <?= htmlspecialchars($data['titre']); ?>
                <em>le <?= $data['date_creation_fr']; ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($data['contenu'])); ?>
                <br />
                <em><a href="commentaires.php?billet=<?= $data['id']; ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        } // END loop posts
        $posts->closeCursor();
        ?>
    </body>
</html>