<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use CodeIgniter\Controller;

/**
 * Description of Welcome
 *
 * @author rakes
 */
class Welcome extends Controller {
    //put your code here
    
    public function test($name) {
        echo "Welcome to test ".$name;
    }
    public function index() {
        echo "Welcome to CI4";
        // $this->load->view('blogview');
    }
}
?>

<!-- //http://localhost/myci4/public/index.php/welcome
//http://localhost/myci4/public/index.php/welcome/test/ci4 -->
