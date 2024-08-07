<?php

include('connection.php');

function fetchalldata($tablename)
{
	$sql = "select * from $tablename";
	$result = mysqli_query($GLOBALS['conn'], $sql);

	if ($result) {
		return $result;
	} else {
		echo "Error:" . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
	}
}

function insert($tablename, $data)
{
	$columns = "";
	$values = "";

	foreach ($data as $column => $value) {
		$columns .= ($columns == "") ? "" : ", ";
		$columns .= $column;

		$values .= ($values == "") ? "" : ", ";
		$values .= $value;
	}

	$sql = "insert into $tablename ($columns) values ($values)";

	$result = mysqli_query($GLOBALS['conn'], $sql);

	if ($result) {
		echo "inserted";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
	}
}

function selectdatabyid($tablename, $id)
{
	$sql = "select * from $tablename where id=" . $id;
	$result = mysqli_query($GLOBALS['conn'], $sql);

	if ($result) {
		$data = mysqli_fetch_array($result);
		return $data;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
	}
}

function update($table, $data, $where)
{
	foreach ($data as $columns => $value) {
		$update = ("UPDATE $table SET $columns = $value WHERE id=" . $where);

		//echo $updates
		mysqli_query($GLOBALS['conn'], $update);
	}
}

function deletedata($tablename, $id)
{
	$sql = "delete from $tablename where id=" . $id;
	$result = mysqli_query($GLOBALS['conn'], $sql);

	if ($result) {
		echo "Deleted";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
	}
}

?>