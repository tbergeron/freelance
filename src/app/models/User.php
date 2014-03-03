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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $starred_tasks
 * @property boolean $is_admin
 * @property-read \Illuminate\Database\Eloquent\Collection|\Permission[] $permissions
 */
class User extends BaseModel implements UserInterface {
    protected $table = 'users';
    public $timestamps = true;
    protected $softDelete = true;
    protected $fillable = array('email', 'full_name', 'is_admin', 'password');
    protected $guarded = array('id', 'timestamps');
    protected $hidden = array('password');

    public static $rules = [
        'email'     => 'sometimes|required|min:4|unique:users',
        'password'  => 'sometimes|required|min:6',
        'full_name' => 'required|min:4'
    ];

    public function save(array $data = null)
    {
        // hashing the password after validation and before saving
        if (isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        return parent::save($data);
    }

    public function __toString()
    {
        return $this->full_name;
    }

    public function tasks()
    {
        return $this->hasMany('Task');
    }

    public function starred_tasks()
    {
        return $this->belongsToMany('Task', 'starred_tasks');
    }

    public function starred_projects()
    {
        return $this->belongsToMany('Project', 'starred_projects');
    }

    public function permissions()
    {
        return $this->hasMany('Permission');
    }

    // TODO: there's got to be a better way to do this. PLEASE.
    public function available_projects()
    {
        if (Permission::checkIfAdmin())
            return Project::all();

        $ids = $this->getAvailableProjectIds();

        // fetching projects
        $projects = Project::whereIn('id', $ids)->get();

        return $projects;
    }

    public function getAvailableProjectIds()
    {
        // finding IDs of available project
        $ids = User::find($this->id)
            ->join('permissions', 'users.id', '=', 'permissions.user_id')
            ->join('projects', 'projects.id', '=', 'permissions.project_id')
            ->where('permissions.read', '=', true)
            ->where('permissions.user_id', '=', $this->id)
            ->groupBy('projects.id')
            ->select('projects.id')->get();

        // extracting IDs
        $ids_array = [];
        for($i = 0; $i < count($ids); $i++) {
            $ids_array[] = $ids[$i]['id'];
        }

        return $ids_array;
    }

    public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

    public static function forDropdown()
    {
        $users = User::get(array('id', 'full_name'));
        $users_array = [trans('app.none')];
        foreach ($users as $user) {
            $users_array[$user->id] = $user->full_name;
        }

        return $users_array;
    }

}