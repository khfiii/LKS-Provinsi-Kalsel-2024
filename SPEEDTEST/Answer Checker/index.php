<?php 

$submitedAnswer = 'submittedAnswers.csv'; 
$actualAnswer = 'actualAnswers.csv'; 
$arraySubmit = []; 
$arrayAnswer = []; 

function readCsvFile($file){
    $data = [];

    if(fopen($file, 'r') === false){
        throw new Exception('failed to read file'); 
    }

    $openFile = fopen($file, 'r'); 

    while(($read = fgetcsv($openFile, 10, ',')) !== false){
       $data[] = $read; 
    }

    return $data; 

}

$result = [
    'actualAnswer' => [], 
    'submitAnswer' => []
]; 

$submits = readCsvFile($submitedAnswer);
$answers = readCsvFile($actualAnswer);

$totalQuestion = count($answers); 
$rightAnswer = 0; 

foreach ($answers as $answer) { 
   foreach($answer as $value){
    array_push($result['actualAnswer'], $value); 
   }
    
    
}

foreach ($submits as $submit) {
    foreach($submit as $value){
     array_push($result['submitAnswer'], $value); 
    }
     
     
 }

foreach($result['actualAnswer'] as $key => $answer){
    if($answer == $result['submitAnswer'][$key]){
        $rightAnswer++; 
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer Checker</title>
</head>
<body>

<table border="1">
    <thead>
    <tr style="font-weight: bold;">
        <td>Question</td>
        <td>Actual Answer</td>
        <td>Submitted Answer</td>
    </tr>
    </thead>

    <tbody>
        <?php foreach($result['actualAnswer'] as $key => $answer): ?>
            <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $answer ?></td>
            <td><?= $result['submitAnswer'][$key] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p style="margin-top: 3px;">Score <?=$rightAnswer.'/'.$totalQuestion ?></p>
    
</body>
</html>