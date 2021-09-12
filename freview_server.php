<?php

	$freview_req = $_POST['freview_req'];

	include("dataBase.php");

	$sql = "SELECT * reviews WHERE categorie = '$freview_req'";
	$query = mysqli_query($db, $sql);

	/*while($row = mysqly_fetch_data($query)){
		echo $row['titlu'];

	}*/
	$output = "";
	while($row = mysqli_fetch_assoc($query)){
        $output .= '<div class="review_label">';
            if($row['imagine1']){
                $output .= '<img src="data:image/jpeg;base64,' . base64_encode($row['imagine1']) . '" height="100px">';
            }
            else{
                if($row['imagine2']){
                    $output .= '<img src="data:image/jpeg;base64,' . base64_encode($row['imagine2']) . '" height="100px">';
                    $output .= $row['imagine2'];
                }
                else{
                    if($row['imagine3']){
                        $output .= '<img src="data:image/jpeg;base64,' . base64_encode($row['imagine3']) . '" height="100px">';
                    }
                }
            }
            $output .= '<br>'.$row['titlu'];
        $output .= '</div>';
    }

    echo $output;

?>