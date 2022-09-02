<?php
include("connection.php");

$sql = "SELECT * FROM base
		RIGHT JOIN martian
		on base.base_id = martian.base_id";
$result = mysqli_query($conn, $sql);

echo ' <tr>
	 <th>No.</th>
	 <th>First Name</th>
	 <th>Last Name</th>
	 <th>Base</th>
	 <th>Update</th>
	 <th>Delete</th>
	 </tr>';

$i = 1;
while ($data = mysqli_fetch_array($result)) {
	echo '
	
	 <tr>
		 <td class="martian_id">' . $i . '</td>
		 <td>' . $data['first_name'] . '</td>
		 <td>' . $data['last_name'] . '</td>
	     <td>' . $data['base_name'] . '</td>
	     <td><a id="edit" href="edit.php?edit_id=' . $data['martian_id'] . '" class="btn btn-success">Update</a>
		 <td><a id="delete" href="delete.php?del_id=' . $data['martian_id'] . '" class="btn btn-danger">Delete</a></td>
      </tr>';

	$i++;
}
