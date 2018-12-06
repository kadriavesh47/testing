<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                // $config['upload_path']          = 'uploads/';
                // $config['allowed_types']        = 'gif|jpg|png|pdf|txt|xls|doc';
                // $config['max_size']             = 10000;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                // $this->load->library('upload', $config);

                // if ( ! $this->upload->do_upload('userfile'))
                // {
                //         $error = array('error' => $this->upload->display_errors());

                //         $this->load->view('upload_form', $error);
                // }
                // else
                // {
                //         $data = array('upload_data' => $this->upload->data());
                //         // print_r($data['upload_data']['file_name']);
                //         //return;
                //         $this->load->view('upload_success', $data);
                // }
                $data = array();
                if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
                    $filesCount = count($_FILES['userFiles']['name']);
                    for($i = 0; $i < $filesCount; $i++){
                        $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                        $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                        $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                        $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                        $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                        $uploadPath = 'uploads/files/';
                        $config['upload_path'] = $uploadPath;
                        $config['allowed_types'] = 'gif|jpg|png';
                        
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if($this->upload->do_upload('userFile')){
                            $fileData = $this->upload->data();
                            $uploadData[$i]['file_name'] = $fileData['file_name'];
                            $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                            $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                        }
                    }
                    
                    if(!empty($uploadData)){
                        //Insert file information into the database
                        $insert = $this->file->insert($uploadData);
                        $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                        $this->session->set_flashdata('statusMsg',$statusMsg);
                    }
                }
                //Get files data from database
                $data['files'] = $this->file->getRows();
                //Pass the files data to view
                $this->load->view('upload_files/index', $data);



        }

        function sendemail()
        {
                //$to_email = 'Kadriavesh47@gmail.com';
                $to_email = 'avesh@codeautomations.com';

                // $emailTo  = $to_email;
                // $realName = 'sdsdsdsdsd';
                // $subject = 'Group Email';
                // $htmlbody = 'wqwqwqwqwqwqwqw';

                // error_reporting(E_ALL);
                // //error_reporting(E_STRICT);
                // //date_default_timezone_set('America/Toronto');
                // require_once ('class.phpmailer.php');
                // require_once ('class.smtp.php');
                // //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

                // $mail = new PHPMailer();

                // $mail -> IsSMTP();
                // // telling the class to use SMTP
                // $mail -> Host = "mail.yourdomain.com";
                // // SMTP server
                // $mail -> SMTPDebug = 1;
                // // enables SMTP debug information (for testing)
                // // 1 = errors and messages
                // // 2 = messages only
                // $mail -> SMTPAuth = true;
                // // enable SMTP authentication
                // $mail -> SMTPSecure = "ssl";

                // // sets the prefix to the servier
                // $mail -> Host = "smtp.gmail.com";
                
                // // sets GMAIL as the SMTP server
                // $mail -> Port = 465;
                // // set the SMTP port for the GMAIL server
                // $mail -> Username = 'kadriavesh47@gmail.com';       

                // $mail -> Password = '';

                // $mail -> SetFrom('kadriavesh47@gmail.com', 'Khidmat');

                // $mail -> AddReplyTo('kadriavesh47@gmail.com', 'Khidmat');
                // $mail -> IsHTML(true);

                
                // $mail -> Subject = $subject;

                // //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

                // $mail -> Body = $htmlbody;
                // $address = $emailTo;
                // $mail -> AddAddress($address, $realName);

                // if (!$mail -> Send()) {
                //         //echo "Mailer Error: " . $mail -> ErrorInfo;
                // } else {
                //         //echo "Message sent!";
                // }

                // Configure email library
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                $config['smtp_port'] = 465;
                $config['smtp_user'] = 'kadriavesh47@gmail.com';
                $config['smtp_pass'] = '';

                // Load email library and passing configured values to email library
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");

                // Sender email address
                $this->email->from('kadriavesh47@gmail.com', 'TrippelMs');
                // Receiver email address
                $this->email->to('avesh@codeautomations.com');
                // Subject of email
                $this->email->subject('TrippelMs');
                // Message in email
                $this->email->message('TrippelMs');

                if ($this->email->send()) {
                $data['message_display'] = 'Email Successfully Send !';
                } else {
                $data['message_display'] =  '<p class="error_msg">Invalid Gmail Account or Password !</p>';
                }
                   //$this->load->view('view_form', $data);
                echo 'dsdsdsdsd';

        }

        function test_pdf()
        {
            $output = 'upload/test.pdf';
            $html_data = yearly_html('This Is est pdf file');
            // print_r($html_data); return;

            $path = $this->tcpdf_report($html_data, $output);
            print_r($path); return;
            echo $output;
        }

        function tcpdf_report($details,$output)
        {
            require('tcpdf/config/lang/eng.php');
            require('tcpdf/tcpdf.php');
    
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);   
     
            $this->lMargin = 5;
            $this->tMargin = 5;

            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
          
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('Helvetica', '', 10, '', true);
            
            $pdf->AddPage();

            $html = '';
            $pdf->writeHTML($details['page1'], true, false, true, false, '');
            $pdf->Output($output, 'F');

            // attachment = base_url+re;
            // window.open(attachment,'');
        }

        function sender()
        {
            $to = 'kadriavesh47@gmail.com';
            $from = 'info@codexworld.com';
            $from_name = 'CodexWorld';

            //attachment files path array
            //attachment files path array
            $files1 = 'http://lightofweb.com/email/application_form.pdf';
            $files2 = 'http://lightofweb.com/email/application_form.pdf';
            $files = array($files1,$files2);

            $subject = 'PHP Email with multiple attachments by CodexWorld'; 
            $html_content = '<h1>PHP Email with multiple attachments by CodexWorld</h1>
            <p><b>Total Attachments : </b>'.count($files).' attachments</p>';

            //call multi_attach_mail() function and pass the required arguments
            $this->multi_attach_mail($to,$subject,$html_content,$from,$from_name,$files);

            //print message after email sent
            echo $send_email?"<h1> Mail Sent</h1>":"<h1> Mail not SEND</h1>";
        }

        function multi_attach_mail($to, $subject, $message, $senderMail, $senderName, $files)
        {

            $from = $senderName." <".$senderMail.">"; 
            $headers = "From: $from";

            // boundary 
            $semi_rand = md5(time()); 
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

            // headers for attachment 
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

            // multipart boundary 
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 

            // preparing attachments
            if(count($files) > 0){
                for($i=0;$i<count($files);$i++){
                    if(is_file($files[$i])){
                        $message .= "--{$mime_boundary}\n";
                        $fp =    @fopen($files[$i],"rb");
                        $data =  @fread($fp,filesize($files[$i]));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $message .= "Content-Type: application/octet-stream; name=\"".basename($files[$i])."\"\n" . 
                        "Content-Description: ".basename($files[$i])."\n" .
                        "Content-Disposition: attachment;\n" . " filename=\"".basename($files[$i])."\"; size=".filesize($files[$i]).";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                }
            }
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $senderMail;
            
            //send email
            $mail = @mail($to, $subject, $message, $headers, $returnpath); 
            
            //function return true, if email sent, otherwise return fasle
            if($mail){ return TRUE; } else { return FALSE; }
        }


}
?>