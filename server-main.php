<?php 

//Connect to database
$db = mysqli_connect('localhost', 'root', '', 'to_do_registration');

// load the users previously added tasks to page
 $query2 = "SELECT * FROM tasks WHERE username='$username'";
 $result2 = mysqli_query($db, $query2);

 //get number of rows i.e. tasks to use in loop
 $num = mysqli_num_rows($result2);

 //loop through the users tasks and add to the table
 $i = 0;
 while ($i < $num) {

    $row = mysqli_fetch_assoc($result2);
    echo "<tr>";
    echo "<td>{$row['task_name']}</td>";
    echo "<td></td>";
    echo "<td>{$row['priority']}</td>";
    echo "<td>{$row['date_entered']}</td>";
    echo "</tr>";
    $i++;

    // do I need to add in here an if statement checking the DOM to prevent doubling up on loading tasks when a user clicks refresh 
    // maybe something with this - $dom = new DOMDocument();
 }

// -----------------------------------------------------------
// ADDING NEW TASKS IN 'TASKS' TABLE IN DB
//------------------------------------------------------------

if (isset($_POST['add_task'])) {
    // first receive all input values from the form
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $date_entered = date('Y-m-d');

    //store all the inputs into the 'tasks' db
    $query = "INSERT INTO tasks (username, task_name, due_date, date_entered ,priority) 
                VALUES('$username', '$task_name', '$due_date', '$date_entered', '$priority')";
    mysqli_query($db, $query);

    // --- DISPLAY ALL OF THE USERS TASKS IN TABLE --- //
    $query2 = "SELECT * FROM tasks WHERE username='$username'";
    $result2 = mysqli_query($db, $query2);

    //get number of rows i.e. tasks to use in loop
    $num = mysqli_num_rows($result2);

    //loop through the users tasks and add to the table
    $i = 0;
    while ($i < $num) {

    $row = mysqli_fetch_assoc($result2);

    echo "<tr>";
    echo "<td>{$row['task_name']}</td>";
    echo "<td></td>";
    echo "<td>{$row['priority']}</td>";
    echo "<td>{$row['date_entered']}</td>";
    echo "</tr>";

    $i++;
    }
}

/*-----------------------------------------------------------------------------------------------
THIS WAS AN IDEA FOR STORING THE TASKS IN THE SAME TABLE AS THE USER REGISTRATION AS AN OBJECT... 
BUT I THINK STORING THE TASKS IN  A SEPERATE TABLE IS GOING TO BE BETTER
-------------------------------------------------------------------------------------------------*/
/*

//Create the class Task
class Task implements JsonSerializable
{
    protected $task_name;
    protected $due_date;
    protected $priority;
 
    function __construct ($task_name, $due_date, $priority) {
        $this->task_name = $task_name;
        $this->due_date = $due_date;
        $this->priority = $priority;
    }

    function getDaysLeft() {

    }

    //functions needed for json_encode due to the data being set as protected
    public function getTaskName(){
        return $this->task_name;
    }
    public function getDueDate(){
        return $this->due_date;
    }
    public function getPriority(){
        return $this->priority;
    }
    public function jsonSerialize() {
        return 
        [
            'task_name'   => $this->getTaskName(),
            'due_date' => $this->getDueDate(),
            'priority' => $this->getPriority(),
        ];
    }
}

//if the Add Task button is submitted
if (isset($_POST['add_task'])) {
    // first receive all input values from the form
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];

    //create a new instance of Task class
    $new_task = new Task($task_name, $due_date, $priority);

    //turn task object to JSON for storing in db
    $json = json_encode($new_task);

    //query the database for the current user
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    

    //add new task to database
    $row['tasks'] .= $json;

    var_dump($row);
}
*/

?>