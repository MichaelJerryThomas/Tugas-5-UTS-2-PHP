<?php
include 'config.php';

if (isset($_GET["todo"])) {
    $todo_data = $_GET["todo"];
    $query = "INSERT INTO todolist VALUES('','$todo_data','')";
    $result = mysqli_query($koneksi, $query);
}

function read_data($koneksi)
{
    $list_todo = [];
    $query = "SELECT * FROM todolist";
    $result = mysqli_query($koneksi, $query);
    while ($todo_data = mysqli_fetch_assoc($result)) {
        $list_todo[] = $todo_data;
    }
    return $list_todo;
}
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        h1 {
            margin: 5px 0;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"] {
            width: 70%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .list{
            display: flex;
            justify-content: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            
        }

        li {
            margin-bottom: 10px;
            display: flex;
        }

        del {
            color: #999;
        }

        .actions {
            margin-top: 15px;
            padding : 10px;
        }

        .actions a {
            text-decoration: none;
            color: black;
            padding: 3px 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-left: 5px;
        }

        .actions a:hover {
            background-color: #f4f4f4;
        }

        li p{
            border:3px solid black;
            padding : 10px;
        }
        body{
  text-align:center;
  background-color:#ffcc8e;
}

.button{
  position:relative;
  display:inline-block;
  margin:20px;
}

.button a{
  color:white;
  font-family:Helvetica, sans-serif;
  font-weight:bold;
  font-size:36px;
  text-align: center;
  text-decoration:none;
  background-color:#FFA12B;
  display:block;
  position:relative;
  padding:20px 40px;
  
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  text-shadow: 0px 1px 0px #000;
  filter: dropshadow(color=#000, offx=0px, offy=1px);
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.button a:active{
  top:10px;
  background-color:#F78900;
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #915100;
  box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;
}

.button:after{
  content:"";
  height:100%;
  width:100%;
  padding:4px;
  position: absolute;
  bottom:-15px;
  left:-4px;
  z-index:-1;
  background-color:#2B1800;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}


    </style>
</head>

<body>
    <header>
        <h1>To Do List App</h1>
        <p><?php echo $_SESSION['username']; ?> - 225314027</p>
        <img src="foto.jpg" alt="Foto Profil">
        <a href="logout.php">Logout</a>
    </header>
    <div class="container">
        <h2>To Do List</h2>
        <form action="todolist.php" method="GET">
            <input type="text" name="todo" placeholder="Tambah To Do" required>
            <div class="button">
            <input type="submit" name="submit" value="Tambah">
        </div>
            <div ontouchstart="">
      
</div>
        </form>
        <div class="list">
        <ul>
            <?php $list_todo_data = read_data($koneksi); ?>
            <?php
                if (empty($list_todo_data)) {
                    echo"<h1>Belum Ada List To Do</h1>";
                }else{
            foreach ($list_todo_data as $todo_data) { ?>
                <li>
                    <p>
                        <?php
                        if ($todo_data["selesai"] == 1) { ?>
                            <strike><?php echo $todo_data["todo"] ?></strike>
                        <?php } else {
                            echo $todo_data["todo"];
                        }
                        ?>
                    </p>
                    <div class="actions">
                        <a href="selesai.php?id=<?php echo $todo_data["id"] ?>">Selesai</a>
                        <a href="hapus.php?id=<?php echo $todo_data["id"]?>">Hapus</a>
                    </div>
                </li>
            <?php } } ?>
        </ul>

        </div>
      
    </div>
</body>

</html>
