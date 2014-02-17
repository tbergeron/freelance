<?php

class Task extends BaseModel {

	protected $table = 'tasks';
	public $timestamps = true;
	protected $softDelete = false;
	protected $guarded = array('id', 'project_id', 'user_id', 'timestamps');
	protected $fillable = array('name', 'description');

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