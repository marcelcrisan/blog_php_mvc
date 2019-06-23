<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>
        <a href="index.php?action=listPosts">Retour à la page d'accueil</a>
        <div class="error_alert">
            
            
            <p>
                <?= $errorMessage; ?>
                
            </p>
        </div>
       
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>