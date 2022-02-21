<?php 
include("DBConnection.php");
?>
<html>
<head>
<style>
  
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #3498DB;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #5C97BF;
}

.active {
  background-color: #007FAA;
}
</style>
</head>
<body bgcolor="e4e8e1">

<ul>
  <li><a href="index.php" style="margin-left: 15px">Library Management System</a></li>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="new_record.php">Insert New Record</a></li>
  <li><a href="all_records.php">View All Record</a></li>
  <li><a href="search_record.php">Search Record</a></li>
  <li><a href="logout.php">Log out</a></li>
</ul>
<br>
<br>