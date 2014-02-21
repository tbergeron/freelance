<?php

class StarredTask extends BaseModel {

	protected $table = 'starred_tasks';
	public $timestamps = true;
	protected $softDelete = false;

    protected $fillable = array('user_id', 'task_id');
    protected $guarded = array('id', 'timestamps');
}