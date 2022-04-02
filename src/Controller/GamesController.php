<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 * @method \App\Model\Entity\Game[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GamesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['players','matches','error']);
    }

    public function uploadOutline($guid="")
    {
        $this->autoRender = false;
        $this->log('id='.$guid);
        $game = $this->Games->findAllByGuid($guid)->first();
        if($game==null){
            $this->log('$game==null');
            $game = $this->Games->newEmptyEntity();
            //$game = $this->Games->patchEntity($game, $this->request->getData());
            $game['guid']=$guid;
        }
        $game['outline']=json_encode($this->request->getData());
        if (!$this->Games->save($game)) {
            $this->log('ERROR : uploadGame'.'/'.$game['guid']);
        }
    }

    public function uploadPlayers($guid="")
    {
        $this->autoRender = false;
        $data = $this->Games->findAllByGuid($guid)->first();
        if($data!=null){
            $data['players']=json_encode($this->request->getData());
            if (!$this->Games->save($data)) {
                $this->log('ERROR : uploadPlayers'.'/'.$data['id']);
            }
        }
    }

    public function uploadMatches($guid="")
    {
        $this->autoRender = false;
        $data = $this->Games->findAllByGuid($guid)->first();
        if($data!=null){
            $data['matches']=json_encode($this->request->getData());
            if (!$this->Games->save($data)) {
                $this->log('ERROR : uploadMatches'.'/'.$data['id']);
            }
        }
    }

    public function players($guid=""){
        $data = $this->Games->findAllByGuid($guid)->first();
        if($data!=null){
            $outline = json_decode($data['outline']);
            $players = json_decode($data['players']);
            $this->set(compact('outline','players','guid'));
        }else{
            return $this->redirect(['action' => 'error']);
        }
    }

    public function matches($guid=""){
        $data = $this->Games->findAllByGuid($guid)->first();
        if($data!=null){
            $outline = json_decode($data['outline']);
            $matches = json_decode($data['matches']);

            $this->set(compact('outline','matches','guid'));
        }else{
            return $this->redirect(['action' => 'error']);
        }
    }

    public function error(){
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $games = $this->paginate($this->Games);

        $this->set(compact('games'));
    }

    /**
     * View method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('game'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $game = $this->Games->newEmptyEntity();
        if ($this->request->is('post')) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $this->set(compact('game'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $this->set(compact('game'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);
        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
