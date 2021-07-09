<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="offset-md-3">
                        <nav>
                            <div><a href="https://sourcecodester.com">Sourcecodester</a></div>
                        </nav>
                        <div>
                            <div>
                                <h3>PHP - Simple To Do List App</h3>
                                <hr />
                                <div>
                                    <form action="add_query.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input name="task" required="" type="text" class="form-control" />
                                            </div>
                                            <div class="col-md-4">
                                                <button name="add" class="add_task btn btn-primary">Add Task</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br /><br /><br />
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
					                        require 'conn.php';
					                        $query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
					                        $count = 1;
					                        while($fetch = $query->fetch_array()){
				                        ?>
                                        <?php
                                        if($fetch['delete_flag'] == 0){
                                            echo "<tr>";
                                            echo "<td>" . $count++ . "</td>";
                                            echo "<td>" . $fetch['task'] . "</td>";
                                            echo "<td>" . $fetch['status'] . "</td>";
                                            
                                        } ?>
                                        <td colspan="2">
                                            <center>
                                                <?php
                                                if($fetch['delete_flag'] == 0){
								                    if($fetch['status'] != "Done"){
									                echo '<a href="update_task.php?task_id='. $fetch['task_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
								                    }
							                    
                                                    echo '<a href="delete_query.php?task_id=' . $fetch['task_id'] . '"class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>';
                                                }?>
                                            </center>
                                                                                    </td>
                                        <?php
                                        if($fetch['delete_flag'] == 0){
                                        echo "</tr>";
                                            }?>
                                        <?php
					                        }
				                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>