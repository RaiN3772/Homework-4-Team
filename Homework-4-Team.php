<?php
   # Initialize Variables
   $courseName = "PHP Course";
   $teamName = "Group 4 (D)";
   $groupMember = array(
       "21910190" => "Amir Alatrash",
       "21910124" => "Ameer Rishmawi",
       "21910289" => "Renad Zboon",
       "21920004" => "Dana Nofal"
   );
   date_default_timezone_set('Asia/Jerusalem'); # Set the default timezone to Jerusalem
   $current_date = date('m/d/Y'); # Month / Day / Year
   $current_time = date('h:i:sa'); # Hour : Minutes : Seconds AM/PM
   
   $employees = array (
    array('name' => 'Employee-1', 'department' => 'IT', 'salary' => 5000),
    array('name' => 'Employee-2', 'department' => 'HR', 'salary' => 4000),
    array('name' => 'Employee-3', 'department' => 'Marketing', 'salary' => 3000),
    array('name' => 'Employee-4', 'department' => 'Sales', 'salary' => 1950),
    array('name' => 'Employee-5', 'department' => 'Management', 'salary' => 1700),
    array('name' => 'Employee-6', 'department' => 'Finance', 'salary' => 1500)
);

function getTotalSalaries() {
	$totalSalaries = 0;
	global $employees; 							// We want to use a global variable from outside the function 
	foreach ($employees as $value) {
		$totalSalaries += $value['salary'];
	}
	return $totalSalaries;
}

function getMaxSalary() {
	global $employees; 							// We want to use a global variable from outside the function 
	$maxSalary = max(array_column($employees, 'salary')); // Get the maximum value from the returned values in a single column (salary) in the input array

	return $maxSalary;
}

?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
      <!-- Custom Style -->
      <link rel="stylesheet" href="https://amiralatrash.info/projects/HW5/style.css">
      <title><?=$courseName?> - <?=$teamName ?></title>
   </head>
   <body>
      <nav class="navbar bg-ahliya mb-5">
         <a class="navbar-brand text-white ms-3"><img src="https://eclass.paluniv.edu.ps/pluginfile.php/1/core_admin/logocompact/300x300/1624053753/logo-removebg-preview.png" width="30" height="30" class="d-inline-block align-top me-3" alt=""><?=$courseName ?> - <?=$teamName ?></a>
         <div class="navbar-text text-date">Current Date: <span class="text-light">10/27/2021</span>, Current Time: <span class="text-light">05:45:29pm</span></div> <!-- Display Current Time and Date -->
      </nav>
      <div class="container">
         <ul class="list-group">
            <li class="list-group-item active"><?=$teamName ?> Members:</li>
            <?php
               foreach ($groupMember as $id => $name) {
                   echo "<li class='list-group-item'>$name ($id)</li>";
               }
               
            ?>
         </ul>
         <div class="widget mt-5">
            <div class="widget-heading">
               <h5>Employees Table</h5>
            </div>
            <div class="widget-content">
               <table class="table employee-table table-bordered">
                  <thead>
                     <tr>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Salary</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        foreach ($employees as $employee) {
                            echo "<tr>";
                            echo "<td>{$employee['name']}</td>";
                            echo "<td>{$employee['department']}</td>";
                            echo "<td>{$employee['salary']}</td>";
                            echo "</tr>";
                        }
                     ?>
                  </tbody>
               </table>
            </div>
            <div class="widget-footer">
				<button type="button" class="btn btn-warning">Total Salaries <span class="badge bg-danger"><?= getTotalSalaries() ?></span></button>
				<button type="button" class="btn btn-warning" style="display: inline-block; float: right;">Maximum Salary <span class="badge bg-danger"><?= getMaxSalary() ?></span></button>
			</div>
         </div>
      </div>
   </body>
</html>