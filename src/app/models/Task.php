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
 */
class Task extends BaseModel {

	protected $table = 'tasks';
	public $timestamps = true;
	protected $softDelete = false;
	protected $guarded = array('id', 'timestamps');
	protected $fillable = array('name', 'user_id', 'project_id', 'milestone_id', 'description');

    public static $rules = array(
        'name'  => 'required|min:3|max:255',
        'project_id'  => 'required'
    );

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

}