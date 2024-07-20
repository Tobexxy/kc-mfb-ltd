<?php
parse_str($_POST['form_data'], $form);

define('TO_EMAIL', 'tobiogunleye533@gmail.com');
define('SUBJECT', 'Quera User Query');
define('FROM_EMAIL', $form['con_email']);

$MESSAGE = 'Hi Admin, <br/><br/>';
$MESSAGE .= 'You got an user query from Quera. User details and Message are noted bellow: <br/><br/>';
$MESSAGE .= 'Name : '.$form['con_name'].'<br/>';
$MESSAGE .= 'Email : '.$form['con_email'].'<br/>';
if(isset($form['con_subject']) && $form['con_subject'] != ''):
    $MESSAGE .= 'Subject : '.$form['con_subject'].'<br/>';
endif;
if(isset($form['con_location']) && $form['con_location'] != ''):
    $MESSAGE .= 'Laction : '.$form['con_location'].'<br/>';
endif;
if(isset($form['con_date']) && $form['con_date'] != ''):
    $MESSAGE .= 'Date : '.$form['con_date'].'<br/>';
endif;
if(isset($form['con_time']) && $form['con_time'] != ''):
    $MESSAGE .= 'Time : '.$form['con_time'].'<br/>';
endif;
if(isset($form['subscribe']) && !empty($form['subscribe'])):
    $MESSAGE .= 'Agree : Yes<br/>';
endif;
$MESSAGE .= 'Message : <br/>'.$form['con_message'].'<br/><br/>';
$MESSAGE .= 'Regards';

$HEADERS = "MIME-Version: 1.0" . "\r\n";
$HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$HEADERS .= 'From: <'.FROM_EMAIL.'>' . "\r\n";

mail(TO_EMAIL, SUBJECT, $MESSAGE, $HEADERS);
echo 1;
exit();