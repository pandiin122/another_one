<?php
include("connection.php");


if (isset($_GET['del_id'])) {
  $id = $_GET['del_id'];

  $sql = "delete from posts where id='" . $id . "'";
  $result = mysqli_query($conn, $s);

  header('location:index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Martian Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="style.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

  <script>
    $(() => {
      // Create handling
      $("form").submit((event) => {
        var dataForm = {
          first_name: $("#first_name").val(),
          last_name: $("#last_name").val(),
          leader: $("#leader").val(),
          base: $("#base").val(),
        }

        $.ajax({
          type: "POST",
          url: "add.php",
          data: dataForm,
          dataType: "json",
          encoded: "true",
        });
        event.preventDefault();
      });
    });
  </script>
</head>

<body>

  <div align="center" class="container bg-dark rounded mt-3 p-4 text-white">
    <div class="row">
      <div id="pics" align="center" class="col col-lg-4">
        <p class="h6">Valles Marineris</p>
        <img src="images/1.png" height="150">
        <p>Elon Musk</p>
        <p>Total Martians: <?php
                            include("get_members.php");
                            $select_members(1);
                            ?>
        </p>
      </div>
      <div id="pics" align="center" class="col col-lg-4">
        <p class="h6">Galle Cratertown</p>
        <img src="images/2.png" height="150">
        <p>Mark Watney</p>
        <p>Total Martians: <?php
                            include("get_members.php");
                            $select_members(2);
                            ?>
        </p>
      </div>
      <div id="pics" align="center" class="col col-lg-4">
        <p class="h6">Thars Island</p>
        <img src="images/3.png" height="150">
        <p>Ray Bradbury</p>
        <p>Total Martians: <?php
                            include("get_members.php");
                            $select_members(3);
                            ?>
        </p>
      </div>
    </div>
    <br>
    <div class="row">
      <div id="pics" align="center" class="col col-lg-6">
        <p class="h6">New New New York</p>
        <img src="images/4.png" height="150">
        <p>Chris Beck</p>
        <p>Total Martians: <?php
                            include("get_members.php");
                            $select_members(4);
                            ?>
        </p>
      </div>
      <div id="pics" align="center" class="col col-lg-6">
        <p class="h6">Olympus Mons Spa & Casino</p>
        <img src="images/5.png" height="150">
        <p>None</p>
        <p>Total Martians: <?php
                            include("get_members.php");
                            $select_members(5);
                            ?>
        </p>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">Martian Data</h2>
        </div>
      </div>
      <p class="text-right"><a data-toggle="modal" data-target="#myModal" class="btn btn-success text-white">Add Martian</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="table-wrap">
            <table class="table table-striped" id="content">
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container py-5">
            <h2>Add Martian</h2>
            <form action="add.php" method="POST">
              <div class="form-group">
                <label for="email">Firstname:</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
              </div>
              <div class="form-group">
                <label for="email">Lastname:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
              </div>
              <div class="form-group">
                <label>Leader:</label>
                <select class="form-control" id="leader" name="leader">
                  <option selected>Select Leader</option>
                  <option value="0">This martian is a leader</option>
                  <?php
                  $result = $conn->query("SELECT * FROM martian WHERE super_id IS NULL");
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value=$row[martian_id]>$row[first_name] $row[last_name]</option>";
                  }
                  ?>
                </select>
              </div>
              <div class=" form-group">
                <label for="email">Base:</label>
                <select class="form-control" id="base" name="base">
                  <option selected>Select Base</option>
                  <?php
                  $result = $conn->query("SELECT * FROM base");
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value=$row[base_id]>$row[base_name]</option>";
                  }
                  ?>
                </select>
              </div>
              <button type="submit" id="save" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    $(document).ready(function() {
      $.ajax({
        url: "select.php",
        success: function(dataabc) {
          //console.log(dataabc);
          $("#content").html(dataabc);
        }
      });
    });
  </script>

</body>

</html>
