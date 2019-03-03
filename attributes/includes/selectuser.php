    <?php
    require_once "./attributes/includes/db.php";

    $sql = "SELECT * FROM users WHERE username = 'tim' ";
    $results = $db->query($sql);

    //get user id
    if ($results->num_rows > 0) {
        // output data of each row
        while ($result = $results->fetch_assoc()) {

            $id = $result["id"];

        }
    } else {
        echo "user id not found";
    }
