<?php

class Milestone extends BaseModel {

	protected $table = 'milestones';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = array('name', 'project_id');

    public static $rules = array(
        'name'  => 'required|min:3|max:255',
        'project_id'  => 'required'
    );

    public function tasks()
	{
		return $this->hasMany('Task');
	}

}