<!--SAMPLE CODE
This is a sample page that sends a single recipient sms send request to the client-->
<?php
require '../client/client.php';

if (count($_POST) > 0) {
    $recipients = array($_POST['recipient']);
    $message = $_POST['message'];
    $smsrequest = cytawebsms_create_request($recipients, $message);
}
?>
<html>
    <head>
        <title>Send SMS using the Cyta Web SMS Api Client - Sample</title>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

            * {
                margin:0;
                padding:0;
                box-sizing:border-box;
                -webkit-box-sizing:border-box;
                -moz-box-sizing:border-box;
                -webkit-font-smoothing:antialiased;
                -moz-font-smoothing:antialiased;
                -o-font-smoothing:antialiased;
                font-smoothing:antialiased;
                text-rendering:optimizeLegibility;
            }

            body {
                font-family:"Open Sans", Helvetica, Arial, sans-serif;
                font-weight:300;
                font-size: 12px;
                line-height:30px;
                color:#777;
                background:#87b858;
            }

            .container {
                max-width:400px;
                width:100%;
                margin:0 auto;
                position:relative;
            }

            #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] {
                font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif;
            }

            #contact {
                background:#F9F9F9;
                padding:25px;
                margin:50px 0;
            }

            #contact h3 {
                color: #f1ad2f;
                display: block;
                font-size: 30px;
                font-weight: 400;
            }

            #contact h4 {
                margin:5px 0 15px;
                display:block;
                font-size:13px;
            }

            fieldset {
                border: medium none !important;
                margin: 0 0 10px;
                min-width: 100%;
                padding: 0;
                width: 100%;
            }

            #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
                width:100%;
                border:1px solid #CCC;
                background:#FFF;
                margin:0 0 5px;
                padding:10px;
            }

            #contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
                -webkit-transition:border-color 0.3s ease-in-out;
                -moz-transition:border-color 0.3s ease-in-out;
                transition:border-color 0.3s ease-in-out;
                border:1px solid #AAA;
            }

            #contact textarea {
                height:100px;
                max-width:100%;
                resize:none;
            }

            #contact button[type="submit"] {
                cursor:pointer;
                width:100%;
                border:none;
                background:#498436;
                color:#FFF;
                margin:0 0 5px;
                padding:10px;
                font-size:15px;
            }

            #contact button[type="submit"]:hover {
                background:#585a6f;
                -webkit-transition:background 0.3s ease-in-out;
                -moz-transition:background 0.3s ease-in-out;
                transition:background-color 0.3s ease-in-out;
            }

            #contact button[type="submit"]:active {
                box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5);
            }

            #contact input:focus, #contact textarea:focus {
                outline:0;
                border:1px solid #999;
            }
            ::-webkit-input-placeholder {
                color:#888;
            }
            :-moz-placeholder {
                color:#888;
            }
            ::-moz-placeholder {
                color:#888;
            }
            :-ms-input-placeholder {
                color:#888;
            }
        </style>
    </head>
    <body>
        <div class="container">  
            <form id="contact" action="" method="post">
                <h3>Send SMS</h3>
                <h4>Sample interface to send SMS using the Cyta Web SMS Api Client</h4>
                <?php
                    if (isset($smsrequest) && $smsrequest['status_code'] == '0') {
                        echo '<font color="green">'. $smsrequest['status_message'] . ' | LOT: ' . $smsrequest['lot'] . '</font>';
                    } else if (isset($smsrequest)) {
                        echo '<font color="red">'.$smsrequest['status_message'] . ' (Err' . $smsrequest['status_code'] . ')</font>';
                    }
                ?>
                <fieldset>
                    <input placeholder="Recipient Phone Number (9XXXXXXX)" name="recipient" type="tel" tabindex="3" required>
                </fieldset>
                <fieldset>
                    <textarea placeholder="Type your Message Here...." name="message" tabindex="5" required></textarea>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Send</button>
                </fieldset>
            </form>
        </div>
    </body>
</html>