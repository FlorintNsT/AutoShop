<?php 

AdminController::startAdminController();

class AdminController{
    public static function startAdminController(){
        include 'AdminView.php';
        AdminView::showAdminView();
    }
}

?>