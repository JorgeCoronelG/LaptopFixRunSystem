<?php
/**
 * Description of commentBEAN
 *
 * @author Jorge Coronel González
 */
class CommentBEAN {
   
    private $idComment;
    private $comment;
    private $score;
    private $dateComment;
    private $idCus;
    
    function getIdComment() {
        return $this->idComment;
    }

    function getComment() {
        return $this->comment;
    }

    function getScore() {
        return $this->score;
    }

    function getDateComment() {
        return $this->dateComment;
    }

    function getIdCus() {
        return $this->idCus;
    }

    function setIdComment($idComment) {
        $this->idComment = $idComment;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setScore($score) {
        $this->score = $score;
    }

    function setDateComment($dateComment) {
        $this->dateComment = $dateComment;
    }

    function setIdCus($idCus) {
        $this->idCus = $idCus;
    }
    
}