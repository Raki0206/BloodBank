<?php
session_start();

include "./config/database.php";
include "./config/mail_credentials.php";

if (isset($_SESSION['EXPIRY']) && (time() - $_SESSION['EXPIRY']) > 30) {
    session_unset();
}

if (isset($_SESSION['closing_time']) && time() >= $_SESSION['closing_time']) {
    $_SESSION["set_timer"] = false;
}

//variables declaration for msg and error messages
$reg_no = '';
$email = '';
$name = '';
$otp = '';
$opted_result = '';
$invalid_reg_err = '';
$invalid_opted_result = '';
$invalid_otp_err = '';
$otp_sent = '';

// if user reg no is not found in the semester result table
if (isset($_SESSION['invalid']) && $_SESSION['invalid'] === true) {
    $_SESSION['invalid'] = false;
    echo "<script>
                    alert('Your Register Number is not registered for " .  $_SESSION['opted_result']  . " examination. Try choosing the correct examination result.');
                    localStorage.removeItem('timer');
         </script>
            ";
    session_unset();
    session_destroy();
}

if (isset($_SESSION['invalid']) && $_SESSION['invalid'] === false) {
    session_unset();
}

// to send OTP
if (isset($_POST["send_otp"])) {

    // storing the register number
    $reg_no = filter_input(INPUT_POST, 'reg_no', FILTER_SANITIZE_SPECIAL_CHARS);
    $opted_result = filter_input(
        INPUT_POST,
        'examination',
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    // getting the corressponding email from DB for the reg no
    $get_email = "SELECT `email`,`name` FROM `u_students` WHERE `regno` = ? LIMIT 1";
    $stmt = $pdo->prepare($get_email);
    $stmt->execute([$reg_no]);
    $result = $stmt->fetch();

    // if reg. number is found in the DB
    if (!empty($result)) {
        if (!empty($opted_result)) {
            $_SESSION['set_timer'] = true;
            $name = $result->name;
            $email = $result->email;

            // otp validation through email
            $otp = random_int(1111111111, 9999999999);;

            // using the PHPMailer module to send Email
            require 'PHPMailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            // $mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASSWORD;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(EMAIL, 'Puducherry Technological University');
            $mail->addAddress($email);     // Add a recipient

            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Verification OTP';
            $mail->Body    = 'Your OTP Verification code is:  <b>' . $otp . '</b>';
            $mail->AltBody = 'Your OTP Verification code is: ' . $otp;

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                $otp_sent = '';
            } else {
            }

            $otp_sent = "OTP sent to your registered email.";

            //session variables
            $_SESSION['otp_sent'] = $otp_sent;
            $_SESSION['otp'] = $otp;
            $_SESSION['reg_no'] = $reg_no;
            $_SESSION['opted_result'] = $opted_result;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['invalid_otp_err'] = '';
            $_SESSION['invalid_reg_err'] = '';
            $_SESSION['invalid_option_result_err'] = '';
            $_SESSION['current_time'] = time();
            $_SESSION['closing_time'] = $_SESSION['current_time'] + 30;
            $_SESSION['set_timer'] = true;
        } else {
            $invalid_opted_result = '*required';
            $_SESSION['invalid_option_result_err'] = $invalid_opted_result;
            $_SESSION['reg_no'] = $reg_no;
            unset($_SESSION['invalid_reg_err']);
        }
    }
    //if reg no is not found in the DB
    else {
        // handle wrong input
        if (empty($opted_result)) {
            $invalid_opted_result = "*required";
            $_SESSION['invalid_option_result_err'] = $invalid_opted_result;
        } else {
            unset($_SESSION['invalid_option_result_err']);
            $_SESSION['opted_result'] = $opted_result;
        }
        $invalid_reg_err = "*Invalid register number";
        $_SESSION['invalid_reg_err'] = $invalid_reg_err;
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    return;
}

//when user submits the get Result btn
if (isset($_POST["submit"])) {
    $user_otp = filter_input(INPUT_POST, 'otp', FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($_SESSION['otp'])) {
        if (intval($user_otp) === $_SESSION['otp']) {
            $_SESSION['EXPIRY'] = time();
            $_SESSION['invalid'] = false;
            header("Location: show_results.php");
            return;
        } else {
            unset($_SESSION['otp_sent']);
            $_SESSION['invalid_otp_err'] = '*Invalid OTP';
            header("Location: " . $_SERVER['PHP_SELF']);
            return;
        }
    } else {
        $_SESSION['invalid_otp_err'] = '*Invalid OTP';
        header("Location: " . $_SERVER['PHP_SELF']);
        return;
    }
}

//list of published results in the DB
$list_of_published_results = array();
$query = "SELECT table_name, create_time FROM information_schema.tables WHERE table_schema LIKE '" . $dbname . "'AND table_name LIKE '%semester%' ORDER BY create_time DESC;";
$resultSet = $pdo->query($query);
$rows = $resultSet->fetchAll();
foreach ($rows as $key => $value) {
    $result = $value->table_name;
    array_push($list_of_published_results, strtoupper($result));
}

$latest_results = array_slice($list_of_published_results, 0, 2)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puducherry Technological University</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,500&display=swap" rel="stylesheet">

</head>

<body>
    <?php if (!empty($latest_results)) : ?>
        <div id="scroll-container">
            <div id="scroll-text">
                <p class="latest_results">Latest results</p>
                <?php foreach ($latest_results as $result) {
                    echo "<p>" . $result . "</p>";
                } ?>
            </div>
        </div>
    <?php endif ?>
    <div class="container">
        <header>
            <div class="main-header">
                <a href="https://www.ptuniv.edu.in/" target="_blank" rel="noopener noreferrer"><img id="ptu-logo" src="https://ptuniv.edu.in/images/ptu-logo.png" alt="ptu-logo" class="ptu-logo"></a>
                <div class="section-text">
                    <h1>Puducherry Technological University<h1>
                            <h2>Controller of Examinations</h2>
                </div>
            </div>
        </header>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div>
                <label for="reg-value">
                    Register Number:
                </label>
                <input type="text" id="reg-value" name="reg_no" value="<?php isset($_SESSION['reg_no']) ? print $_SESSION['reg_no'] : '' ?>">
                <?php if (isset($_SESSION['invalid_reg_err'])) : ?>
                    <p style="color:red; font-size: small; margin-top: 2px;"><?php echo $_SESSION['invalid_reg_err'] ?></p>
                <?php endif ?>
            </div>
            <div>
                <label for="examination">Choose an examination: </label>
                <select name="examination" id="examination">
                    <option class="option" value="" selected>--Please choose an option--</option>

                    <?php foreach ($list_of_published_results as $result) : ?>
                        <option class="option" value="<?php echo $result ?>" <?php if (isset($_SESSION['opted_result'])) {
                                                                                    ($_SESSION['opted_result'] === $result) ? print " selected" : '';
                                                                                }
                                                                                ?>><?php echo $result ?></option>
                    <?php endforeach ?>
                </select>
                <?php if (isset($_SESSION['invalid_option_result_err'])) : ?>
                    <p style="color:red; font-size: small; margin-top: 2px;"><?php echo $_SESSION['invalid_option_result_err'] ?></p>
                <?php endif ?>
            </div>
            <div>
                <label for="otp-value">OTP:</label>
                <input type="number" id="otp-value" name="otp" maxlength="6" value="" placeholder="Your OTP">
                <input type="submit" name="send_otp" id="send_otp" value="SEND OTP" <?php (isset($_SESSION['set_timer']) && $_SESSION['set_timer'] === true) ? print "disabled" : null;
                                                                                    ?>>
                <?php if (isset($_SESSION['otp_sent'])) : ?>
                    <p style="color:#5cb85c	; font-weight: bold; font-size: 1rem; margin-top: 2px;"><?php print $_SESSION['otp_sent'] ?></p>
                <?php endif ?>
                <?php if (isset($_SESSION['invalid_otp_err'])) : ?>
                    <p style="color:red; font-size: small; margin-top: 2px;"><?php echo $_SESSION['invalid_otp_err'] ?></p>
                <?php endif ?>
            </div>

            <input class="submit-btn" type="submit" name="submit" value="Get Results">

        </form>
    </div>
    <p class="info"><b class="info-icon">&#9432;</b>For any discrepancies mail at <b>coe@ptuniv.edu.in
        </b></p>
    <p class="info-icon-mobile">&#9432;</p>
    <script>
        //otp timer function inmplemented in js
        (function(window, document, undefined) {

                //for info
                const infoBtn = document.querySelector(".info");
                const infoBtnMobile = document.querySelector(".info-icon-mobile");
                infoBtnMobile.addEventListener("click", () => {
                    infoBtnMobile.style.display = "none";
                    infoBtn.style.display = "block";
                })

                const otpBtn = document.getElementById("send_otp");

                window.onload = function refresh() {
                    let otpTimer = localStorage.getItem("timer") || 30;
                    if (otpBtn.hasAttribute("disabled")) {
                        countdown(otpTimer);
                    }
                };

                function countdown(otpTimer) {
                    let val;
                    if (otpTimer < 10) {
                        val = 0 + '' + otpTimer;
                    } else {
                        val = '' + otpTimer
                    }
                    let time_limit_var = "00:" + val;
                    otpBtn.setAttribute("value", time_limit_var)
                    otpTimer--;
                    let timer = setInterval(() => {
                        if (otpTimer <= 1) {

                            otpBtn.removeAttribute("disabled");
                            localStorage.removeItem("timer");
                            otpBtn.setAttribute("value", "SEND OTP")
                            clearInterval(timer);
                        } else {
                            if (otpTimer < 10) {
                                val = 0 + '' + otpTimer;
                            } else {
                                val = '' + otpTimer
                            }
                            time_limit_var = "00:" + val;
                            otpBtn.setAttribute("value", time_limit_var)
                            otpTimer -= 1;
                            localStorage.setItem("timer", otpTimer)
                        }
                    }, 1000);
                }
            }

        )(window, document, undefined);
    </script>
</body>

</html>