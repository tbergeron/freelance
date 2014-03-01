<?php

/**
 * An Eloquent Model: 'Permission'
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $project_id
 * @property boolean $read
 * @property boolean $write
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Permission extends Eloquent {

    protected $table = 'permissions';
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

    /***
     * Check if the user has permissions on a project
     * @param $project_id
     * @param bool $need_read
     * @param bool $need_write
     * @return bool $safe
     */
    public static function check($project_id, $need_read = true, $need_write = true)
    {
        $safe = false;
        $permission = Permission::where('project_id', $project_id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($permission) {
            if ($need_read) {
                if ($permission->read) {
                    $safe = true;
                } else {
                    $safe = false;
                }
            }

            if ($need_write) {
                if ($permission->write) {
                    $safe = true;
                } else {
                    $safe = false;
                }
            }
        }

        return $safe;
    }

    public static function kickOut()
    {
        return Redirect::back()->withMessage(trans('user.no_permissions'))->withType('danger');
    }

}
