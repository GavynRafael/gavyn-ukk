<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\LikesTable;
use Cake\View\Helper\HtmlHelper;
use Cake\View\Helper\FormHelper;
use Cake\ORM\TableRegistry;

/**
 * Photos Controller
 *
 * @property \App\Model\Table\PhotosTable $Photos
 */
class PhotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Photos->find()
            ->contain(['Users', 'Albums']);
        $photos = $this->paginate($query);

        $this->set(compact('photos'));
    }

    /**
     * View method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $photo = $this->Photos->get($id, contain: ['Users', 'Albums', 'Coments', 'Likes']);
        $this->set(compact('photo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $photo = $this->Photos->newEmptyEntity();
        if ($this->request->is('post')) {

            $files = $this->request->getUploadedFiles();
            $files['photo']->getStream();
            $files['photo']->getSize();
            $files['photo']->getClientFileName();

            $myname = $this->request->getData()['photo']->getClientFileName();
            $myext = substr(strchr($myname, "."), 1);
            $mypaht = "img/" . $myname . "." . $myext;

            $photo = $this->Photos->patchEntity($photo, $this->request->getData());

            $photo->photo = $myname . "." . $myext;
            $files['photo']->moveTo(WWW_ROOT . $mypaht);

            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photo could not be saved. Please, try again.'));
        }
        $users = $this->Photos->Users->find('list', limit: 200)->all();
        $albums = $this->Photos->Albums->find('list', limit: 200)->all();
        $this->set(compact('photo', 'users', 'albums'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photo = $this->Photos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $files = $this->request->getUploadedFiles();
            $files['photo']->getStream();
            $files['photo']->getSize();
            $files['photo']->getClientFileName();

            $myname = $this->request->getData()['photo']->getClientFileName();
            $myext = substr(strchr($myname, "."), 1);
            $mypaht = "img/" . $myname . "." . $myext;

            $photo = $this->Photos->patchEntity($photo, $this->request->getData());

            $photo->photo = $myname . "." . $myext;
            $files['photo']->moveTo(WWW_ROOT . $mypaht);

            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('The photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The photo could not be saved. Please, try again.'));
        }
        $users = $this->Photos->Users->find('list', limit: 200)->all();
        $albums = $this->Photos->Albums->find('list', limit: 200)->all();
        $this->set(compact('photo', 'users', 'albums'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $photo = $this->Photos->get($id);
        if ($this->Photos->delete($photo)) {
            $this->Flash->success(__('The photo has been deleted.'));
        } else {
            $this->Flash->error(__('The photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}