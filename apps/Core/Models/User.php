<?php
 
namespace App\Core\Models;
 
class User extends Base
{
    public function initialize()
    {
        $this->hasOne(
            'id',
            'App\Core\Models\UserProfile',
            'user_profile_user_id',
            array(
                'alias' => 'profile',
                'reusable' => true
            )
        );
        $this->hasOne(
            'user_group_id',
            'App\Core\Models\UserGroups',
            'id',
            array(
                'alias' => 'group',
                'reusable' => true
            )
        );
    }
}
