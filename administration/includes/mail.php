<?php
    function sendMail($id, $message){
        $to      = 'earvin.mars@gmail.com';
        $subject = 'the subject';
        $message = 'hello';
        $headers = array(
            'From' => 'webmaster@example.com',
            'Reply-To' => 'webmaster@example.com',
            'X-Mailer' => 'PHP/' . phpversion()
        );

        mail($to, $subject, $message, $headers);

    }
?>