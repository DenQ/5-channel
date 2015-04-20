<?php
ini_set('memory_limit','1000M');
/**
 * GenerateTagsCommand class file
 * @author Denis Ivanov <denquick@gmail.com>
 */

/**
 * GenerateTagsCommand is the 
 *
 * @author Denis Ivanov <denquick@gmail.com>
 * @package application.commands
 * 
 * @since 1.0
 */
class GenerateTagsCommand extends QConsoleCommand {

        const LIMIT_TAG = 100;
        const LIMIT_TAG_ARTICLE = 10;

        private $_tableTag = 'tag';
        private $_tableLinkArticleTag = 'link_article_tag';
        private $_idTags = array();               
        
        public function run($args) {
                
                $this->parseArgs($this, $args);

                $this->down();

                $this->newTags();
                $this->runArticles();
        }

        private function runArticles() {
                $Articles = QDBHelper::findAll('Article');

                foreach ($Articles as $item) {
                        for ($i = 0; $i < rand(3, self::LIMIT_TAG_ARTICLE); $i++)
                                $this->createLinkArticleTag($item->id, $this->_idTags[rand(0, count($this->_idTags) - 1)]);
                }
        }

        private function createLinkArticleTag($idArticle, $idTag) {
                try{
                        $this->newRow($this->_tableLinkArticleTag, array(
                                'id_article' => $idArticle,
                                'id_tag' => $idTag,
                        ));                        
                } catch (Exception $ex) {
                        echo "Excepton: $idArticle - $idTag \n\r";
                }

        }

        private function generateNameTag() {
                return substr(uniqid(), -4);
        }

        private function newTags() {
                for ($i = 0; $i < self::LIMIT_TAG; $i++) {
                                $this->_idTags[] = $this->newTag();
                }
        }

        private function newTag() {
                $name = $this->generateNameTag();
                if (!QDBHelper::getCount('Tag', 'name', $name)) 
                        return $this->newRow($this->_tableTag, array(
                                        'name' => $name,
                                        'alias' => QAliasHelper::Translate($name),
                                        'dt_create' => date('Y-m-d h:i:s', time()),
                        ));
        }

        public function down() {
                $this->delete($this->_tableLinkArticleTag);
                $this->delete($this->_tableTag);
        }

}
