<?php

class BaseController extends Controller {

    public function __construct($skip_auth = false)
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        
        if (!$skip_auth)
            $this->beforeFilter('auth');
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}