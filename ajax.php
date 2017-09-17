<?php
	exec ( "gpio read 0", $status );
	echo $status;
?>