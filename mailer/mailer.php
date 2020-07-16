<?php
if (isset($_POST) && ($_POST != "")){

    if ( (isset($_POST["name"])) && (isset($_POST["email"])) ){

        $para      = 'info@zenexoutdoor.com.uy';
        $titulo    = 'Contact Form';


        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $cabeceras .= 'From: Zenex Outdoor <info@zenexoutdoor.com.uy>' . "\r\n" .
            'Reply-To: '. $_POST["email"] . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $mensaje   = '<html><body style="background: #0066b3;padding:20px;">';
        $mensaje   .= '<br/><h1 style="color: #FFF;">Contacto:</h1>';
        $mensaje   .= '<br/><strong style="color: #FFF;">Nombre:</strong> ' . $_POST["name"];
        $mensaje   .= '<br/><strong style="color: #FFF;">Email:</strong> ' . $_POST["email"];
		if(isset($_POST["comments"]) && ($_POST["comments"] != "") ){
        $mensaje   .= '<br/><br/><strong style="color: #FFF;">Mensaje:</strong> ' . $_POST["comments"];
        }

        $mensaje   .= '<br/></div></body></html>';

        /*var_dump($mensaje);echo '<br/>';var_dump($cabeceras);die;*/

        //ENVIO
        $success = mail($para, $titulo, $mensaje, $cabeceras);

        if(($success == "true")){

            if(isset($_POST["backurl"])){

                $url = 'Location: ' . $_POST["backurl"].'?mail=1';
                header($url);

            }
           // echo "para: ".$para."t: ".$titulo. "mens: ".$mensaje." cab: ". $cabeceras;

        }else{
                echo 'ERROR EN EL ENVIO';
        }


    }else{
        echo "Por favor, rellene todos los campos necesarios.";
    }

}else{
    echo "Access Restricted";
}
?>
