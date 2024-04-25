<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Coments Controller
 *
 * @property \App\Model\Table\ComentsTable $Coments
 */
class ComentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Coments->find()
            ->contain(['Users', 'Photos']);
        $coments = $this->paginate($query);

        $this->set(compact('coments'));
    }

    /**
     * View method
     *
     * @param string|null $id Coment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coment = $this->Coments->get($id, contain: ['Users', 'Photos']);
        $this->set(compact('coment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $coment = $this->Coments->newEmptyEntity();
        if ($this->request->is('post')) {
            $coment = $this->Coments->patchEntity($coment, $this->request->getData());
            if ($this->Coments->save($coment)) {
                $this->Flash->success(__('The coment has been saved.'));

                return $this->redirect(['controller' => 'photos', 'action' => 'view', $coment->photo_id]);
            }
            $this->Flash->error(__('The coment could not be saved. Please, try again.'));
        }
        $users = $this->Coments->Users->find('list', limit: 200)->all();
        $photos = $this->Coments->Photos->find('list', limit: 200)->all();
        $this->set(compact('coment', 'users', 'photos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coment = $this->Coments->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coment = $this->Coments->patchEntity($coment, $this->request->getData());
            if ($this->Coments->save($coment)) {
                $this->Flash->success(__('The coment has been saved.'));

                return $this->redirect(['controller' => 'photos', 'action' => 'view', $coment->photo_id]);
            }
            $this->Flash->error(__('The coment could not be saved. Please, try again.'));
        }
        $users = $this->Coments->Users->find('list', limit: 200)->all();
        $photos = $this->Coments->Photos->find('list', limit: 200)->all();
        $this->set(compact('coment', 'users', 'photos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coment = $this->Coments->get($id);
        if ($this->Coments->delete($coment)) {
            $this->Flash->success(__('The coment has been deleted.'));
        } else {
            $this->Flash->error(__('The coment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'photos', 'action' => 'view', $coment->photo_id]);
    }
}