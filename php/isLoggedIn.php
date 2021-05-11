<?php
session_start();

if (isset($_SESSION) && isset($_SESSION["ses_sluserid"])) {
	echo 'loggedIn';
} else {
	echo 'notLoggedIn';
}