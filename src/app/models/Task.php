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
 */
class Task extends BaseModel {

	protected $table = 'tasks';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = ['project_id', 'user_id', 'milestone_id', 'name', 'description', 'is_closed'];
	protected $guarded = ['id', 'timestamps'];

    public static $rules = [
        'name'  => 'required|min:3|max:255',
        'project_id'  => 'not_zero'
    ];

    // TODO: Add states/open/close to this model

    public function project()
	{
		return $this->belongsTo('Project');
	}

	public function comments()
	{
        return $this->hasMany('Comment')->orderBy('created_at', 'desc');
	}

	public function milestone()
	{
		return $this->belongsTo('Milestone');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

    public function code()
    {
        return $this->project->code . '-' . sprintf("%03s", $this->id);
    }

}