<?php
App::uses('AppController', 'Controller');
class ContentsController extends AppController {

	public function add($event_id = null) {
		$result = false;
		if (!empty($event_id) && $this->Content->Event->exists($event_id) && !$this->Content->find('first', array('conditions' => array('event_id' => $event_id, 'url' => $this->request->data['url']), 'recursive' => -1)) && $this->request->is('post')) {
			$this->Content->create();
			$this->request->data['event_id'] = $event_id;
			$result = !!$this->Content->save($this->request->data);
		}
		$this->set('_serialize', array('result'));
	}
}
