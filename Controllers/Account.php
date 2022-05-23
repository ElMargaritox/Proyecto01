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
                    header('Location: '. base_url().'account/login');
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

            $this->views->getView($this, "accountMyPlugins", $data);
        }else{
            header('Location: '. base_url().'account/');
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