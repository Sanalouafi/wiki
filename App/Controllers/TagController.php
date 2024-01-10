<?php

namespace App\Controllers;

require_once __DIR__.'/../../vendor/autoload.php';
use App\Models\TagModel;

class TagController
{
   

    public function addTag()
    {
        $tag_name = isset($_POST['tag_name']) ? htmlspecialchars($_POST['tag_name']) : null;
        
        if (empty($tag_name) ) {
            $error = "All fields are required.";

        }
        else{
            TagModel::addTag($tag_name);
                header("Location:categoryAdmin");
                exit();
        } 

    }

    public function editTag(){
        $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : null;
        $tag_name = isset($_POST['tag_name']) ? htmlspecialchars($_POST['tag_name']) : null;
        if (empty($tag_name) ) {
            $error = "All fields are required.";

        }
        else{
            TagModel::editTag($id,$tag_name);
                header("Location:categoryAdmin");
                exit();
        } 

    }

    public function deleteTag()
    {
        $id = $_GET['id'];

        TagModel::deleteTag($id);
        header("Location:categoryAdmin");
        exit();
    }

    
    
}
