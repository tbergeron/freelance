<?php

/**
 * An Eloquent Model: 'Milestone'
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasks
 * @property-read \Project $project
 */
class Milestone extends BaseModel {

	protected $table = 'milestones';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = array('name', 'project_id');

    public static $rules = array(
        'name'  => 'required|min:3|max:255',
        'project_id'  => 'required'
    );

    public function project()
	{
		return $this->belongsTo('Project');
	}

    public function tasks()
	{
		return $this->hasMany('Task');
	}

}