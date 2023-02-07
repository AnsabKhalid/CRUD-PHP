<?php

$conn = mysqli_connect("localhost", "faizan", "M.faizan123baig", "orbit_bscs_6") or die("coneection failed");

//create btn click

if (isset($_POST['create'])) {
  createData();
}

if (isset($_POST['update'])) {
  updateData();
}

if (isset($_POST['delete'])) {
  deleteRecord();
}

function createData() {
  $studentname=textboxValue(value: "std_name");
  $studentphone=textboxValue(value:"std_phone");
  $studentrollno=textboxValue(value:"std_rollno");
  $studentprogram=textboxValue(value:"class_id");

  if ($studentname && $studentphone && $studentrollno && $studentprogram) {
    // code...
    $sql="INSERT INTO students(std_name,std_phone,std_rollno,class_id)
          VALUES('$studentname','$studentphone','$studentrollno','$studentprogram')";

          if (mysqli_query($GLOBALS['conn'],$sql)) {
            // code...
            TextNode(classname:"success", msg:"Record Successfully inserted");
          } else {
            echo "Error: " .mysqli_error($GLOBALS['conn']);
          }
  } else {
    TextNode(classname:"error", msg:"Provide Data in the textbox");
  }
}

function textboxValue($value) {
  $textbox=mysqli_real_escape_string($GLOBALS['conn'],trim($_POST[$value]));
  if (empty($textbox)) {
    // code...
    return false;
  } else {
    return $textbox;
  }
}

//messages

function TextNode($classname,$msg) {
  $element="<h6 class='$classname'>$msg</h6>";
  echo $element;
}

//get data from mysqli

function getData() {
  $sql="SELECT * FROM students INNER JOIN class ON students.class_id = class.class_id";

  $result=mysqli_query($GLOBALS['conn'],$sql);

  if(mysqli_num_rows($result) > 0) {
    return $result;
    }
  }

function getName() {
  $sql = "SELECT * FROM class";

  $result=mysqli_query($GLOBALS['conn'],$sql);

  if(mysqli_num_rows($result) > 0) {
      return $result;
      }
    }

  //update
  function updateData() {
    $studentid = textboxValue(value: "std_id");
    $studentname = textboxValue(value: "std_name");
    $studentphone = textboxValue(value: "std_phone");
    $studentrollno = textboxValue(value: "std_rollno");
    $studentprogram = textboxValue(value: "class_id");

    if ($studentname && $studentphone && $studentrollno && $studentprogram) {
      $sql="
        UPDATE students SET std_name='$studentname',std_phone='$studentphone',std_rollno='$studentrollno',class_id='$studentprogram' WHERE std_id='$studentid';
      ";

      if (mysqli_query($GLOBALS['conn'],$sql)) {
        TextNode(classname:"success", msg:"Data successfuly updated");
      } else {
        TextNode(classname:"error", msg:"unable to update: " .mysqli_error($GLOBALS['conn']));
      }
    } else {
      TextNode(classname:"error", msg:"Select data using edit icon");
    }
  }

  function deleteRecord() {
    $studentid=(int)textboxValue(value: "std_id");

    $sql="DELETE FROM students WHERE std_id=$studentid";

    if (mysqli_query($GLOBALS['conn'],$sql)) {
      TextNode(classname: "success", msg: "Record deleted successfully");
    } else {
      TextNode(classname: "error", msg: "unable to delete record");
    }
  }
