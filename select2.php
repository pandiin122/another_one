<?php
include("connection.php");

$sql="SELECT CONCAT(m.first_name, " ", m.last_name) as Martian,  CONCAT(s.first_name, " ", s.last_name) as Superior
		FROM martian as m
		LEFT JOIN martian as s
		on m.super_id = s.martian_id;";
$result = mysqli_query($conn,$sql);


echo ' <tr>
	 <th>No.</th>
	 <th>First Name</th>
	 <th>Last Name</th>
	 <th></th>
	 <th>Update</th>
	 <th>Delete</th>
	 </tr>';

$i=1;
while($data=mysqli_fetch_array($result))
{
	 echo '
	
	 <tr>
		 <td>'.$i.'</td>
		 <td>'.$data['first_name'].'</td>
		 <td>'.$data['last_name'].'</td>
	     <td>'.$data['base_name'].'</td>
	     <td><a href="edit.php?edit_id='.$data['id'].'">Update</a></td>
		 <td><a href="index.php?del_id='.$data['id'].'" >Delete</a></td>
      </tr>';
	  
	  $i++;
}

?>
