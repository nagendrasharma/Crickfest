<?php

function TeamDetails($team_id){
	include('con1.php');
	$check_team=$mysqli->prepare("SELECT Team_Name FROM team_master WHERE team_id=?");
	$check_team->bind_param("i",$team_id);
	$check_team->execute();
	$check_team->store_result();
	$check_team_count=$check_team->num_rows;
	if($check_team_count<=0){
	?>
	<script type="text/javascript">
	alert('No Recored');
	</script>
	<?php
	}else{
	$check_team->bind_result($Team_Name);
	$check_team->fetch();
	return $Team_Name;
	}
}
/*echo TeamDetails(1)*/
?>