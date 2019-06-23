<?php 
    // INSERT model class,PostManager & CommentManager
    require_once('model/PostManager.php'); // require_once is for insert class one time !plus
    require_once('model/CommentManager.php');

    function listPosts()
    {
        $postManager = new PostManager(); // create object
        $posts = $postManager->getPosts(); // function from object class PostManager

        require('./view/frontend/listPostsView.php');
    }
    
    function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('./view/frontend/postView.php');
    }

    function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }