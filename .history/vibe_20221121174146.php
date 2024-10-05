<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <input type="button" class="submit_wide" value="Submit" onclick="
        $('.submit_wide').click(function () {
        $(this).val('Please wait..');
        $(this).attr('disabled', true);
        setTimeout(() => { 
            $(this).attr('disabled', false);
            $(this).val('Submit');
        }, 2000);
    });
    "/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script></script>
</body>
</html>