<?php

class Milestone extends BaseModel {

	protected $table = 'milestones';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = array('name', 'project_id');

    public function tasks()
	{
		return $this->hasMany('Task');
	}

}