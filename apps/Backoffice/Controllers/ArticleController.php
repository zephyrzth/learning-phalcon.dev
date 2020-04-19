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
}
