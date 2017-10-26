<?php

//Autoload to require needed model files
function __autoload($className)
{
    $className = '..\\..\\..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
}

if (isset($_POST['submit'])) {
    $category = new \model\Category();

    //Try to accomplish connection with the database
    try {

        $catDao = \model\database\CategoriesDao::getInstance();

        $category->setName(htmlentities($_POST['name']));
        $category->setSupercategoryId(htmlentities($_POST['supercategory_id']));


        $id = $catDao->createCategory($category);

        header("Location: ../../../view/admin/categories/categories_view.php");


    } catch (PDOException $e) {
        header("Location: ../../view/error/pdo_error.php");
        die();
    }

} else {
    try {
        $supercatDao = \model\database\SuperCategoriesDao::getInstance();
        $supercategories = $supercatDao->getAllSuperCategories();
    } catch (PDOException $e) {

        header("Location: ../../view/error/pdo_error.php");
    }
}