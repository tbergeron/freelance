<?php

/**
 * An Eloquent Model: 'Project'
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasks
 */
class Project extends BaseModel {

	protected $table = 'projects';
	public $timestamps = true;
	protected $softDelete = true;
	protected $guarded = array('id', 'timestamps');
	protected $fillable = array('name', 'code');

    public static $rules = array(
        'name'  => 'required|min:3|max:255',
        'code'  => 'required|max:8|unique:projects'
    );

    public function tasks()
	{
		return $this->hasMany('Task');
	}

    public function afterValidate()
    {
        // Making sure there's no crap in the code
        $this->code = strtoupper(Str::slug($this->code));
    }

}