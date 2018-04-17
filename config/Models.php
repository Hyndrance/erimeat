<?php
include "CRUD.php";

// User Models
function admin() {
	$crud = new CRUD;
	$crud->table = "admin";
	return $crud;
}

// User Models
function company() {
	$crud = new CRUD;
	$crud->table = "company";
	return $crud;
}

// User Models
function dtr() {
	$crud = new CRUD;
	$crud->table = "dtr";
	return $crud;
}

// User Models
function employee() {
	$crud = new CRUD;
	$crud->table = "employee";
	return $crud;
}

// User Models
function inquiries() {
	$crud = new CRUD;
	$crud->table = "inquiries";
	return $crud;
}

// User Models
function interview_date() {
	$crud = new CRUD;
	$crud->table = "interview_date";
	return $crud;
}
// User Models
function job() {
	$crud = new CRUD;
	$crud->table = "job";
	return $crud;
}

// User Models
function job_function() {
	$crud = new CRUD;
	$crud->table = "job_function";
	return $crud;
}

// User Models
function position_type() {
	$crud = new CRUD;
	$crud->table = "position_type";
	return $crud;
}

// User Models
function candidate() {
	$crud = new CRUD;
	$crud->table = "candidate";
	return $crud;
}
// User Models
function application() {
	$crud = new CRUD;
	$crud->table = "application";
	return $crud;
}
// User Models
function timesheet() {
	$crud = new CRUD;
	$crud->table = "timesheet";
	return $crud;
}

// User Models
function user() {
	$crud = new CRUD;
	$crud->table = "user";
	return $crud;
}

// User Models
function projects() {
	$crud = new CRUD;
	$crud->table = "projects";
	return $crud;
}

// Remote Team Models
function remote_team() {
	$crud = new CRUD;
	$crud->table = "remote_team";
	return $crud;
}

// Download Models
function downloads() {
	$crud = new CRUD;
	$crud->table = "downloads";
	return $crud;
}

// Download timesheet_dispute
function timesheet_dispute() {
	$crud = new CRUD;
	$crud->table = "timesheet_dispute";
	return $crud;
}

function country_option() {
	$crud = new CRUD;
	$crud->table = "country_option";
	return $crud;
}

function city_option() {
	$crud = new CRUD;
	$crud->table = "city_option";
	return $crud;
}

function faq() {
	$crud = new CRUD;
	$crud->table = "faq";
	return $crud;
}

function invoice() {
	$crud = new CRUD;
	$crud->table = "invoice";
	return $crud;
}

function certificates(){
	$crud = new CRUD;
	$crud->table = "certificates";
	return $crud;
}
?>
