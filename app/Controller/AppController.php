<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $components = array(
		'Session',
		'RequestHandler',
		'DebugKit.Toolbar',
	);

/*
	public function beforeFilter() {
		if (!empty($this->request->params['ext']) && $this->request->params['ext'] == 'json') {
			Configure::write('debug', 0);
		}
		Configure::write('debug', 0);
	}
*/
}
