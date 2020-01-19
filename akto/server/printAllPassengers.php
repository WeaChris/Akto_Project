<?php
	include "../connect.php";
	
	$routeID2=$_POST['routeiID2'];
	
	$sql="SELECT passengers.pass_name, passengers.pass_surname, passengers.pass_id FROM passengers, route, vessel_pass WHERE route.route_id=vessel_pass.route_id AND route.route_id='".$routeID2."' AND vessel_pass.pass_id=passengers.pass_id";
	$query=mysqli_query($link, $sql) or die(mysqli_error($link));
	
	//$row= mysqli_fetch_assoc($query);
	
	if(mysqli_num_rows($query)!=0){
		$out= '
				<div class="table_responsive">  
					<table class="table-bordered" >  
						<tr>  
							<th >Όνομα επιβάτη------</th>  
							<th >Επίθετο επιβάτη------</th>  
							<th >Κωδικός επιβάτη</th>
							
							
						</tr>
					</table>
				';

		while( $row = mysqli_fetch_assoc($query) ){
			
			
			$out .= '
					<table >
						 <tr>
							 
							 <td > <id="pass_name >'.$row['pass_name'].'------------</td>
							 <td > <id="pass_surname >'.$row['pass_surname'].'---------------------</td>
							 <td > <id="pass_id" >'.$row['pass_id'].' </td>
							 
							 
						 </tr>
					</table>
				</div>
				<br/>
				';
		}
	}else{
		
		
	}
	
	echo $out;
?>