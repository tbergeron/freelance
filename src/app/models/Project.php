<?php

/**
 * An Eloquent Model: 'Project'
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\Milestone[] $milestones
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\Page[] $pages
 */
class Project extends BaseModel {

	protected $table = 'projects';
	public $timestamps = true;
	protected $softDelete = true;
	protected $fillable = ['name', 'code', 'description'];
	protected $guarded = ['id', 'timestamps'];

    public static $rules = [
        'name'  => 'required|min:3|max:255',
        'code'  => 'required|max:8'
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function name_short($len = 15)
    {
        return Str::limit($this->name, $len);
    }

    public function tasks()
    {
        return $this->hasMany('Task')->orderBy('updated_at', 'desc');
    }

    public function pages()
    {
        return $this->hasMany('Page')->orderBy('updated_at', 'desc');
    }

    public function milestones()
	{
        // closest dates first, null last.
        // TODO: null should be last
		return $this->hasMany('Milestone')->orderBy('due_date', 'asc');
	}

    public function afterValidate()
    {
        // Making sure there's no crap in the code
        $this->code = strtoupper(Str::slug($this->code));
    }

    public function is_starred()
    {
        $starred = StarredProject::where('user_id', Auth::user()->id)->where('project_id', $this->id)->first();
        return ($starred) ? true : false;
    }

}