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
        $article_manager = $this->getDI()->get(
            'core_article_manager'
        );
        $this->view->articles = $article_manager->find();
    }
}
