<?php

$report_id = $_GET['report_id'];
$comment_id = $_GET['comment_id'];

$update_notifications = "
				UPDATE `comment` SET `read_comment` = '1' WHERE `report_id` = $report_id;
			";

			$update = db::execute($update_notifications);

header('Location: /inspector_report?report_id=' . $report_id);
exit();



