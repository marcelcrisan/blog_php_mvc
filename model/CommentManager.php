<?php
    namespace Marcel\Blog\Model;

    require_once("model/Manager.php");

    class CommentManager extends Manager
    {
        public function getComments($postId)
        {
            $db = $this->dbConnect();
            $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
            $comments->execute(array($postId));

            return $comments;
        }

        public function postComment($postId, $author, $comment)
        {
            $db = $this->dbConnect();
            $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
            $affectedLines = $comments->execute(array($postId, $author, $comment));

            return $affectedLines;
        }

        public function getComment($commentId)
        {
            
            $db = $this->dbConnect();
            $commentList = $db->query("SELECT id, post_id, author, comment FROM comments WHERE id = $commentId ");

            return $commentList;
        }

        public function updateComment($commentId, $author, $comment)
        {
            $db = $this->dbConnect();
            $comment = $db->prepare("UPDATE comments SET author='$author', comment='$comment', comment_date=NOW() WHERE id=$commentId");
            $affectedComment = $comment->execute();
            
            return $affectedComment;
        }
    }