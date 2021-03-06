<?php
    // Functions

    // Function to Upload the File to the MySql DataBase
    function mysql_insert_array($table, $data,$conn,$csv_columns_with_quotes,$SBU,$project,$tower, $exclude = array()) {

        $fields = $values = array();

        if( !is_array($exclude) ) $exclude = array($exclude);
        array_push($values,"'$project'");
        array_push($values,"'$SBU'");
        array_push($values,"'$tower'");
        
        foreach( array_keys($data) as $key ) {
            if( !in_array($key, $exclude) ) {
                $fields[] = "`$key`";
                $values[] = "'" . mysqli_real_escape_string($conn,$data[$key]) . "'";
            }
        }
        
        $col = implode(",", $csv_columns_with_quotes);
        $values = implode(",", $values);
        
        // Uploading data based on the Column name
        // Need to add the project name and SBU Code
        if( mysqli_query($conn,"INSERT INTO `$table` ($col) VALUES ($values)") ) {
        } else {
            // return array( "mysql_error" => mysql_error() );
            header("location: ../upload.php?error=Failed");
            exit();
        }

    }

    if (isset($_POST["submit_button"])) {
        // Main Connection
        $conn = mysqli_connect('uploaddatabase.cmi7k84twi7t.us-east-1.rds.amazonaws.com','nikhil','TFjune2022','data_loads') or die($link);
        $table      = $_POST['table_name'];
        $project    = $_POST['project'];
        $SBU        = $_POST['SBU'];
        $tower      = $_POST['tower'];

        $sql = "SHOW COLUMNS FROM $table";
        // Collecting the Coloumn Name 
        $result = mysqli_query($conn,$sql);
        $stack = [];
        while($row = mysqli_fetch_array($result))
            {
                if ($row['Field']!=='id_' && $row['Field']!=='time_of_upload') {
                    $value_edited = "`".$row['Field']."`";
                    array_push($stack,$value_edited);
                }            
            }
        $file = $_FILES['Upload_File']['tmp_name'];

        // Opening the file and creating a file handler
        $handler = fopen($file,"r");
        $csv = array_map("str_getcsv", file($file,FILE_SKIP_EMPTY_LINES));
        $csv_columns = array_shift($csv);
        
        $csv_columns_with_quotes = [];
        array_push($csv_columns_with_quotes,"`project_id`");
        array_push($csv_columns_with_quotes,"`tower`");
        array_push($csv_columns_with_quotes,"`sbu_id`");
        foreach ($csv_columns as $old => $new) {
                    $value_head = "`".$new."`";
                    array_push($csv_columns_with_quotes,$value_head);
        }
        
        $j=0;
        if (array_intersect($csv_columns_with_quotes, $stack) == $csv_columns_with_quotes) {
            while (($line = fgetcsv($handler)) !== false) {
                //$line is an array of the csv elements
                if ($j!=0)
                {
                    mysql_insert_array($table, $line, $conn,$csv_columns_with_quotes,$SBU,$project,$tower);
                    $j++;
                }        
                else 
                {
                    $j++;
                }      
            }
            fclose($handler);
            header("location: ../upload.php?error=UploadSuccessful");
            exit();
        }
        else{
            // echo "This is not matching at all";
            header("location: ../upload.php?error=Failedtablemissmatch");
            exit();
        }
    }
    
    // This is download function and dosent need to change
    if (isset($_POST["download_button"])) {
        $table = $_POST['table_name'];
        $conn = mysqli_connect('uploaddatabase.cmi7k84twi7t.us-east-1.rds.amazonaws.com','nikhil','TFjune2022','data_loads') or die($link);
        $sql = "SHOW COLUMNS FROM $table";
        // Collecting the Coloumn Name 
        $result = mysqli_query($conn,$sql);
        // Getting the column Count for the data base table
        $stack = [];
        while($row = mysqli_fetch_array($result))
        {
            if ($row['Field']!=='id_' && $row['Field']!=='project_id' && $row['Field']!=='tower' && $row['Field']!=='sbu_id' && $row['Field']!=='upload_time') {
                array_push($stack, $row['Field']);
            }            
        }
        // print_r(gettype($stack));
        header("Content-Type: text/csv;charset=utf8");
        header("Content-Disposition:attachment; filename = $table.csv");
        $output = fopen("php://output","w");
        fputcsv($output,$stack);
        fclose($output);
    }
    