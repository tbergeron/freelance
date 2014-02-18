<?php

use Illuminate\Auth\UserInterface;

/**
 * An Eloquent Model: 'User'
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $full_name
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasks
 */
class User extends BaseModel implements UserInterface {
    protected $table = 'users';
    public $timestamps = true;
    protected $softDelete = true;
    protected $fillable = array('email', 'full_name');
    protected $guarded = array('id', 'timestamps');
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