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
         $data["plugins_content"] = $this->model->GetPlugins();
        $this->views->getView($this, "plugins", $data);
     }

     public function plugin($id){
        $data = $this->model->GetPlugin($id);
        $_SESSION["pageSelected"] = "Plugins";
        $this->views->getView($this, "plugin", $data);
     }

    

 }

?>