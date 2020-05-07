<?php
 
namespace App\Core\Models;
 
class UserGroup extends Base
{
    public function initialize()
    {
        $this->hasMany(
            'id',
            'App\Core\Models\User',
            'user_group_id',
            array(
                'alias' => 'users'
            )
        );
    }
}
