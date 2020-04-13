<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Students Scores Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Student Scores</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
		    $sql = "SELECT id, Name, Sub1, Sub2, Sub3, Sub4, Sub5, Total, TRUNCATE(Percent,2) as per FROM scores";
                    if($result = $conn->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th> Id </th>";
					echo "<th>Name </th>";
					echo "<th>Sub1</th>";
					echo "<th>Sub2 </th>";
					echo "<th>Sub3 </th>";
					echo "<th>Sub4 </th>";
					echo "<th>Sub5 </th>";
					echo "<th>Total </th>";
					echo "<th>Percent</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
				while($row = $result->fetch_assoc()){
					echo "<tr>";
					echo "<td>" .$row["id"]."</td>";
					echo "<td>" .$row["Name"]."</td>";
					echo "<td>" .$row["Sub1"]."</td>";
					echo "<td>" .$row["Sub2"]."</td>";
					echo "<td>" .$row["Sub3"]."</td>";
					echo "<td>" .$row["Sub4"]."</td>";
					echo "<td>" .$row["Sub5"]."</td>";
					echo "<td>" .$row["Total"]."</td>";
					echo "<td>" .$row["per"]."%"."</td>";
					echo "</tr>";
                                       
				}
                                echo "</tbody>";
			echo "</table>"; 
        		$result->free();                                 
                                                           
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                             echo "ERROR: Could not able to execute $sql. " 
                                             .$conn->error; 
			  } 

                       $conn->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
