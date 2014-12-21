<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/app/core/initialize.php');

//Login
Router::add('/', '/app/controllers/home.php');
//Create Account
Router::add('/create_user', '/app/controllers/users/create_user.php');
Router::add('/api/process_user', '/app/controllers/users/process_user.php');
Router::add('/return_user', '/app/controllers/users/return_user.php');
Router::add('/login', '/app/controllers/users/login.php');
Router::add('/logout', '/app/controllers/users/logout.php');

//Dashboard
Router::add('/dashboard', '/app/controllers/dashboard/home.php');

// Reports
Router::add('/inspector_report', '/app/controllers/reports/inspector_report.php');
Router::add('/client_report', '/app/controllers/reports/client_report.php');
Router::add('/reports/process_form', '/app/controllers/reports/process_form.php');
Router::add('/reports/remove_report', '/app/controllers/reports/remove_report.php');
// Router::add('/reports/send_email', '/app/controllers/reports/send_email.php');

// Comments
Router::add('/comments/process_form', '/app/controllers/comments/process_form.php');

// Notifications
Router::add('/notifications', '/app/controllers/dashboard/notification.php');
Router::add('/update_notifications', '/app/controllers/dashboard/update_notification.php');





// // Users
// Router::add('/users', '/app/controllers/users/list.php');
// Router::add('/users/register', '/app/controllers/users/register/form.php');
// Router::add('/users/register/process_form/', '/app/controllers/users/register/process_form.php');

// Issue Route
Router::route();