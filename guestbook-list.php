<?php
   
    require('config/config.php');
    require('config/db.php');
    
    $query = 'SELECT * FROM person ORDER BY logdt DESC';

    $result = mysqli_query($conn, $query);

    $person = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    
    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
	<div class="container">
    <br/>
		<h2>Person's Log</h2>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Address</th>
                    <th scope="col">Log Date and Time</th>
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                <?php foreach($person as $persons) : ?>
                    <tr>
                    <th scope="row"><?php echo $persons['id'];?></th>
                    <td><?php echo $persons['lname'];?></td>
                    <td><?php echo $persons['fname'];?></td>
                    <td><?php echo $persons['address'];?></td>
                    <td><?php echo $persons['logdt'];?></td>
                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>
        </table>
        <br/>
            <button type="button" class="btn btn-success btn-sm " onclick="document.location='index.php'">Add</button>
            <button type="button" class="btn btn-dark btn-sm" onclick="document.location='guestbook-login.php'">Logout</button>
</div>
<?php include('inc/footer.php'); ?>