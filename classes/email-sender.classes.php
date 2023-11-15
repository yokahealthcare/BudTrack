<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
class EmailSender extends Dbh {
    private $mail;
    private $email;

    public function __construct($input_email) {
        // define the private variable
        $this->mail = new PHPMailer(true);
        // Server settings
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port       = 465;
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Your Gmail credentials
        $this->mail->Username   = 'erwinwingyonata@gmail.com';
        $this->mail->Password   = 'qleltgvmdoaweefv';

        // Sender and recipient settings
        $this->mail->setFrom('erwinwingyonata@gmail.com', 'Erwin Yonata');

        $this->email = $input_email;
    }

    public function send_email_verification($uid, $name, $username) {
        try {
            // email address - who to send
            $this->mail->addAddress($this->email, $name);
            // email content
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Verification for username ' . $username;
            $this->mail->Body    = "
                <!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <meta charset=\"UTF-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <title>Email Body</title>
                </head>
                <body>
                    <p>Hi <?php echo $name; ?>,</p>
                    <p>Thank you for registering. To verify your email, please click the following link:</p>
                    <p><a href=\"http://127.0.0.1/budtrack/include/verified-account.inc.php?uid=".$uid."\">Click this</a></p>
                </body>
                </html>
            ";

            // Send the email
            $this->mail->send();
            echo 'Email sent successfully';
        } catch (Exception $e) {
            echo "Error: {$this->mail->ErrorInfo}";
        }
    }

    public function send_email_reset_password() {
        if(!$this->check_email($this->email)) {
            header("Location: ../forgot-password.php?error=email-not-founded");
            exit();
        }

        try {
            // email address - who to send
            $this->mail->addAddress($this->email, "Forgot Password");
            // Email content
            $this->mail->isHTML(true);
            $this->mail->Subject = 'BudTrack - Request for reset password ';
            $this->mail->Body    = "
                <!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <meta charset=\"UTF-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <title>Email Body</title>
                </head>
                <body>
                    <p>Hi <?php echo $this->email; ?>,</p>
                    <p>Our system receive forgot password notification, you can reset your password by clicking url below:</p>
                    <p><a href=\"http://127.0.0.1/budtrack/new-password.php?uid=".$this->get_user_id_from_email($this->email)."\">Click this</a></p>
                </body>
                </html>
            ";

            // Send the email
            $this->mail->send();
            echo 'Email sent successfully';
        } catch (Exception $e) {
            echo "Error: {$this->mail->ErrorInfo}";
        }
    }
    
    public function check_email($email) {
        // Query to select the 'email' column for the provided email
        $stmt = $this->connect()->prepare("SELECT email FROM account WHERE email = ?;");

        // Execute the query
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../forgot-password.php?error=stmtfailed");
            exit();
        }

        // checking for email registered on database or not
        if($stmt->rowCount() == 0)
            return false;
        return true;
    }

    public function get_user_id_from_email($email) {
        // Query to select the 'uid' column for the provided email
        $stmt = $this->connect()->prepare("SELECT uid FROM account WHERE email = ?;");

        // Execute the query
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: ../forgot-password.php?error=stmtfailed");
            exit();
        }

        // Fetch the 'uid' column value
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // get uid from database
        return $result['uid'];
    }
}







