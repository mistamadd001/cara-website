<?php
    $field_name = $_POST['name'];
    $field_email = $_POST['email'];
    $field_phone = $_POST['phone'];
    $field_message = $_POST['message'];
    
    $mail_to = 'mistamadd001@gmail.com';
    
    $subject = 'Contact form submission from ' . $field_name;
    
    $body_message = 'From: '.$field_name."\n";
    $body_message .= 'E-mail: '.$field_email."\n";
    $body_message .= 'Phone: '.$field_phone.'\n';
    $body_message .= 'Message: '.$field_message;
    
    $headers = "From: $field_email\r\n";
    $headers .= "Reply-To: $field_email\r\n";
    
    $mail_status = mail($mail_to, $subject, $body_message, $headers);
    
    if ($mail_status) { ?>
        <script language="javascript" type="text/javascript">
            // Print a message
            alert('Thank you for the message. We will contact you shortly.');
            // Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
            window.location = '../contact.html';
        </script>
    <?php
    }else { ?>
        <script language="javascript" type="text/javascript">
            // Print a message
            alert('Message failed. Please, send an email to mistamadd001@gmail.com')
            // Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
            window.location = 'contact.html';
        </script>
    <?php
    }?>
?>