<?php

/**
 * An Eloquent Model: 'Task'
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $milestone_id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 * @property-read \Milestone $milestone
 * @property-read \User $user
 * @property boolean $is_closed
 * @property-read \Illuminate\Database\Eloquent\Collection|\User[] $users
 * @method static Task closed()
 * @method static Task opened()
 */
class Task extends BaseModel {

	protected $table = 'tasks';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = ['project_id', 'user_id', 'milestone_id', 'name', 'description', 'is_closed'];
	protected $guarded = ['id', 'timestamps'];

    public static $items_per_page = 10;

    public static $rules = [
        'name'  => 'required|min:3|max:255',
        'project_id'  => 'not_zero'
    ];

    public function project()
	{
		return $this->belongsTo('Project');
	}

	public function comments($order = 'asc')
	{
        return $this->hasMany('Comment')->orderBy('created_at', $order);
	}

	public function milestone()
	{
		return $this->belongsTo('Milestone');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

    public function users() {
        return $this->belongsToMany('User');
    }

    public function is_starred()
    {
        $starred = StarredTask::where('user_id', Auth::user()->id)->where('task_id', $this->id)->first();
        return ($starred) ? true : false;
    }

    public function name_short($len = 40)
    {
        // shorten task name
        return Str::limit($this->name, $len);
    }

    public function code()
    {
        return $this->project->code . '-' . sprintf("%03s", $this->id);
    }

    public function codeWithLink()
    {
        $project = $this->project;
        $code = $project->code;

        $code = Html::linkAction('ProjectController@getShow', $code, ['id' => $project->id], ['class' => 'code-link-project']);

        return $code . '-' . sprintf("%03s", $this->id);
    }

    public function scopeClosed($query)
    {
        return $query->where('is_closed', true);
    }

    public function scopeOpened($query)
    {
        return $query->where('is_closed', false);
    }

}