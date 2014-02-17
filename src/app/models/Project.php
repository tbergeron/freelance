<?php

class Project extends BaseModel {

	protected $table = 'projects';
	public $timestamps = true;
	protected $softDelete = true;
	protected $guarded = array('id', 'timestamps');
	protected $fillable = array('name', 'code');

	public function tasks()
	{
		return $this->hasMany('Task');
	}

}