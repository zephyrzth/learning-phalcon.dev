<?php
 
namespace App\Core\Managers;
 
use App\Core\Models\Article;
 
class ArticleManager extends BaseManager
{
    public function create($data)
    {
        $article = new Article();
        $article->setArticleShortTitle($data['article_short_title']);
        $article->setArticleLongTitle($data['article_long_title']);
        $article->setArticleDescription($data['article_description']);
        $article->setArticleSlug($data['article_slug']);
        $article->setIsPublished(0);
        $article->setCreatedAt(new \Phalcon\Db\RawValue('NOW()'));
        
        if (false === $article->create()) {
            foreach ($article->getMessages() as $message) {
                $error[] = (string) $message;
            }
            throw new \Exception(json_encode($error));
        }
        return $article;
    }

    public function find($parameters = null)
    {
        return Article::find($parameters);
    }
}
