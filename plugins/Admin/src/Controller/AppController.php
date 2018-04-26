<?php
namespace Admin\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
require_once(ROOT .DS. 'src'.DS. 'Lib' . DS .'image_load.php');
use Cake\I18n\I18n;
use Cake\I18n\Time;
use image_load;
class AppController extends BaseController
{

    public $helpers = ['Admin.JqueryUpload', 'Admin.General'];
    public function initialize()
    {
        $this->viewBuilder()->layout('Admin.admin');
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
        $this->response->header(
            array(
                'X-Frame-Options' => 'DENY',
                'X-XSS-Protection'=> 1,
                'Strict-Transport-Security'=>'max-age=15552000; includeSubDomains; preload'
            )
        );
        $this->loadModel('ProductTypes');
        $this->loadModel('Products');
        $this->loadModel('Suppliers');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                //'plugin' => 'Admin'
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index',
                //'plugin' => 'Admin'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                //'plugin' => 'Admin',
                //'home'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ] ,
            //'storage' => 'Session',
            'authError' => 'You can not access that page',
            'authorize' => ['Controller']
        ]);
    }
    //public $logged_in = false;
    public $current_user = null;
    public function beforeFilter(Event $event)
    {
        $this->current_user = $this->Auth->user();
        //$this->set('logged_in', $this->logged_in);
        $this->set('current_user', $this->current_user);

        $menu_items = array(
            /*'home' => array(
                'text' => 'Home',
                'link' => Router::url(['controller' => 'home','action' => 'index']),
                'icon' => 'icon-home'
            ),*/
            'users' => array(
                'text' => 'Users',
                'link' => Router::url(['controller' => 'users', 'action' => 'index']),
                'icon' => '',
                'sub_menu' => array(
                    'index' => array(
                        'text' => 'List users',
                        'link' => Router::url(['controller' => 'users','action' => 'index']),
                        'icon' => '',
                    ),
                    'add' => array(
                        'text' => 'Add new users',
                        'link' => Router::url(['controller' => 'users', 'action' => 'add']),
                        'icon' => '',
                    )
                )
            ),
            'products' => array(
                'text' => 'Products',
                'link' => Router::url(['controller' => 'products', 'action' => 'index']),
                'icon' => '',
                'sub_menu' => array(
                    'index' => array(
                        'text' => 'List Products',
                        'link' => Router::url(['controller' => 'products','action' => 'index']),
                        'icon' => '',
                    ),
                    'add' => array(
                        'text' => 'Add new Product',
                        'link' => Router::url(['controller' => 'products', 'action' => 'add']),
                        'icon' => '',
                    )
                )
            ),
            'product_types' => array(
                'text' => 'Product Types',
                'link' => Router::url(['controller' => 'ProductTypes', 'action' => 'index']),
                'icon' => '',
                'sub_menu' => array(
                    'index' => array(
                        'text' => 'List Types of Product',
                        'link' => Router::url(['controller' => 'ProductTypes','action' => 'index']),
                        'icon' => '',
                    ),
                    'add' => array(
                        'text' => 'Add new Type',
                        'link' => Router::url(['controller' => 'ProductTypes', 'action' => 'add']),
                        'icon' => '',
                    )
                )
            ),
            'suppliers' => array(
                'text' => 'Suppliers',
                'link' => Router::url(['controller' => 'suppliers', 'action' => 'index']),
                'icon' => '',
                'sub_menu' => array(
                    'index' => array(
                        'text' => 'List of Suppliers',
                        'link' => Router::url(['controller' => 'suppliers','action' => 'index']),
                        'icon' => '',
                    ),
                    'add' => array(
                        'text' => 'Add new Supplier',
                        'link' => Router::url(['controller' => 'suppliers', 'action' => 'add']),
                        'icon' => '',
                    )
                )
            )
//            'samples' => array(
//                'text' => 'Samples',
//                'link' => Router::url(['controller' => 'Samples', 'action' => 'index']),
//                'icon' => '',
//                'sub_menu' => array(
//                    'index' => array(
//                        'text' => 'List samples',
//                        'link' => Router::url(['controller' => 'Samples','action' => 'index']),
//                        'icon' => '',
//                    ),
//                    'add' => array(
//                        'text' => 'Add new sample',
//                        'link' => Router::url(['controller' => 'Samples', 'action' => 'add']),
//                        'icon' => '',
//                    )
//                )
//            ),
        );
        $this->set('menu_items', $menu_items);
        $menu_active = strtolower($this->request->params['controller']);
        if(!in_array($menu_active, array_keys($menu_items))){
            foreach($menu_items as $key_menu => $menu){
                $sub_menu = !empty($menu_items[$key_menu]['sub_menu']) ? $menu_items[$key_menu]['sub_menu'] : array();
                if(in_array($menu_active, array_keys($sub_menu))){
                    $sub_menu_active = $menu_active;
                    $menu_active = $key_menu;
                    break;
                }
            }
        }
        $this->set('menu_active', $menu_active != '' ? $menu_active : 'index');
        $sub_menu_active = isset($sub_menu_active) ? $sub_menu_active : $this->request->params['action'];
        $this->set('sub_menu_active', $sub_menu_active != '' ? $sub_menu_active : 'index');

        $SessionExprieTime = $this->request->session()->read('Admin.SessionExprieTime');
        if(!empty($SessionExprieTime))
        {
            if($SessionExprieTime <= time())
            {
                if($SessionExprieTime <= time())
                {
                    $controller = $this->request->params['controller'];
                    $action = $this->request->params['action'];
                    $avoid_action = array('validateSessionExprie','sessionLogout','login');
                    if( $controller != 'Users' || ($controller == 'Users' && !in_array($action,$avoid_action)))
                    {
                        $this->Auth->logout();
                    }
                }
            }
        }
        $this->set('SessionExprieIn', $this->createSessionExprie());
        $this->set('webroot_full', Router::url('/', true));

        if(in_array($this->request->params['action'], array('update_order'))){
            $this->eventManager()->off($this->Csrf);
        }
    }
    function createSessionExprie(){
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
        $avoid_action = array('validateSessionExprie','sessionLogout','login');
        if( $controller != 'Users' || ($controller == 'Users' && !in_array($action,$avoid_action)))
        {
            $time = time();
            $SessionExprieTime = strtotime(date('Y-m-d H:i:s') . " + 20 minutes");
            $this->request->session()->write('Admin.SessionExprieTime',$SessionExprieTime);
            $SessionExprieIn = $SessionExprieTime - $time;
            return $SessionExprieIn;
        }
        return '';
    }
    public function deleteImage($model,$id,$order){
        $image = $this->Images->find('all')
            ->where([
                'model'=>$model,
                'foreign_key'=>$id,
                'order'=>$order
        ]);
        if($this->Images->delete($image)){
            @unlink($image->src);
        }
    }

    public function coverSaving($model = null ,$object = null,$key_field = null,$h = null,$w = null,$type= null){
        $table = TableRegistry::get($model);

        $image_path = 'files/upload/'.$model.'/' . $object->id;
        $dir_image = new Folder(WWW_ROOT . $image_path, true, 0777);
        $src = $object[$key_field];

        $src_thumbnail = str_replace('files/upload/temp/', 'files/upload/temp/thumbnail/', $src);
        $thumbnail_path = 'files/upload/'.$model.'/' . $object->id.'/thumbnail';
        $dir_thumbnail = new Folder(WWW_ROOT . $thumbnail_path, true, 0777);

        $this->moveImage( $src_thumbnail,
            str_replace('files/upload/temp/thumbnail/', '', $src_thumbnail),
            $thumbnail_path);

        $object[$key_field] =  $this->moveImage(
            $src,
            str_replace('files/upload/temp/', '',  $src),
            $image_path,$h,$w,$type);
        if($table->save($object)){
            @unlink(WWW_ROOT.$src);
            return 1;
        }else{
            return 0;
        }

    }

    public function imageSaving($model = null ,$id = null ,$src = null,$order = null ,$h = null,$w = null,$type= null){
        $this->loadModel('Images');
        $edit_image = $this->Images->find('all')->where(['model'=>$model, 'foreign_key'=>$id,'sort_order'=>$order])->first();




        $image_path = 'files/upload/'.$model.'/' . $id;

        $thumbnail_path = 'files/upload/'.$model.'/' . $id.'/thumbnail';
        $src_thumbnail = str_replace('files/upload/temp/', 'files/upload/temp/thumbnail/', $src);

        $dir_thumbnail = new Folder(WWW_ROOT . $thumbnail_path, true, 0777);
        $dir_image = new Folder(WWW_ROOT . $image_path, true, 0777);

        if(!empty($edit_image)){
            $image = $edit_image;

            if(!empty($image->src)){
                @unlink(WWW_ROOT.$image->src);
                @unlink(WWW_ROOT.str_replace('files/upload/'.$model.'/' . $id.'/', 'files/upload/'.$model.'/' . $id.'/thumbnail/', $image->src));
            }
        }else{
            $image = $this->Images->newEntity();
            $image->model = $model;
            $image->foreign_key = $id;
            $image->sort_order = $order;
        }
        $this->moveImage( $src_thumbnail,
            str_replace('files/upload/temp/thumbnail/', '', $src_thumbnail),
            $thumbnail_path);

        $image->src =  $this->moveImage(
            $src,
            str_replace('files/upload/temp/', '', $src),
            $image_path,$h,$w,$type);

        if($this->Images->save($image)){
            @unlink(WWW_ROOT.$src);
            return $image->id;
        }else{
            return 'Error';
        }

    }

    function moveImage($image_path = null, $file_name= null, $thumb_path = null,$h = null,$w = null,$type= null){
        if(file_exists($image_path))
        {
            $img = new image_load();
            $img->load($image_path);
            if(!empty($h) && !empty($w)){
                if($type =='resize' || empty($type)){
                    $img->resizeWidthHeight($w,$h);
                }else if($type == 'crop'){
                    $img->crop($w,$h);
                }
            }else if(!empty($h) && empty($w)){
                $img->resize_to_height($h);
            }else if(empty($h) && !empty($w)){
                $img->resize_to_width($w);
            }
            $img->save($thumb_path.'/'.$file_name,100);
            return $thumb_path.'/'.$file_name;
        }
    }
    public function isAuthorized($user){
        return true;
    }

}