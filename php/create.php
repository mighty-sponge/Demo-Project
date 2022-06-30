<!DOCTYPE html>

<head>
    <title>Список дел | Добавить запись</title>
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
include "connection.php";
?>

<form method="post" action="create.php">
    <br>
    <p>Название:</p>
        <input name="todoTitle" type="text" class="form-control">
	<br>
    <p>Описание: </p>
        <input name="todoDescription" type="text" class="form-control">
    <br>
        <input type="submit" name="submit" value="Новая запись" class="btn btn-primary">
</form>

<?php

if(isset($_POST['submit'])) {
	
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];
    echo "Запись: " . $title . "<br> с описанием: " . $description;
};

if(isset($_POST['submit'])) {
	
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];

    db();
    global $link;
	
    $query = "INSERT INTO todo(todoTitle, todo, date) VALUES ('$title', '$description', now() )";
    $insertTodo = mysqli_query($link, $query);
   
   if($insertTodo){
	   
        echo " ---> Успешно добавлена";
		echo "<p><a href='index.php' role='button' class='btn btn-primary'>Back</a></p>";
    } else{
		
        echo mysqli_error($link);
    }
    mysqli_close($link);
};

?>

</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>

</body>