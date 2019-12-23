<html>
 <head>
  <title>PHP Deserialization Vuln Test</title>
 </head>
 <body>
   <?php

        // OWASP Contact
        class Contact{
          function __construct(){
              $this->name = $_REQUEST['name'];
              $this->agree = $_REQUEST['terms'];
          }
        };

        // Unrelated, but part of the codebase
        class NeatSecretClass{
            private $error_text = "Oops! Something went wrong.";
            private $filename = "/tmp/bugbashlog.txt";

            public function __destruct(){
                file_put_contents($this->filename, $this->error_text);
            }
        };

        $html = "";
        if( isset($_COOKIE['contact'])){
            	$html = "Welcome back!</br>";
            	$firstcontact = unserialize($_COOKIE["contact"]);
            	$html .= $firstcontact->name;
          }

        if( isset( $_POST[ 'submit' ]  ) ) {
          echo "<H2>Booyah!</H2>";
          $firstcontact = new Contact();
          $passfirstcontact = serialize($firstcontact);
        if(!$_COOKIE['contact']){
          setcookie('contact',$passfirstcontact);
        }

        };
    ?>
   <div class="container">
     <h3>OKC Bug Bash</h3>
     <form method="POST">
       <table>
         <tr>
           <td>Name: </td><td><input type = "text" name = "name"></td>
         </tr>
         <tr>
           <td>Agree </td><td><input type = "checkbox" name = "terms"></td>
         </tr>
         <tr>
           <td><input type = "submit" name = "submit" value = "Submit"></td>
         </tr>

    </table>
    <?php echo $html;?>
     </form>

    </div>
 </body>
</html>
