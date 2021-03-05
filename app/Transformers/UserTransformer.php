<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return 
            [
                'first_name',
                'last_name', 
                'email', 
                'telephone',
                'nationality',
                'identity_document',
                'civil_status',
                'date_birth',
                'home_address',
                'zip_code',
                'user_creator_id',
                'user_deleted_id',
                'user_updated_id',
                'role_id',
                'country_id',
                'verified',
                'verification_token',
                'admin',
            ];
    }
}
