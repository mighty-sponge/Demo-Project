<!DOCTYPE html>

<head>
    <title>TODO List | Edit</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="styles/style.css">
	
	<!-- For Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<div class="container">



<nav class="navbar navbar-expand-md navbar-dark bg-dark" >

<a class="navbar-brand" href="index.php">TODO List</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
	    <li class="nav-item active">
			<a class="nav-link" href="index.php"> 
			    <button type="submit" class="btn btn-success">Главная</button>
			</a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="create.php"> 
			    <button type="submit" class="btn btn-success">Добавить запись</button>
			</a>
		</li>
    </ul>
	
</div>
 
</nav>

<?php

require_once 'connection.php';

if(isset($_GET['id'])){
	
    $id = $_GET['id'];
    db();
    global $link;
	
    $query = "SELECT todoTitle, todo FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $query);
	
    if(mysqli_num_rows($result)==1){
		
        $row=mysqli_fetch_array($result);
        if($row){
			
            $title = $row['todoTitle'];
            $description = $row['todo'];
            echo "
            <form action='edit.php?id=$id' method='post'>
			    <br>
                <p>TODO title:</p>
                    <input type='text' name='title' value='$title' class='form-control'>
				<br>
                <p>TODO description:</p>
                    <input type='text' name='description' value='$description' class='form-control'>
                <br>
                    <input type='submit' name='submit' value='Edit' class='btn btn-primary'>
            </form>
            ";
        }
		
    } else{
		
        echo "Нет дел";
    }
	
    if(isset($_POST['submit'])){
		
        $title = $_POST['title'];
        $description = $_POST['description'];
        db();
		
        $query = "UPDATE todo SET todoTitle = '$title', todo = '$description'  WHERE id = '$id'";
        $insertEdited = mysqli_query($link, $query);
		
        if($insertEdited){
			
            echo "Изменено";
			echo "<p><a href='index.php'>Назад</a></p>";
        }
		
        else{
			
            echo mysqli_error($link);
        }
    }
};

?>

</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>