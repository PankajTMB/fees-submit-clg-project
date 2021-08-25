<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feessumbit";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        // addmisionForm functio for insert data
    function addmisionForm($conn){
            // === varibles ===
            $Name = $_POST["Name"];
            $gender = $_POST["gender"];
            $Fname = $_POST["Fname"];
            $Mname = $_POST["Mname"];
            $Email = $_POST["Email"];
            $mobile = $_POST["mobile"];
            $mobile2 = $_POST["mobile2"];
            $className = $_POST["className"];
            $classyear = $_POST["classyear"];

            // === function for get roll from database === 
            function rollnoAssign($conn,$classValue,$assignRollno,$classyear){
                $roll = "SELECT max(roll_no) as rollno FROM `student_table` WHERE classname = '$classValue' AND classyear = '$classyear'";
                $result = $conn->query($roll);  
                $row = $result->fetch_assoc();
                if(empty($row['rollno'])){
                    $rollno = $assignRollno;
                    return $rollno;
                }else{
                    $rollno = $row['rollno'] + 1;
                    return $rollno;
                }
            }
            // === set rollno value AND TOTAL FEES  ===
            // BCA CLASS DATA ENTER
            if($className == "BCA" && $classyear == "year1"){
                $rollnoStart = 1000;
                $totalFees = 40000;
            }
            else if($className == "BCA" && $classyear == "year2"){
                $rollnoStart = 2000;
                $totalFees = 41000;
            }
            else if($className == "BCA" && $classyear == "year3"){
                $rollnoStart = 3000;
                $totalFees = 41000;
            }
            // BCOM CLASS DATA ENTER
            else if($className == "BCOM" && $classyear == "year1"){
                $rollnoStart = 4000;
                $totalFees = 35000;
            }
            else if($className == "BCOM" && $classyear == "year2"){
                $rollnoStart = 5000;
                $totalFees = 36000;
            }
            else if($className == "BCOM" && $classyear == "year3"){
                $rollnoStart = 6000;
                $totalFees = 37000;
            }
            // BA CLASS DATA ENTER
            else if($className == "BA" && $classyear == "year1"){
                $rollnoStart = 7000;
                $totalFees = 25000;
            }
            else if($className == "BA" && $classyear == "year2"){
                $rollnoStart = 8000;
                $totalFees = 26000;
            }
            else if($className == "BA" && $classyear == "year3"){
                $rollnoStart = 9000;
                $totalFees = 27000;
            }
            else{
                die("SOMETHING WRONG");
            }

            // === call rollnoAssign function  ===
            $rollno = rollnoAssign($conn,$className,$rollnoStart,$classyear);

            // === insert data in data base ===
            $insertData = "INSERT INTO student_table (roll_no,name,gender,father_name,mother_name, email, number, number2, classname,classyear,total_fees) VALUES ('".$rollno."','".$Name."','".$gender."','".$Fname."','".$Mname."','".$Email."','".$mobile."','".$mobile2."','".$className."','".$classyear."','".$totalFees."')";    

            if ($conn->query($insertData)){
                echo "New record created successfully. Roll NO is: " .$rollno;

            }else{
                echo "Data Is Not in php Inserted";
            }
    }

    // feesSubmitForm Function
    function feesSubmitForm($conn){
        $rollno = $_POST['rollno'];
        $getData = "SELECT * FROM `student_table` WHERE roll_no = '$rollno' ";
        $dataResult = $conn->query($getData);      
        $row = $dataResult->fetch_assoc();
       /// get student dopist fees
       $deposit_fee_q = "SELECT sum(deposite_fees) FROM `fess_submit` WHERE roll_no = '$rollno' ";
       $getpending_fee = $conn->query($deposit_fee_q);      
       $getpending_fee = $getpending_fee->fetch_assoc();

        if($row){


           if($getpending_fee['sum(deposite_fees)'] !=''){
               $pending_fees = $row['total_fees'] - $getpending_fee['sum(deposite_fees)'];
           }

           $row['pending_fee'] = ($getpending_fee['sum(deposite_fees)'] != '') ? $pending_fees : $row['total_fees'] ; 
          
            echo $json= json_encode($row);
        }
        else{
            echo "PLEASE ENTER VALID ROLLNO";
        }


    }

    if(isset($_POST['formName'])){
        $formName = $_POST['formName'];
        if($formName == 'addmisionForm'){
            addmisionForm($conn);
        }
        else if($formName ==  'feesSubmitForm'){
            feesSubmitForm($conn);
        }
        else if($formName == 'feesDeposite'){
            $depositFeesAmount = $_POST['depositeFees'];
            $depositeFeesRollNo = $_POST['depositeFeesRollNo'];
            $depositeFeesInsert = "INSERT INTO fess_submit (deposite_fees,roll_no) VALUES ('".$depositFeesAmount."','".$depositeFeesRollNo."')";    
            if ($conn->query($depositeFeesInsert)){
                echo "fees Deposite Sucess ";
            }else{
                echo "Data Is Not Inserted";
            }
        }
        
    }
?>