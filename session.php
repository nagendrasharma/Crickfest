<?php
session_start();
if(empty($_SESSION['user_id'])){
	?>
	<script type="text/javascript">
		window.location.href="index.php";
	</script>
	<?php
	exit;
}
?>