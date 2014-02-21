<?php

/**
 * An Eloquent Model: 'StarredTask'
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $task_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class StarredTask extends BaseModel {

	protected $table = 'starred_tasks';
	public $timestamps = true;
	protected $softDelete = false;

    protected $fillable = array('user_id', 'task_id');
    protected $guarded = array('id', 'timestamps');

    public function user()
    {
        $this->belongsTo('User');
    }

    public function task()
    {
        $this->hasOne('Task');
    }
}