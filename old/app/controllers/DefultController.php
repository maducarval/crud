<?php
class DefultController
{
    public function index()
    {
       header('Location: '. BASE_URL ."index.php/militar");
    }
}