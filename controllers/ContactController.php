<?php

require_once 'AppController.php';

class ContactController extends AppController
{
    public function contact()
    {
        return $this->render('contact');
    }
}