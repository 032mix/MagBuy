<?php
//Include Error Handler
require_once '../../../utility/error_handler_dir_back.php';

//Autoload to require needed model files
function __autoload($className)
{
    $className = '..\\..\\..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
}

if (isset($_POST['submit'])) {
    $specification = new \model\SubcatSpecification();

    //Try to accomplish connection with the database
    try {

        $specDao = \model\database\SubcatSpecificationsDao::getInstance();

        $specification->setName(htmlentities($_POST['name']));
        $specification->setSubcategoryId(htmlentities($_POST['subcategory_id']));
        $specification->setId($_POST['spec_id']);


        $specDao->editSubcatSpec($specification);

        header("Location: ../../../view/admin/subcategory_specs/subcat_specs_view.php");


    } catch (PDOException $e) {
        $message = date("Y-m-d H:i:s") . " " . $_SERVER['SCRIPT_NAME'] . " $e\n";
        error_log($message, 3, '../../../errors.log');
        header("Location: ../../../view/error/error_500.php");
        die();
    }

} else {
    try {
        $specId = $_GET['ssid'];
        $subcatDao = \model\database\SubCategoriesDao::getInstance();
        $specDao = \model\database\SubcatSpecificationsDao::getInstance();
        $subcategories = $subcatDao->getAllSubCategories();
        $spec = $specDao->getSubcatSpecById($specId);
    } catch (PDOException $e) {
        $message = date("Y-m-d H:i:s") . " " . $_SERVER['SCRIPT_NAME'] . " $e\n";
        error_log($message, 3, '../../../errors.log');
        header("Location: ../../../view/error/error_500.php");
        die();
    }
}