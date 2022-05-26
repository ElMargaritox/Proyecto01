<?php



 class Plugins extends Controllers{
     public function __construct(){
        parent::__construct();
     }

     public function plugins($params){
         $data["page_id"] = 1;
         $data['tag_page'] = "Plugins";
         $data["page_title"] = "Pagina plugins";
         $data["page_name"] = "plugins";
         $data["page_content"] = "Mucho Texto";

         $_SESSION["pageSelected"] = "Plugins";

         if(empty($_COOKIE["cookieNombre"])){
            

            if(empty($_COOKIE["cookiePrecio"])){
               $data["plugins_content"] = $this->model->GetPlugins();
            }else{
               $data["plugins_content"] = $this->model->GetPluginsWithPrice($_COOKIE["cookiePrecio"]);
            }
         }else{
            if($_COOKIE["cookieNombre"] != ""){
               $data["plugins_content"] = $this->model->GetPluginsWithName($_COOKIE["cookieNombre"]);
            }
         }

         $this->views->getView($this, "plugins", $data);
        

     }

     public function plugin($id){
        $data = $this->model->GetPlugin($id);
        $_SESSION["pageSelected"] = "Plugins";
        $this->views->getView($this, "plugin", $data);
     }

    

 }

?>