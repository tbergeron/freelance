<?php

use Illuminate\Auth\UserInterface;

class User extends BaseModel implements UserInterface {

    protected $table = 'users';
    public $timestamps = true;
    protected $softDelete = true;
    protected $guarded = array('id', 'timestamps');
    protected $fillable = array('email', 'full_name');
    protected $hidden = array('password');

    public function tasks()
    {
        return $this->hasMany('Task');
    }

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

}