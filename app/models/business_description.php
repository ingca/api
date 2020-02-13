<?php
class BusinessDescription extends AppModel {

    var $name = 'BusinessDescription';
    /* Agregado por Charly el 13/02/2020*/
    var $description = 'BusinessDescription';
    var $latitude = 'BusinessDescription';
    var $length = 'BusinessDescription';
    var $phone = 'BusinessDescription';
    var $email = 'BusinessDescription';
    var $web_site = 'BusinessDescription';
    var $image_banner = 'BusinessDescription';
    var $image_business = 'BusinessDescription';
    var $location = 'BusinessDescription';
    var $Features = 'BusinessDescription';
    var $Amenities = 'BusinessDescription';
    var $description_card = 'BusinessDescription';
    var $business_category_id = 'BusinessDescription';
    var $business_packages_id = 'BusinessDescription';
/* termina agregado*/
    var $useTable = 'business_description';

    var $primaryKey = 'id';

    var $belongsTo = array(
        'BusinessCategories' => array(
            'className'	=> 'BusinessCategories',
            'foreignKey' => 'business_category_id'
        ),
           'BusinessPackages' => array(
            'className'	=> 'BusinessPackages',
            'foreignKey' => 'business_packages_id'
        )
    );



}

?>
