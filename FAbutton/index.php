<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floating Action Button</title>
    <link rel="stylesheet" href="FAbutton/css/styles.css">
</head>
<body>
    <h1> </h1>

    <div class="fab-container">
        <a href="https://wa.me/+2348067022284">
            <div class="fab fab-icon-holder" id="menuList">
                <img src="FAbutton/icons/WhatsApp.png" class="icons" alt="">
            </div>
        </a>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>
        $('#menuList').click(function() {
            $('#ulList').toggleClass("show");
        })
        
    </script>
</body>
</html>