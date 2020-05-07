<?php
 
namespace App\Core\Models;
 
class UserProfile extends Base
{
    public function initialize()
    {
        $this->hasOne(
            'user_profile_user_id',
            'App\Core\Models\User',
            'id',
            array(
                'alias' => 'user',
                'reusable' => true
            )
        );
    }
}
