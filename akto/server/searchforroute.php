<?php
	
	include "../connect.php";
	
	$apoV=$_POST['apoVal'];
	$prosV=$_POST['prosVal'];
	$depDate=$_POST['depDateVal'];
	
	
	$sql = "SELECT route1.route_id, route1.route_dep_date, route1.route_arr_date FROM route as route1 JOIN ports as port1 on port1.PORT_ID=route1.port_from_id JOIN ports as port2 on port2.PORT_ID=route1.port_to_id WHERE port1.PORT_NAME= '".$apoV."' AND port2.PORT_NAME= '".$prosV."' AND route1.ROUTE_DEP_DATE= '".$depDate."'";
	$query = mysqli_query($link, $sql) or die(mysqli_error($link));

	$row = mysqli_fetch_assoc($query);
	if(mysqli_num_rows($query)!=0){
			
		$out = '  
			
			<div class="table_responsive">  
				<table class="table-bordered" >  
					<tr>  
						<th >Κωδικός Δρομολογίου</th>  
						<th >Ημερομηνία Αναχώρησης</th>  
						<th >Ημερομηνία Άφιξης</th>
						
						
					</tr>
			';

		$out .= '
			 <tr>
				 
				 <td > <id="route_id" >'.$row['route_id'].' </td>
				 <td > <id="route_dep_date" >'.$row['route_dep_date'].' </td>
				 <td > <id="route_arr_date" >'.$row['route_arr_date'].' </td>
				
				 
			 </tr>
			 </table>
			</div>
			 <br/>
			';
		
	}
	else{
		
		$out = "Δεν υπάρχουν διαθέσιμα δρομολόγια";
	}
	
	
	echo $out;
	
	
	

?>