<?php

/**
 * An Eloquent Model: 'Comment'
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $task_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Task $task
 * @property-read \User $user
 */
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

	public function user()
	{
		return $this->belongsTo('User');
	}

}