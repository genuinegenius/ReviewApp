<html>
<head>
<title> Reviewer </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" herf="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<style>
    div.container{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        flex-direction: column;
        width: 100%;
        height: 100%;
    }
    div.reviews{
        margin: 0 auto;
        width: 90%;
        height: 90%;
        padding: 10;
        background-color: #d3d3d3;
    }
    div.title{
        margin: 0 auto;
        width: 90%;
        margin-bottom: 10;
    }
    div.review_lable{
        margin: 0 auto;
        width: 90%;
        height: auto;
        background-color: white;
    }
</style>
<body>
    <div class="menu-bar">
        <ul>
        <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
        <li><a><i class="fa fa-users"></i>Account</a>
            <div class="sub-menu-1">
                <ul>
                   <li><a href="myaccount.php">MyAccount</a></li>
                </ul>
            </div>
        </li>
        <li class="active"><a href="#"><i class="fa fa-clone"></i>Find review</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="title">
            Review-uri
        </div>
        <div class="reviews">
                <?php
                    $username = '';
                    $localhost = "localhost";
                    $id_db = "root";
                    $pwd_db = "";
                    $database_name = "cossy";
                    $db = mysqli_connect($localhost , $id_db , $pwd_db , $database_name);

                    $sql = "SELECT * FROM reviews";
                    $query = mysqli_query($db, $sql);

                    while($row = mysqli_fetch_assoc($query)){
                        echo '<div class="review_label">';
                            if($row['imagine1']){
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagine1']) . '" height="100px">';
                            }
                            else{
                                if($row['imagine2']){
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagine2']) . '" height="100px">';
                                    echo $row['imagine2'];
                                }
                                else{
                                    if($row['imagine3']){
                                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagine3']) . '" height="100px">';
                                    }
                                }
                            }
                        echo '</div>';
                    }

                ?>
                
        </div>
    </div>

</body>
</html>