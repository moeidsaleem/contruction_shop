<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * Ins Controller
 *
 *
 * @method \Admin\Model\Entity\In[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ins = $this->paginate($this->Ins);

        $this->set(compact('ins'));
    }

    /**
     * View method
     *
     * @param string|null $id In id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $in = $this->Ins->get($id, [
            'contain' => []
        ]);

        $this->set('in', $in);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suppliers= $this->Suppliers->find('list',[
            'keyField' =>'id',
            'valueField' => 'name'
        ])-> toArray();
        $products = $this->Products->find('list',[
            'keyField' => 'id',
            'valueField' => 'name'
        ])->toArray();
        $in = $this->Ins->newEntity();
        if ($this->request->is('post')) {
            $in = $this->Ins->patchEntity($in, $this->request->getData());
            if ($this->Ins->save($in)) {
                $this->Flash->success(__('The in has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The in could not be saved. Please, try again.'));
        }

        $this->set('suppliers',$suppliers);
        $this->set('products',$products);
        $this->set(compact('in'));
    }

    /**
     * Edit method
     *
     * @param string|null $id In id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $in = $this->Ins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $in = $this->Ins->patchEntity($in, $this->request->getData());
            if ($this->Ins->save($in)) {
                $this->Flash->success(__('The in has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The in could not be saved. Please, try again.'));
        }
        $this->set(compact('in'));
    }

    /**
     * Delete method
     *
     * @param string|null $id In id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $in = $this->Ins->get($id);
        if ($this->Ins->delete($in)) {
            $this->Flash->success(__('The in has been deleted.'));
        } else {
            $this->Flash->error(__('The in could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
