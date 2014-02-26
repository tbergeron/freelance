<?php


/**
 * An Eloquent Model: 'Page'
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Project $project
 */
class Page extends BaseModel {

    protected $table = 'pages';
    public $timestamps = true;
    protected $softDelete = false;
    protected $fillable = ['project_id', 'name', 'content'];
    protected $guarded = ['id', 'timestamps'];

    public static $rules = [
        'name'  => 'required|min:3|max:255',
        'project_id'  => 'not_zero'
    ];

    public function project()
    {
        return $this->belongsTo('Project');
    }

    public function name_short($len = 40)
    {
        // shorten task name
        return Str::limit($this->name, $len);
    }

}