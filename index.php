<?php
  require_once('operation.php');
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

  </head>
  <body>

    <main>
      <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Students Database</h1>

        <div class="d-flex justify-content-center">
          <form class="w-50" action="" method="post">
            <div class="pt-2">
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-danger" id="basic-addon1"><i class="fas fa-id-badge"></i></span>
              </div>
              <input type="text" autocomplete="off" placeholder="ID" name="std_id" value="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="pt-2">
              <div class ="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-danger" id="basic-addon1"><i class="fas fa-book"></i></span>
              </div>
              <input type="text" autocomplete="off" placeholder="Student Name" name="std_name" value="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="row pt-2">
              <div class="col">
                <div class ="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-danger" id="basic-addon1"><i class="fas fa-people-carry"></i></span>
                </div>
                <input type="text" autocomplete="off" placeholder="phone_no" name="std_phone" value="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
              </div>
                <div class="col">
                  <div class ="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-danger" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                  </div>
                  <input type="text" autocomplete="off" placeholder="roll_no" name="std_rollno" value="" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
            </div>
            <div class="pt-2">
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-danger" id="basic-addon1"><i class="fas fa-industry"></i></span>
              </div>
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="class_id" style="width: 514px">

                <?php

                  $result=getName();

                  if ($result) {
                    while ($row=mysqli_fetch_array($result)) { ?>
                <option value="<?php echo$row['class_id']; ?>"><?php echo$row["class_name"]; ?></option>
                <?php
                      }
                    }
                 ?>

              </select>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <button class="btn btn-success" name="create" attr:"dat-toggle='tooltip'data-placement='bottom'title='Create'"><i class="fas fa-plus"></i></button>
              <button class="btn btn-primary" name="read" attr:"dat-toggle='tooltip'data-placement='bottom'title='Read'"><i class="fas fa-sync"></i></button>
              <button class="btn btn-light border" name="update" attr:"dat-toggle='tooltip'data-placement='bottom'title='Update'"><i class="fas fa-pen-alt"></i></button>
              <button class="btn btn-danger" name="delete" attr:"dat-toggle='tooltip'data-placement='bottom'title='Delete'"><i class="fas fa-trash-alt"></i></button>
            </div>
          </form>
        </div>

        <!-- bootstrap table -->

        <div class="d-flex table-data">
          <table class="table table-striped table-dark">
            <thead class="thead-dark">

              <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Student phone</th>
                <th>student roll_no</th>
                <th>Student Program</th>
                <th>Edit</th>
              </tr>
              </thead>

              <tbody id="tbody">
              <?php
              if (isset($_POST['read'])) {
                $result=getData();

                if ($result) {
                  while ($row=mysqli_fetch_assoc($result)) { ?>

                      <tr>
                        <td data-std_id="<?php echo$row['std_id']; ?>"><?php echo$row['std_id']; ?></td>
                        <td data-std_id="<?php echo$row['std_id']; ?>"><?php echo$row['std_name']; ?></td>
                        <td data-std_id="<?php echo$row['std_id']; ?>"><?php echo$row['std_phone']; ?></td>
                        <td data-std_id="<?php echo$row['std_id']; ?>"><?php echo$row['std_rollno']; ?></td>
                        <td data-std_id="<?php echo$row['std_id']; ?>"><?php echo$row['class_name']; ?></td>
                        <td><i class="fas fa-edit btnedit" data-std_id="<?php echo$row['std_id'];?>"></i></td>
                      </tr>

                <?php
                  }
                }
              }
               ?>
            </tbody>
          </table>
        </div>

      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="main.js">

    </script>
  </body>
</html>
