<?php
    require_once'config.php';
    $conn = mysqli_connect(servername, username, password, dbname);
    
    //Result per page
    $result_per_page = 2;

    //Get total number of pages
    $sql = "SELECT * FROM paginate";
    $result = mysqli_query($conn, $sql);
    $number_of_result = mysqli_num_rows($result);

    //determine total number of page available
    $number_of_page = ceil($number_of_result / $result_per_page);

    //Get the current page number
    if(!isset($_GET['page'])) {
        $page = 1;
    }
    else {
        $page = $_GET['page'];
    }

    //Formula for pagination Page 1 - A to J (1-10);
    $page_first_result = ($page-1) * $result_per_page;

    //Retrieve data and display on webpage
    $sql = "SELECT * FROM paginate LIMIT " . $page_first_result . ',' .$result_per_page;
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        echo $row['id'] . '' .$row['alpha'] . '<br>';
    }

    for($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href="paginate.php?page='.$page.'">'.$page.'</a>';
    }
    
?>

<?php //for($page = 1; $page <= $total_number_of_page; $page++) { ?>
    <?php //echo '<a href="paginate.php?page='.$page.'">'.$page.'</a>'; ?>
<?php //} ?>

