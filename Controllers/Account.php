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
                    case 'licenses':
                        
                        $this->views->getView($this, "Admin/licenseManager", $data);
                        break;
                    case 'plugins':
                       
                        if($_POST){
                            if(check($_FILES['pluginImage']['type'], $_FILES['pluginImage']['size'])){
                                $temp = explode(".", $_FILES["pluginImage"]["name"]);
                                $info = $this->model->setPlugin($_POST["pluginName"], $_POST["pluginDescription"], " ", $_POST["pluginPrice"]);
                                $newfilename = $info . '.' . end($temp);
                                move_uploaded_file($_FILES['pluginImage']['tmp_name'], GetResositoryImages() . $newfilename);
                                $this->model->setImage($info, $_POST["pluginName"], $_POST["pluginDescription"], GetRepositoryImagesLink($newfilename), $_POST["pluginPrice"]);

                                // WRITE FILE TXT AND SAVE.

                                $fp = fopen(GetRespositoryConfigLink($info).'.txt',"wb");
                                if( $fp == false ){
                                 // NADA
                                }else{
                                  fwrite($fp, $_POST["pluginConfig"]);
                                  fclose($fp);
                                }

                                $fp2 = fopen(GetRepositoryPermsLink($info).'.txt',"wb");
                                if( $fp2 == false ){
                                 // NADA
                                }else{
                                  fwrite($fp, $_POST["pluginConfig"]);
                                  fclose($fp);
                                }

                                echo "SE SUBIO EL ARCHIVO";
                            }else{
                                echo '<b>No se pudo subir el plugin.</b>';
                            }
                            
                                /*
                                if(!empty($_GET["pluginName"]) & !empty($_GET["pluginPrice"] & !empty($_GET["pluginDescription"]))){
                                    $_FILES['pluginImage']['name'];
                                    //$this->model->removePlugin($_GET["id"]);  sleep(2);
                                    
                                    //header('Location: '. base_url().'account/admin/plugins'); 
                                }else{
                                    echo "ENTRO ACA";
                                } 
                                */
                        }

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
                                    default:
                                    header('Location: '. base_url().'account/admin/plugins');
                                        break;
                                }
                            }

                        }
                                   //     $this->model->removePlugin($_GET["id"]);
                                   //     header('Location: '. base_url().'account/admin/plugins');

                        $data["plugins"] = $this->model->GetPlugins(0, 2);

                        if(!$_GET){
                            header('Location: '. base_url().'account/admin/plugins?page=1');
                        }


                        if($_GET['page'] <= 0){
                            header('Location: '. base_url().'account/admin/plugins?page=1');
                        }

                        $iniciar = ($_GET['page']-1)*2;
                        


                        $data["plugins"] = $this->model->GetPlugins($iniciar, 2);

                        if($data["plugins"] == null){
                            header('Location: '. base_url().'account/admin/plugins?page=1');
                        }

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