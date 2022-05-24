<?php



class Account extends Controllers{
    public function __construct(){
       parent::__construct();
    }

    public function account($params){
        $data["page_id"] = 1;
        $data['tag_page'] = "Account";
        $data["page_title"] = "Tu Cuenta";
        $data["page_name"] = "account";
        $data["page_content"] = "Mucho Texto";
        $_SESSION["pageSelected"] = "Account";


        if($_GET){
        


            if(isset($_GET["licence"]) & isset($_GET["password"])){
                $data["status"] = $this->model->GetLicence($_GET["licence"], $_GET["password"]);
                if($data["status"] > 0){
                    $_SESSION["Logged"] = $data["status"];
                    $_SESSION["_Licence"] = $_GET["licence"];
                    $_SESSION["_Password"] = $_GET["password"];

                    header('Location: '. base_url().'account');
                }else{
                    header('Location: '. base_url().'account/login?error=1');
                }
            }else{


                if(isset($_SESSION["Logged"])){
                    $this->views->getView($this, "account", $data);
                }else{
                    header('Location: '. base_url().'account/login');
                }
                
                
            }
    
        }

       
    }

    public function logout(){
        session_destroy();
        header('Location: '. base_url().'account/login');
    }

    public function myplugins(){
        
        if(isset($_SESSION["Logged"])){
            $data["status"] = $this->model->GetLicence($_SESSION["_Licence"], $_SESSION["_Password"]);
            $data["myplugins"] = explode(",", $data["status"]["Plugins"]);
            $data["ips"] = explode(",", $data["status"]["Ip"]);
            $this->views->getView($this, "accountMyPlugins", $data);
        }else{
            header('Location: '. base_url().'account/');
        }

    }

    public function admin($params){

        $data["page_title"] = "Admin Panel";


        if(!isset($_SESSION["Logged"])){
            $this->views->getView($this, "accountLogin", $data);
        }else{

            if($_SESSION["Logged"]["adminMode"] == 1){

                switch ($params) {
                    case 'licences':
                        
                        $this->views->getView($this, "Admin/licenceManager", $data);
                        break;
                    case 'plugins':
                        if($_GET){

                            if(!empty($_GET["action"])){
                                switch ($_GET["action"]) {
                                    case 'remove':
                                        if(!empty($_GET["id"])){
                                            echo "SE HA ELIMINADO CORRECTAMENTE".$_GET["id"];
                                            $this->model->removePlugin($_GET["id"]);
                                            sleep(2);
                                            header('Location: '. base_url().'account/admin/plugins'); 
                                        }else{
                                            header('Location: '. base_url().'account/admin/plugins'); 
                                        } 
                                        break;
                                    case 'add':
                                        if(!empty($_GET["pluginName"]) & !empty($_GET["pluginPrice"])){
                                            echo "SE HA AGREGADO CORRECTAMENTE".$_GET["pluginName"];
                                            //$this->model->removePlugin($_GET["id"]);  sleep(2);
                                            
                                            //header('Location: '. base_url().'account/admin/plugins'); 
                                        }else{
                                            header('Location: '. base_url().'account/admin/plugins'); 
                                        } 
                                        break;
                                    
                                    default:
                                    header('Location: '. base_url().'account/admin/plugins');
                                        break;
                                }
                            }

                        }else{
                            echo "NO";
                        }
                                   //     $this->model->removePlugin($_GET["id"]);
                                   //     header('Location: '. base_url().'account/admin/plugins');



                        $data["plugins"] = $this->model->GetPlugins();
                        $this->views->getView($this, "Admin/pluginsManager", $data);
                            break;    
                    default:
                        header('Location: '. base_url().'account/');
                        break;
                }

                
            }else{
                header('Location: '. base_url().'account/');
            }
            
        }
         
    }

    public function login($params){
        $data["page_id"] = 1;
        $data['tag_page'] = "Account";
        $data["page_title"] = "Tu Cuenta";
        $data["page_name"] = "account";
        $data["page_content"] = "Mucho Texto";

        $_SESSION["pageSelected"] = "Account";

        if(!isset($_SESSION["Logged"])){
            $this->views->getView($this, "accountLogin", $data);
        }else{
            header('Location: '. base_url().'account/');
        }

       
    }


}

?>