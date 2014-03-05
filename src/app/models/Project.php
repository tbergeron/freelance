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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Page[] $pages
 */
class Project extends BaseModel {

	protected $table = 'projects';
	public $timestamps = true;
	protected $softDelete = true;
	protected $fillable = ['name', 'code', 'description', 'icon'];
	protected $guarded = ['id', 'timestamps'];

    public static $rules = [
        'name'  => 'required|min:3|max:255',
        'code'  => 'required|max:8'
    ];

    public static $icons = ['asterisk', 'plus', 'euro', 'minus', 'cloud', 'envelope', 'pencil', 'glass', 'music', 'search', 'heart', 'star', 'star-empty', 'user', 'film', 'th-large', 'th', 'th-list', 'ok', 'remove', 'zoom-in', 'zoom-out', 'off', 'signal', 'cog', 'trash', 'home', 'file', 'time', 'road', 'download-alt', 'download', 'upload', 'inbox', 'play-circle', 'repeat', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcode', 'tag', 'tags', 'book', 'bookmark', 'print', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'list', 'indent-left', 'indent-right', 'facetime-video', 'picture', 'map-marker', 'adjust', 'tint', 'edit', 'share', 'check', 'move', 'step-backward', 'fast-backward', 'backward', 'play', 'pause', 'stop', 'forward', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-sign', 'minus-sign', 'remove-sign', 'ok-sign', 'question-sign', 'info-sign', 'screenshot', 'remove-circle', 'ok-circle', 'ban-circle', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'share-alt', 'resize-full', 'resize-small', 'exclamation-sign', 'gift', 'leaf', 'fire', 'eye-open', 'eye-close', 'warning-sign', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-cart', 'folder-close', 'folder-open', 'resize-vertical', 'resize-horizontal', 'hdd', 'bullhorn', 'bell', 'certificate', 'thumbs-up', 'thumbs-down', 'hand-right', 'hand-left', 'hand-up', 'hand-down', 'circle-arrow-right', 'circle-arrow-left', 'circle-arrow-up', 'circle-arrow-down', 'globe', 'wrench', 'tasks', 'filter', 'briefcase', 'fullscreen', 'dashboard', 'paperclip', 'heart-empty', 'link', 'phone', 'pushpin', 'usd', 'gbp', 'sort', 'sort-by-alphabet', 'sort-by-alphabet-alt', 'sort-by-order', 'sort-by-order-alt', 'sort-by-attributes', 'sort-by-attributes-alt', 'unchecked', 'expand', 'collapse-down', 'collapse-up', 'log-in', 'flash', 'log-out', 'new-window', 'record', 'save', 'open', 'saved', 'import', 'export', 'send', 'floppy-disk', 'floppy-saved', 'floppy-remove', 'floppy-save', 'floppy-open', 'credit-card', 'transfer', 'cutlery', 'header', 'compressed', 'earphone', 'phone-alt', 'tower', 'stats', 'sd-video', 'hd-video', 'subtitles', 'sound-stereo', 'sound-dolby', 'sound-5-1', 'sound-6-1', 'sound-7-1', 'copyright-mark', 'registration-mark', 'cloud-download', 'cloud-upload', 'tree-conifer', 'tree-deciduous'];

    public function __toString()
    {
        return $this->name;
    }

    public function name_short($len = 15)
    {
        return Str::limit($this->name, $len);
    }

    public function tasks()
    {
        return $this->hasMany('Task')->orderBy('updated_at', 'desc');
    }

    public function pages()
    {
        return $this->hasMany('Page')->orderBy('updated_at', 'desc');
    }

    public function milestones()
	{
        // closest dates first, null last.
        // TODO: null should be last
		return $this->hasMany('Milestone')->orderBy('due_date', 'asc');
	}

    public function afterValidate()
    {
        // Making sure there's no crap in the code
        $this->code = strtoupper(Str::slug($this->code));
    }

    public function is_starred()
    {
        $starred = StarredProject::where('user_id', Auth::user()->id)->where('project_id', $this->id)->first();
        return ($starred) ? true : false;
    }

    public static function icons()
    {
        $items = [];
        foreach(static::$icons as $icon){
            $items[$icon] = $icon;
        }
        return $items;
    }

}