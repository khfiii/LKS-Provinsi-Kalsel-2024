<?php 
require 'test_php_doc.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
<?php

    if(isset($_POST['create'])){
        
    $title = $_POST['title']; 
    $description = $_POST['description']; 
    $htmlToDoc = new  HTML_TO_DOC();   
    $htmlContent = parseHtml($title, $description); 
    $htmlToDoc->createDoc($htmlContent, $title, true); 

    }

    function parseHtml($title, $description){
        $htmlContent = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>$title</title>
        </head>
        <body>
        
            <h1>$title</h1>
        
            <p>$description</p>
            
        </body>
        </html>";
        
        return $htmlContent; 

    }



?>
    
</body>
</html>