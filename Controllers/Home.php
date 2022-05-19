<?php



 class Home extends Controllers{
     public function __construct(){
        parent::__construct();
     }

     public function home($params){
         $data["page_id"] = 1;
         $data['tag_page'] = "Home";
         $data["page_title"] = "Pagina principal";
         $data["page_name"] = "home";
         $data["page_content"] = "Mucho Texto";

         $_SESSION["pageSelected"] = "Home";

        $this->views->getView($this, "home", $data);
     }

     public function insertar(){
         $data = $this->model->setPlugin("Prueba", "Prueba2", "Prueba3", "Prueba4");
         print_r($data);
     }

     public function verplugin($name){
         $data = $this->model->getPlugin($name);
         print_r($data);
     }

     public function actualizar($id){
        $data = $this->model->updatePlugin($id, "Margarita", "margarita2", "margarita3", "margarita4");
        print_r($data);
     }

     public function plugins(){
        $data = $this->model->GetPlugins();
        dep($data);
     }

     public function removeUser($id){
         $data = $this->model->delUser($id);
         print_r($data);
     }
 }

?>