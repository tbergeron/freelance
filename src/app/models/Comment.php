<?php

class Comment extends BaseModel {

	protected $table = 'comments';
	public $timestamps = true;
	protected $softDelete = false;
	protected $guarded = array('id', 'user_id', 'task_id', 'timestamps');
	protected $fillable = array('content');

	public function task()
	{
		return $this->belongsTo('Task');
	}

}