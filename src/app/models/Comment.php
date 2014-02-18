<?php

class Comment extends BaseModel {

	protected $table = 'comments';
	public $timestamps = true;
	protected $softDelete = false;
	protected $guarded = array('id', 'timestamps');
	protected $fillable = array('user_id', 'task_id', 'content');

    public static $rules = array(
        'user_id'  => 'required',
        'task_id'  => 'required',
        'content'  => 'required|min:3|max:1000'
    );

	public function task()
	{
		return $this->belongsTo('Task');
	}

}