<?php
 
declare(strict_types=1);
 
namespace App\Tasks;
 
use Phalcon\Cli\Task;
 
class ArticleTask extends Task
{
    public function createCategoryAction()
    {
        $manager = $this->di->get('core_category_manager');
        try {
            $category = $manager->create(array());
            echo "The category has been created. ID: ". $category->id . "\n";
        } catch (\Exception $e) {
            echo "There were some errors creating the category: ";
            $errors = json_decode($e->getMessage(), true);
            if (is_array($errors)) {
                foreach ($errors as $error) {
                    $this->consoleLog(" - $error", "red");
                }
            } else {
                $this->consoleLog(" - $errors", "red");
            }
        }
    }
}
