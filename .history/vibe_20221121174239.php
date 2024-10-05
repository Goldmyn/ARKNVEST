<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <input type="button" id="yourButton" class="submit_wide" value="Submit" onclick="
        setDisabled()
    });
    "/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        window.onload = function() {
            window.setTimeout(setDisabled, 30000);
        }


        function setDisabled() {
            document.getElementById('yourButton').disabled = false;
        }

    </script>
</body>
</html>