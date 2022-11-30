<?php
    class Articles {
        private $connect, $table = "tb_article";
        public $id, $title, $body, $writer, $created, $updated, $thumbnail, $reference;

        public function __construct ($database) {
            $this->connect = $database;
        }

        public function getArticleList() {
            $query = ("SELECT * FROM " . $this->table);
            $result = $this->connect->prepare($query);
            $result->execute();


            if($result != null) {
                $articles = array();
                while($article = $result->fetch(PDO::FETCH_ASSOC)) {
                    $articles[] = $article;
                }

                return array(
                    'error' => false,
                    'message' => 'Here we go',
                    'data' => $articles
                );
            } else {
                return array(
                    'error' => true,
                    'message' => 'Something wrong happen',
                    'data' => []
                );
            }
        }
    }
?>