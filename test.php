<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    


    <form action="test.php" method="post">
        <button type="submit" name="btn">send</button>
    </form>

    <?php


    if(isset($_POST['btn'])){
        $conn = mysqli_connect('localhost', 'root', '', 'dziennik');
        $name = "Johni2";
        $content = "check";
        $updating_query = "UPDATE `testquery` SET name = '" . $name . "', content='".$content."' WHERE id=2;";
        mysqli_query($conn, $updating_query);
        $conn->close();
        
    }
    ?>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      
        
        // $numbers = [2, 7, 4, 10, 5, 8];
        // $empty = [];
        // echo "Весь массив: " . implode(', ', $numbers) . "<br>";
        // $text1 = "Числа больше 5: ";
        // $text2 = "Числа меньше 5: ";
        // echo $text1;
        // foreach ($numbers as $num) {
        //   if($num > 5){
        //     echo $num . " ";
        //   } 
        //   if($num < 5){
        //     $empty[] = $num;
        //   }
        // }
        // echo "<br>" . $text2 . " " . implode(' ', $empty);
       
          
        //}
        //$arr_lenght = count($arr)-1;
        //echo $arr_lenght          

        // $arr = [
        //     'backpack' => 'items',  
        //     'bottle' => 'woter',  
        //     'penal' => 'pen',
        //     'notebook' => 32 // list
        // ];
        // foreach($arr as $key => $value){
             
        //     echo $key . " - ";
        //     var_dump($key);
        //     echo "<br>";

            
        //     echo $value . " - ";
        //     var_dump($value);
        //     echo "<br><br>";
        
        // //    PHP_EOL -> perevod na druguju stroku
        // }

        $data = [
        [
            'name' => 'Math',
            'grades' => [4, 5]
        ],
        [
            'name' => 'Physics',
            'grades' => [3, 4]
        ]
        ];
        // echo $data[0]['name']  . PHP_EOL; 
        // echo $data[0]['grades'][1]; 
        echo "<table border='1'>";
        echo "<tr>
            <th>Subject</th>
            <th>Grade 1</th>
            <th>Grade 2</th>
            <th>Average</th>
        </tr>";

        foreach ($data as $value) {
            $avg = ($value['grades'][0] + $value['grades'][1]) / 2;
            echo "<tr>";
            echo "<td>{$value['name']}</td>";
            echo "<td>{$value['grades'][0]}</td>";
            echo "<td>{$value['grades'][1]}</td>";
            echo "<td>$avg</td>";
            echo "</tr>";
        }

        echo "</table>";

        foreach($data as $value){
            echo "Subject: ";
            echo $value['name'];
            echo "<br>" . "Grates: ";

            echo $value['grades'][0] . ", ";
            echo $value['grades'][1];
            echo "<br><br>";
        }   
       $students = [
        [
            'name' => 'Alice',
            'subjects' => [
                ['name' => 'Math', 'grades' => [4, 5]],
                ['name' => 'English', 'grades' => [5, 5]]
            ]
        ],
        [
            'name' => 'Bob',
            'subjects' => [
                ['name' => 'Math', 'grades' => [3, 4]],
                ['name' => 'English', 'grades' => [4, 4]]
            ]
        ]
        ];
        echo "<pre>";
        print_r($students);

        foreach($students as $currentlyItem){
            
            echo "Name studients: ";
            echo $currentlyItem['name'];
            echo "<br>";
            
            foreach($currentlyItem['subjects'] as $currentlySubjectItem){
                echo "Name subjects: ";
                echo $currentlySubjectItem['name'];
                echo "<br>";
    
                // foreach($currentlyItem['subjects'] as $grades){
                    echo "Grades: ";
                    echo $currentlySubjectItem['grades'][0];
                    echo ", ";
                    
                    echo $currentlySubjectItem['grades'][1];
                    echo "<br><br>";
                //}
                
            }
            
            
            // echo "<br>";
        }
//     ?>
<!-- 
//  <tr class="table-primary">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-secondary">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-success">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-danger">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-warning">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-light">
//       <td>1</td>
//       <td>Math</td>
//     </tr> -->




<!-- On cells (`td` or `th`) -->



</body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

            <form action="">
                
            </form>

    <?php
      
        
$data = [
    'Авто' => [
        'Лада',
        'Chevrolet',
        'Dodge'
    ],
    'Самолеты' => [
        'Ил-2',
        'И-16',
        'Мессершмидт'
    ],
    'Корабли' => [
        'Авианосец',
        'Фрегат',
        'Эсминец'
    ]
];

