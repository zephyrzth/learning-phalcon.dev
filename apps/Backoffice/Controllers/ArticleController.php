<?php
 
namespace App\Backoffice\Controllers;
 
class ArticleController extends BaseController
{
    public function indexAction()
    {
        return $this->dispatcher->forward(['action' => 'list']);
    }
    
    public function listAction()
    {
        // Dapatkan objek dari dependency containrr
        $article_manager = $this->getDI()->get(
            'core_article_manager'
        );
 
        // Lakukan query dengan menambahkan sorting
        $articles = $article_manager->find([
            'order' => 'created_at DESC'
        ]);
 
        // Sisipkan variabel hasil query ke dalam view
        $this->view->articles = $articles;
    }

    public function createAction()
    {
        $this->view->disable();
 
        $article_manager = $this->getDI()->get('core_article_manager');
        
        try {
            $article = $article_manager->create([
                'article_short_title' => 'Test article short title 5',
                'article_long_title' => 'Test article long title 5',
                'article_description' => 'Test article description 5',
                'article_slug' => 'test-article-short-title-5'
            ]);
            echo $article->getArticleShortTitle(), " was created.";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
