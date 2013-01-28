<?php
class AwoModulosController extends AppController {

	var $name = 'AwoModulos';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');

	function index() {
		$this->AwoModulo->recursive = 0;
		$this->set('awoModulos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid AwoModulo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('awoModulo', $this->AwoModulo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AwoModulo->create();
			if ($this->AwoModulo->save($this->data)) {
				$this->Session->setFlash(__('The AwoModulo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The AwoModulo could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid AwoModulo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AwoModulo->save($this->data)) {
				$this->Session->setFlash(__('The AwoModulo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The AwoModulo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AwoModulo->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for AwoModulo', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->AwoModulo->del($id)) {
			$this->Session->setFlash(__('AwoModulo deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The AwoModulo could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>