foreach ($data as $key => $value){
    echo "<b>$key</b>";
    foreach ($value as $values){
        echo "<li>$values</li>";
    }
}

$arrFirst = ["apple","banana"];
$arrSecond = ["Bob",12];
$totalArr = [];

$totalArr = array_merge($arrFirst, $arrSecond);
print_r($totalArr);



// foreach($totalArr as $key => $value){
//     echo PHP_EOL . "$key => $value";
// }


        // $numbers = [2, 7, 4, 10, 5, 8];
        // $empty = [];
        // echo "Весь массив: " . implode(', ', $numbers) . "<br>";
        // $text1 = "Числа больше 5: ";
        // $text2 = "Числа меньше 5: ";
        // echo $text1;
        // foreach ($numbers as $num) {
        //   if($num > 5){
        //     echo $num . " ";
        //   } 
        //   if($num < 5){
        //     $empty[] = $num;
        //   }
        // }
        // echo "<br>" . $text2 . " " . implode(' ', $empty);
       
          
        //}
        //$arr_lenght = count($arr)-1;
        //echo $arr_lenght          

        // $arr = [
        //     'backpack' => 'items',  
        //     'bottle' => 'woter',  
        //     'penal' => 'pen',
        //     'notebook' => 32 // list
        // ];
        // foreach($arr as $key => $value){
             
        //     echo $key . " - ";
        //     var_dump($key);
        //     echo "<br>";

            
        //     echo $value . " - ";
        //     var_dump($value);
        //     echo "<br><br>";
        
        // //    PHP_EOL -> perevod na druguju stroku
        // }

//         $data = [
//         [
//             'name' => 'Math',
//             'grades' => [4, 5]
//         ],
//         [
//             'name' => 'Physics',
//             'grades' => [3, 4]
//         ]
//         ];
//         // echo $data[0]['name']  . PHP_EOL; 
//         // echo $data[0]['grades'][1]; 
//         echo "<table border='1'>";
//         echo "<tr>
//             <th>Subject</th>
//             <th>Grade 1</th>
//             <th>Grade 2</th>
//             <th>Average</th>
//         </tr>";

//         foreach ($data as $value) {
//             $avg = ($value['grades'][0] + $value['grades'][1]) / 2;
//             echo "<tr>";
//             echo "<td>{$value['name']}</td>";
//             echo "<td>{$value['grades'][0]}</td>";
//             echo "<td>{$value['grades'][1]}</td>";
//             echo "<td>$avg</td>";
//             echo "</tr>";
//         }

//         echo "</table>";

//         foreach($data as $value){
//             echo "Subject: ";
//             echo $value['name'];
//             echo "<br>" . "Grates: ";

//             echo $value['grades'][0] . ", ";
//             echo $value['grades'][1];
//             echo "<br><br>";
//         }   
//        $students = [
//         [
//             'name' => 'Alice',
//             'subjects' => [
//                 ['name' => 'Math', 'grades' => [4, 5]],
//                 ['name' => 'English', 'grades' => [5, 5]]
//             ]
//         ],
//         [
//             'name' => 'Bob',
//             'subjects' => [
//                 ['name' => 'Math', 'grades' => [3, 4]],
//                 ['name' => 'English', 'grades' => [4, 4]]
//             ]
//         ]
//         ];
//         echo "<pre>";
//         print_r($students);

//         foreach($students as $currentlyItem){
            
//             echo "Name studients: ";
//             echo $currentlyItem['name'];
//             echo "<br>";
            
//             foreach($currentlyItem['subjects'] as $currentlySubjectItem){
//                 echo "Name subjects: ";
//                 echo $currentlySubjectItem['name'];
//                 echo "<br>";
    
//                 // foreach($currentlyItem['subjects'] as $grades){
//                     echo "Grades: ";
//                     echo $currentlySubjectItem['grades'][0];
//                     echo ", ";
                    
//                     echo $currentlySubjectItem['grades'][1];
//                     echo "<br><br>";
//                 //}
                
//             }
            
            
//             // echo "<br>";
//         }
// ?>
<!-- 
//  <tr class="table-primary">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-secondary">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-success">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-danger">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-warning">
//       <td>1</td>
//       <td>Math</td>
//     </tr>

//     <tr class="table-light">
//       <td>1</td>
//       <td>Math</td>
//     </tr> -->




<!-- On cells (`td` or `th`) -->



</body>
</html>