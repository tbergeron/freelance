<?php

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
		return $this->hasMany('Comment');
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