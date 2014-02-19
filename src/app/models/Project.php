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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Milestone[] $milestones
 * @property string $description
 */
class Project extends BaseModel {

	protected $table = 'projects';
	public $timestamps = true;
	protected $softDelete = true;
	protected $fillable = ['name', 'code', 'description'];
	protected $guarded = ['id', 'timestamps'];

    public static $rules = [
        'name'  => 'required|min:3|max:255',
        'code'  => 'required|max:8'
    ];

    public function tasks()
	{
		return $this->hasMany('Task');
	}

    public function milestones()
	{
		return $this->hasMany('Milestone');
	}

    public function afterValidate()
    {
        // Making sure there's no crap in the code
        $this->code = strtoupper(Str::slug($this->code));
    }

}