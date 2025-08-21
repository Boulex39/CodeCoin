<?php
class ControllerPage {
    public function homePage(){
        $modelAnnonce = new ModelAnnonce();
        $annonces = $modelAnnonce->getAnnonces();
        require __DIR__ . '/../views/page/homepage.php';
    }
}