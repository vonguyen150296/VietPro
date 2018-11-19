<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
$email_admin = $_COOKIE['VietPro'];
if($_SESSION[$email_admin] !== 'admin'){
    header('Location: http://localhost/VietPro/admin.php');
}
 
class Publication_Controller extends Controller
{
    public function ListAction()
    {
        $this->model->load('publication');// loader model publication
        $pub = new Publication_Model();

        $data = array(
            'content' => 'ListPublication_View'
        );

        $data['infos']['pub'] = $pub->list();
         
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
    }

    public function NewAction()
    {
        $data = array(
            'content' => 'NewPublication_View'
        );
        $this->view->load('Main_View', $data);
        $this->view->show();
    }

    public function PubAction() // render a publication with id
    {
        $this->model->load('publication');// loader model publication
        $pub = new Publication_Model();

        $data = array(
            'content' => 'Publication_View'
        );
        $data['infos']['pub'] = $pub->get_pub($_GET['id']);
         
        // Load view
        $this->view->load('Main_View', $data);
         
        // Show view
        $this->view->show();
    }

    public function CreateAction(){
        if(isset($_POST['create'])){
            if($_FILES['image']['name']){// verify exist file ou non
                if($_FILES['image']['type'] == 'image/jpeg' OR $_FILES['image']['type'] == 'image/png' OR $_FILES['image']['type'] == 'image/jpg'){ //verify file is image oun non

                    //create name for image
                    $name = 'image_'.rand(10000000,99999999).'.jpg';
                    while (file_exists('./admin/public/upload/'.$name)) {
                        $name = 'image_'.rand(10000000,99999999).'.jpg';
                    }
                    // move file image into folder upload
                    move_uploaded_file($_FILES['image']['tmp_name'],'./site/public/upload/'.$name);

                    //stocker in database
                    date_default_timezone_set("Europe/Paris");
                    $date=date("Y-m-d");


                    $cols = "(subject, content, resume, image, date, important)";
                    $value = "('".$_POST['subject']."', '".$_POST['content']."', '".$_POST['summary']."', '".$name."', '".$date."'";
                    if(!empty($_POST['important'])){
                        $value = $value.", '".$_POST['important']."')";
                    }else{
                        $value = $value.", ' ')";
                    }

                    $this->model->load('publication');// loader model publication
                    $pub = new Publication_Model();
                    $pub->create_pub($cols, $value);//create new publication

                    //load helper
                    $this->helper->load('function'); 

                    //call redirect
                    redirect('admin.php', 'publication', 'list');
                }
            }
        }else{
            echo "<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>";
        }
    }
}