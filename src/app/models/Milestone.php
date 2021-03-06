<?php

use Carbon\Carbon;

/**
 * An Eloquent Model: 'Milestone'
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Task[] $tasks
 * @property-read \Project $project
 * @property string $due_date
 * @property string $description
 * @method static Milestone upcoming()
 */
class Milestone extends BaseModel {

	protected $table = 'milestones';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = ['project_id', 'name', 'description', 'due_date'];
    protected $guarded = ['id', 'timestamps'];
    protected $touches = array('project');

    public static $rules = [
        'name'  => 'required|min:3|max:255',
        'project_id'  => 'not_zero',
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function project()
	{
		return $this->belongsTo('Project');
	}

    public function tasks()
	{
		return $this->hasMany('Task');
	}

    public function getDates()
    {
        return array('created_at', 'updated_at', 'due_date');
    }

    public function formatted_due_date()
    {
        $this->due_date->setToStringFormat('Y-m-d');
        return $this->due_date->toDateString();
    }

    public static function forDropdown($project_id = null)
    {
        $milestones = Milestone::where('project_id', $project_id)->get();
        return parent::prepareArrayForDropdown($milestones);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('due_date', '>', date('Y-m-d'));
    }

}