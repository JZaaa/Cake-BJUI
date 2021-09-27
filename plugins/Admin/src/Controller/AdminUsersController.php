<?php
declare(strict_types=1);

namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use App\Model\Table\AdminUsersTable;
use Cake\Routing\Router;

/**
 * AdminUsers Controller
 *
 * @property AdminUsersTable $AdminUsers
 * @method \App\Model\Entity\AdminUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminUsersController extends AppController
{

    protected $AdminUsers;

    public function initialize(): void
    {
        parent::initialize();
        $this->AdminUsers = TableRegistry::getTableLocator()->get('AdminUsers');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login', 'unauthenticated']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('default');
        $result = $this->Authentication->getResult();

        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? Router::url(['plugin' => 'Admin', 'controller' => 'Home', 'action' => 'index']);
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['plugin' => 'Admin' ,'controller' => 'AdminUsers', 'action' => 'login']);
    }


    public function index()
    {

        $this->setPage();
        $conditions = [];

        $query = $this->AdminUsers->find()
            ->where($conditions);

        $data = $this->paginate($query);

        $this->set(compact('data'));

    }

    public function add()
    {
        if ($this->request->is('post')) {

            $newData = $this->request->getData();

            $data = $this->AdminUsers->newEmptyEntity();

            $data = $this->AdminUsers->patchEntity($data, $newData);

            if ($this->AdminUsers->save($data)) {
                return $this->jump(200);
            }

            return $this->jump(300);
        }

    }

    public function edit($id = null)
    {
        $data = $this->AdminUsers->get($id);

        if ($this->request->is('post')) {

            $newData = $this->request->getData();
            $data = $this->AdminUsers->patchEntity($data, $newData);

            if ($this->AdminUsers->save($data)) {
                return $this->jump(200);
            }

            return $this->jump(300);
        }

        $this->set(compact('data'));

    }


    public function delete($id = null)
    {

        if ($this->request->is('post')) {
            $data = $this->AdminUsers->get($id);

            if ($this->AdminUsers->delete($data)) {
                return $this->jump([
                    'code' => 200,
                    'closeCurrent' => false
                ]);
            }
         }

        return $this->jump(300);

    }

    public function unauthenticated()
    {
        if ($this->request->is('ajax')) {
            return $this->jump(401);
        }
        return $this->redirect(['plugin' => 'Admin' ,'controller' => 'AdminUsers', 'action' => 'login']);
    }


}
