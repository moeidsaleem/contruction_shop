<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Outs Controller
 *
 *
 * @method \Admin\Model\Entity\Out[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OutsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $outs = $this->paginate($this->Outs);

        $this->set(compact('outs'));
    }

    /**
     * View method
     *
     * @param string|null $id Out id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $out = $this->Outs->get($id, [
            'contain' => []
        ]);

        $this->set('out', $out);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clients_list= $this->Clients->find('list',[
            'keyField'=>'id',
            'valueField'=>'name'
        ])->toArray();
        $out = $this->Outs->newEntity();
        if ($this->request->is('post')) {
            $out = $this->Outs->patchEntity($out, $this->request->getData());
            if ($this->Outs->save($out)) {
                $this->Flash->success(__('The out has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The out could not be saved. Please, try again.'));
        }
        $this->set('clients_list',$clients_list);
        $this->set(compact('out'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Out id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $out = $this->Outs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $out = $this->Outs->patchEntity($out, $this->request->getData());
            if ($this->Outs->save($out)) {
                $this->Flash->success(__('The out has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The out could not be saved. Please, try again.'));
        }
        $this->set(compact('out'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Out id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $out = $this->Outs->get($id);
        if ($this->Outs->delete($out)) {
            $this->Flash->success(__('The out has been deleted.'));
        } else {
            $this->Flash->error(__('The out could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
