<?php

/**
 * An Eloquent Model: 'StarredProject'
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $project_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class StarredProject extends BaseModel {

    protected $table = 'starred_projects';
    public $timestamps = true;
    protected $softDelete = false;

    protected $fillable = array('user_id', 'project_id');
    protected $guarded = array('id', 'timestamps');

    public function user()
    {
        $this->belongsTo('User');
    }

    public function project()
    {
        $this->hasOne('Project');
    }
}