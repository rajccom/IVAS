<?php 
  require("ajax/src/PHPMailer.php");
  require("ajax/src/SMTP.php");
  require("ajax/src/Exception.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

 if(isset($_POST['submit']))
  {
     include "database.php";
     
     $sname = strip_tags(addslashes($_POST['name']));
     $phone = strip_tags(addslashes($_POST['phone']));
     $email = strip_tags(addslashes($_POST['email']));
     $city = strip_tags(addslashes($_POST['city']));
	 
	  $msg = "";
	  
mysqli_query($conn, "INSERT INTO staging_contact(sname, phone, email, city) VALUES('" . $_POST['sname'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','" . $_POST['city'] . "')");

//echo "hello";exit;

try {

		$ntoken = time();
		$mail = new PHPMailer(true);
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = "smtp.rahejaparkwest.com";
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'ssl';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "admin@rahejaparkwest.com";
        //Password to use for SMTP authentication
        $mail->Password = "&78qgy2W";

        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );



        /*
        ########################################
        ╔═╗┌┬┐┌─┐┬┬
        ║╣ │││├─┤││  - Settings  Ends here
        ╚═╝┴ ┴┴ ┴┴┴─┘
        ########################################
        */
        //$getemail = $to;$getname=$name;$message = $mge;
        //Set who the message is to be sent from

        $mail->setFrom("admin@rahejaparkwest.com", "Contact | raheja ");
        //Set an alternative reply-to address
        //$mail->addBCC("raj.ccomdigital@gmail.com","raj");

        //$mail->addAddress("raj.ccomdigital@gmail.com", "raj");
		//$mail->addAddress("neha.ccomdigital@gmail.com", "neha");
	    //$mail->addAddress("admin@rahejaparkwest.com", "Contact | raheja");
		$mail->addAddress($email, $sname);

        //Set the subject line
        $mail->Subject = 'Thank You for contacting us | '.$sname.' ' ;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body


        $mail->Body    = '<div style=" width:94%; max-width:800px; margin:0 auto; border:1px solid #efefef;">
      <div style=" width:90%; padding:10px 5%; background:#000; text-align:left;"><img src="https://rahejaparkwest.com/images/logo.png" style="width: "></div>
      <div style="font-size:13px; color:#000; text-align:left; line-height:20px; background:#fff; width: 90%; padding:5%; font-family:Arial, Helvetica, sans-serif;">
  		<p>Thank you for taking the time to fill out the form. We value your interest in our property. Please find attached a brochure with all property details. Our team will get in touch with you shortly to understand your requirements.</p>
		
   </div>
 </div>';
					
        //Replace the plain text body with one created manually
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
		//$mail->addAttachment('../staging/images/Raheja_Brochure.pdf');
		//echo '<pre>';print_r($mail);exit;
        //send the message, check for errors
		
	   
        if ($mail->send()) {
        $send = new PHPMailer(true);
        $send->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $send->SMTPDebug = 2;
        //Ask for HTML-friendly debug output
        $send->Debugoutput = 'html';
        //Set the hostname of the mail server
        $send->Host = "smtp.rahejaparkwest.com";
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $send->Port = 465;
        //Set the encryption system to use - ssl (deprecated) or tls
        $send->SMTPSecure = 'ssl';
        //Whether to use SMTP authentication
        $send->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $send->Username = "admin@rahejaparkwest.com";
        //Password to use for SMTP authentication
        $send->Password = "&78qgy2W";

        $send->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );



        /*
        ########################################
        ╔═╗┌┬┐┌─┐┬┬
        ║╣ │││├─┤││  - Settings  Ends here
        ╚═╝┴ ┴┴ ┴┴┴─┘
        ########################################
        */
        //$getemail = $to;$getname=$name;$message = $mge;
        //Set who the message is to be sent from

        $send->setFrom("admin@rahejaparkwest.com", "Contact | raheja ");
        //Set an alternative reply-to address
        //$mail->addBCC("raj.ccomdigital@gmail.com","raj");

        $send->addAddress("raj.ccomdigital@gmail.com", "raj");
		$send->addAddress("neha.ccomdigital@gmail.com", "neha");
	    //$mail->addAddress("admin@rahejaparkwest.com", "Contact | raheja");
		//$mail->addAddress($email, $name);

        //Set the subject line
        $send->Subject = 'New Lead from Enquiry Form | Admin ' ;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body


        $send->Body    = '<div style=" width:94%; max-width:800px; margin:0 auto; border:1px solid #efefef;">
      <div style=" width:90%; padding:10px 5%; background:#000; text-align:left;"><img src="https://rahejaparkwest.com/images/logo.png" style="width: "></div>
      <div style="font-size:13px; color:#000; text-align:left; line-height:20px; background:#fff; width: 90%; padding:5%; font-family:Arial, Helvetica, sans-serif;">
  		<p>Leads of Enquiry Form</p>
      <br />
      <h2>Enquiry Details</h2>
      <br />
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="300">Name</td>
            <td>'.$sname.'</td>
          </tr>
		  <tr>
            <td width="300">Phone </td>
            <td>'.$phone.'</td>
          </tr>
          <tr>
            <td width="300">Email Id</td>
            <td>'.$email.'</td>
          </tr>
          <tr>
            <td width="300">Floor Plan</td>
            <td>'.$city.'</td>
          </tr>
        </tbody>
      </table>

      </div>
      </div>';
					
        //Replace the plain text body with one created manually
        $send->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
		//$mail->addAttachment('../staging/images/Raheja_Brochure.pdf');
		//echo '<pre>';print_r($mail);exit;
        //send the message, check for errors

         if (!$send->send()) {

            //echo "Mailer Error: " . $mail->ErrorInfo;
            $data = array('logged'=>false,'mg'=>'Not sent','othermg'=>"Mailer Error: " . $send->ErrorInfo,'token' => $ntoken);
        } else {
            header("Location:thank-you");
			 //$data = array('logged'=>true,'mg'=>'Sent','token' => $ntoken);
        }
        } //else {
			//echo "Mailer Error: " . $send->ErrorInfo;
		//}
        
    }
    catch (Exception $e) {
        $data = array("logged" => false, 'message' => $e,);
    }
	echo '<pre>';print_r($data);exit;
    //echo json_encode($data,true);exit;
	}
?>