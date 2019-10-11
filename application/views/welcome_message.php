<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rest Server Raw</title>

    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #FFF;
            margin: 40px;
            font: 16px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
            word-wrap: break-word;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 24px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 16px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 16px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
</head>

<body>

    <div id="container">
        <h1>Rest-Server By Ridwan Maulana Tanjung</h1>

        <div id="body">

            <h2><a href="<?php echo site_url('rest-server'); ?>">REST Server Tests</a></h2>

            <?php if (file_exists(FCPATH . 'documentation/index.html')) : ?>
                <h2><a href="<?php echo base_url('documentation/index.html'); ?>" target="_blank">REST Server Documentation</a></h2>
            <?php endif ?>

            <p>You will never see a good UI here, this website creation is intended only for the backend feature which is a rest-server</p>

            <p>If you would like to edit this page you'll find it located at:</p>
            <code>application/views/welcome_message.php</code>

            <p>The corresponding controller for this page is found at:</p>
            <code>application/controllers/Welcome.php</code>
        </div>

        <p class="footer">Made Using <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?> and <a href="https://github.com/chriskacerguis/codeigniter-restserver"> chriskacerguis</a> Rest-server Library</p>
    </div>

</body>

</html>