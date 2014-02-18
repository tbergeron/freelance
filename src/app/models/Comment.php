<?php

class Comment extends BaseModel {

	protected $table = 'comments';
	public $timestamps = true;
	protected $softDelete = false;
	protected $guarded = array('id', 'timestamps');
	protected $fillable = array('user_id', 'task_id', 'content');

	public function task()
	{
		return $this->belongsTo('Task');
	}

}