<?php
 
namespace App\Core\Managers;
 
use \App\Core\Models\User;
 
class UserManager extends BaseManager
{
    public function find($parameters = null)
    {
        return User::find($parameters);
    }
    /**
     * Create a new user
     *
     * @param array $data
     * @return string|\App\Core\Models\User
     */
    public function create($data)
    {
        $security = $this->di->get('security');
 
        $user = new User();
        $user->user_first_name = $data['user_first_name'];
        $user->user_last_name = $data['user_last_name'];
        $user->user_email = $data['user_email'];
        $user->user_password = $security->hash($data['user_password']);
        $user->user_is_active = $data['user_is_active'];
 
        
        if (false === $user->create()) {
            foreach ($user->getMessages() as $message) {
                $error[] = (string) $message;
            }
            throw new \Exception(json_encode($error));
        }
        
        return $user;
    }
}
