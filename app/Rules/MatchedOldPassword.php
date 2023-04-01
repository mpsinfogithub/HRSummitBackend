<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class MatchedOldPassword implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    
    public $params;
    
    public function __construct($params)
    {
        $this->params = $params;
    }
    
    public function passes($attribute, $value)
    {
        $result = User::find($this->params);
        $validPassword = $value == Crypt::decryptString($result->password) ? true : false;
        
        return $validPassword;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Current Password doesn\'t match';
    }
}

?>