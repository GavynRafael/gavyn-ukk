<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Likes Controller
 *
 * @property \App\Model\Table\LikesTable $Likes
 */
class LikesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Likes->find()
            ->contain(['Users', 'Photos']);
        $likes = $this->paginate($query);

        $this->set(compact('likes'));
    }

    /**
     * View method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $like = $this->Likes->get($id, contain: ['Users', 'Photos']);
        $this->set(compact('like'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $like = $this->Likes->newEmptyEntity();
        if ($this->request->is('post')) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());
            $existingLike = $this->Likes->find('all')
                ->where([
                    'photo_id' => $like->photo_id,
                    'user_id' => $like->user_id
                ])
                ->first();
            if ($existingLike) {
                if ($this->Likes->delete($existingLike)) {
                    $this->Flash->error(__('The photo has been unlike'));
                } else {
                    $this->Flash->error(__('The like could not be removed. Please, try again.'));
                }
            } else {
                if ($this->Likes->save($like)) {
                    $this->Flash->success(__('The photo has been like'));
                } else {
                    $this->Flash->error(__('The like could not be saved. Please, try again.'));
                }
            }
        }
        return $this->redirect($this->referer());
    }


    /**
     * Edit method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $like = $this->Likes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());
            if ($this->Likes->save($like)) {
                $this->Flash->success(__('The like has been saved.'));

                return $this->redirect(['controller' => 'photos', 'action' => 'view', $like->photo_id]);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $users = $this->Likes->Users->find('list', limit: 200)->all();
        $photos = $this->Likes->Photos->find('list', limit: 200)->all();
        $this->set(compact('like', 'users', 'photos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $like = $this->Likes->get($id);
        if ($this->Likes->delete($like)) {
            $this->Flash->success(__('The like has been deleted.'));
        } else {
            $this->Flash->error(__('The like could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'photos', 'action' => 'view', $like->photo_id]);
    }
}