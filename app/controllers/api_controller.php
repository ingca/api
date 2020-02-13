<?php

class ApiController extends AppController
{
    var $name = 'Api';

    var $uses = array('BusinessCategories','BusinessPackages','BusinessDescription','BusinessServices','BusinessEvents','BusinessReviews');

    var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Session');

    var $components = array('RequestHandler', 'Session', 'Email', 'Cookie');

    function beforeFilter()
    {
        $this->layout = 'json';
    }

    function json_response($data)
    {
        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
        header('Content-Type: application/json');
        echo json_encode($data);
    }
   /**
    Table description
     */
/*Agregado bi_description_getall el 13/02/2020 por Carlos*/
    function bi_description_getall()
    {
        try {
            $data = $this->BusinessDescription->find('all');

            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*Agregado bi_description_get_id el 13/02/2020 por Carlos*/
    function bi_description_get_id($id)
    {
        try {
            $data = $this->BusinessDescription->findById($id);
            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*Agregado bi_description_create el 13/02/2020 por Carlos*/
    function bi_description_create()
    {
        try {
           
            $_POST = json_decode(file_get_contents('php://input'), true);
            
            if (!empty($_POST)) {
                $name = $_POST['name'];
                //var_dump($_POST); die();
                $description = $_POST['description'];
                $latitude = $_POST['latitude'];
                $length = $_POST['length'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $web_site = $_POST['web_site'];
                $image_banner = $_POST['image_banner'];
                $image_business = $_POST['image_business'];
                $location = $_POST['location'];
                $Features = $_POST['Features'];
                $Amenities = $_POST['Amenities'];
                $description_card = $_POST['description_card'];
                $business_category_id = $_POST['business_category_id'];
                $business_packages_id = $_POST['business_packages_id'];
                $response = $this->BusinessDescription->query(
                    "INSERT INTO business_description VALUES(default, '$name',' $description','$latitude','$length','$phone','$email','$web_site',
                    '$image_banner','$image_business','$location','$Features','$Amenities','$description_card',
                    '$business_category_id','$business_packages_id')");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

/*Agregado bi_description_update el 13/02/2020 por Carlos*/
    function bi_description_update($id)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $latitude = $_POST['latitude'];
                $length = $_POST['length'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $web_site = $_POST['web_site'];
                $image_banner = $_POST['image_banner'];
                $image_business = $_POST['image_business'];
                $location = $_POST['location'];
                $Features = $_POST['Features'];
                $Amenities = $_POST['Amenities'];
                $description_card = $_POST['description_card'];
                $business_category_id = $_POST['business_category_id'];
                $business_packages_id = $_POST['business_packages_id'];
                $response = $this->BusinessDescription->query(
                    "Update business_description SET name='$name', description='$description' , latitude='$latitude' , length='$length' 
                    , phone='$phone', email='$email', web_site='$web_site', image_banner='$image_banner', image_business='$image_business'
                    , location='$location', Features='$Features', Amenities='$Amenities', description_card='$description_card'
                    , business_category_id='$business_category_id', business_packages_id='$business_packages_id'
                    WHERE id=$id ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha actualizado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*Agregado bi_description_delete el 13/02/2020 por Carlos*/
    function bi_description_delete($id = null)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($id)) {

                $response = $this->BusinessDescription->query(
                    "Delete From business_description WHERE id = '$id' ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Recurso eliminado correctamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
/*Agregado bi_description_delete el 13/02/2020 por Carlos*/
    function bi_description_search($search = null)
    {

        if (!empty($search)) {
            $condition = "'%" . $search . "%'";
            $description = $this->BusinessDescription->query("SELECT * FROM business_description WHERE name LIKE $condition limit 5");
            $this->json_response($description);
        } else {
            $description = $this->BusinessDescription->find('all');
            $this->json_response($description);
        }
    }
    /**
    Table categories
     */

    function bi_categories_getall()
    {
        try {
            $data = $this->BusinessCategories->find('all');

            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_get_id($id)
    {
        try {
            $data = $this->BusinessCategories->findById($id);
            if ($data != false){
                $this->json_response($data);
            }else{
                $this->json_response($msj['msg'] = "No se encontro el recurso");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_create()
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "INSERT INTO business_category  VALUES(default, '$name')");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_update($id)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($_POST)) {
                $name = $_POST['name'];
                $response = $this->BusinessCategories->query(
                    "Update business_category SET name='$name' WHERE id=$id ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Se ha creado satisfactoriamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_delete($id = null)
    {
        try {
            $_POST = json_decode(file_get_contents('php://input'), true);
            if (!empty($id)) {

                $response = $this->BusinessCategories->query(
                    "Delete From business_category WHERE id = '$id' ");
                if ($response != false) {
                    $this->json_response($msj['msg'] = "Recurso eliminado correctamente");
                } else {
                    $this->json_response($msj['msg'] = "error");
                }
            } else {
                $this->json_response($msj['msg'] = "error");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function bi_categories_search($search = null)
    {

        if (!empty($search)) {
            $condition = "'%" . $search . "%'";
            $categories = $this->BusinessCategories->query("SELECT * FROM business_category WHERE name LIKE $condition limit 5");
            $this->json_response($categories);
        } else {
            $categories = $this->BusinessCategories->find('all');
            $this->json_response($categories);
        }
    }



}

?>