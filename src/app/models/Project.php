<?php

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