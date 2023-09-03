<?php

	require FCPATH.'vendor/autoload.php';

	if (!empty($result)) {
		$name=$result['fullname']==NULL ? '-' :$result['fullname'];
		$location=$result['location']==NULL ? '-' :$result['location'];
		$code=$result['employeecode'];
		$bankaccountnumber=$result['bankaccountnumber'];
		$branch=$result['branch']==NULL ? '-':$result['branch'];
		$department=$result['department']==NULL ? '-':$result['department'];
		$location=$result['location']==NULL ? '-' :$result['location'];
		$instructions=$result['instructions']==NULL?'-':$result['instructions'];
		$salarymonth=$result['salarymonth'];
		$grosssalary=$result['grosssalary'];
		$basicsalary=$result['basicsalary'];
		$designation=$result['designation']==NULL ?'-':$result['designation'];
		$dateofjoining=$result['dateofjoining'];
		$bonus=$result['bonus']=='0.00' ? '-':$result['bonus'];
		$workingdays=$result['workingdays'];
		$bankcode=$result['bankcode'];
		$transport=$result['transport']==NULL ? '-' : $result['transport'];
		$airfare=$result['airfare']==NULL ? '-' : $result['airfare'];
		$housingallowance=$result['housingallowance']==NULL ? '-' : $result['housingallowance'];
		$otherdeduction=$result['otherdeduction']==NULL ? '-':$result['otherdeduction'];
		$expenseclaims=$result['expenseclaims']==NULL ? '-' : $result['expenseclaims'];
		$netsalary=$result['netsalary'];
		$paymentmethod=$result['paymentmethod']==NULL?'-':$result['paymentmethod'];
		$other=$result['other']=='0.00' ? '-':$result['other'];
		$salaryarrears=$result['salaryarrears']==NULL?'-':$result['salaryarrears'];
		$advancehousingallowance=$result['advancehousingallowance']==NULL ? '-':$result['advancehousingallowance'];
		$otherpayables=$result['otherpayables']==NULL ? '-':$result['otherpayables'];
		
		$totalEarnings=($basicsalary) +($other)+($transport)+($airfare)+($housingallowance);
		$totalEarnings=number_format((float)$totalEarnings, 2, '.', '');
		$totalAdditions=($salaryarrears)+($bonus)+($expenseclaims)+($otherdeduction)+($advancehousingallowance);
		$totalAdditions=number_format((float)$totalAdditions, 2, '.', '');

		$image_path = URL.'assets/images/shared/fragomen1.jpg';
		
		$content = "<page>
	<table width='100%' border='0' cellspacing='0' cellpadding='0' style='border:#000000 1px solid;'>
		<tr border='1' cellspacing='1' cellpadding='0'>
			<td style=' border-top:#000000 0.5px solid;
					  border-left:#000000 0.5px solid;
					  border-right:#000000 0.5px solid;'>
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
					<tr>
						<td style='font-size:14px;
							width:50%;
				              color:#000000;
							  font-weight:bold;
							  font-family:verdana;
							  padding-top:5px;
							  padding-left:5px;
				          	text-align:left;'><img src='$image_path' />
				        </td>
				        <td style='font-size:14px;
				          width:50%;
				              color:#000000;
							  font-weight:bold;
							  font-family:Arial,verdana;
							  padding-top:5px;
				          text-align:right; padding-right:5px'>Private & Confidential
				        </td>
				    </tr>
				</table>
			</td>
		</tr>
		<tr border='1' cellspacing='1' cellpadding='0'>
			<td style='font-size:20px;
		              color:#000000;
					  font-weight:bold;
					  font-family:verdana;
					  border-left:#000000 0.5px solid;
					  border-right:#000000 0.5px solid;
		          text-align:center;'>United Arab Emirates</td>
		</tr>

		<tr  border='0' cellspacing='0' cellpadding='0'>
			<td style='font-size:12px;
			          text-align:center;
			          font-family:verdana;
			          border-bottom:#000000 0.5px solid;
						  border-left:#000000 0.5px solid;
						  border-right:#000000 0.5px solid;
					  padding-bottom:10px;'>  Phone: +971 4 81 81 733 | Fax: +971 4 81 81 777
			</td>
		</tr>
		<tr>
			<td colspan='4' style='height:0.1px;' ></td>
		</tr>
		<tr style='height:40px;
				     box-shadow:1px 2px 2px #CCC;
					 background-color:#EEE;
					 font-size:14px;
					 text-align:center;
					 font-family:Arial,verdana;
					 color:#000;
					 line-height:15px;
					 font-weight:bold;
					 padding-top:5px;
					 margin-top:5px;
					 border-bottom:#CCC 0.5px solid;'>
			<td colspan='4' style='text-align:left; height:35px; padding-left:5px; border:#000000 0.5px solid; font-weight:bold;' >Pay Slip for the month of $salarymonth</td>
		</tr>
		<tr>
			<td colspan='4' style='height:0.5px;' ></td>
		</tr>
		<tr style='height:15px;
			box-shadow:1px 2px 2px #CCC;
			background-color:#EEE;
			font-size:14px;
			text-align:center;
			font-family:Arial,verdana;
			text-transform:capitalize;
			color:#000000;
			line-height:15px;

			border:0.5px solid #CCC;'
			>
			<td colspan='4' style=' text-align:center; border:0.5px solid #000000; height:15px; font-weight:bold;' >Employee Details</td>

		</tr>
		<tr>
			<td> 
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial, verdana;
						  font-size:9.2px;
						  font-weight:bold;		
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right: 0.5px solid #000000;
						    border-left:0.5px solid #000000;
							border-top:0.5px solid #000000;'> <span style='margin-left:5px;'>employee code </span> </td>
						<td style='width:29.5%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$code </span></td>
									<td style='width:1%; border-top:#000000 0.5px solid;'>
									</td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:9.2px;
								  font-weight:bold;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000 ;
								    border-left:0.5px solid #000000;
									border-top:0.5px solid #000000;margin-left:12px;'><span style='margin-left:5px;'>Location </span></td>
						<td style='
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$location </span></td>
						
					</tr>
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial, verdana;
						  font-size:9.2px;	
						  color:#000000;
						  font-weight:bold;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
							border-top:0.5px solid #000000;'><span style='margin-left:5px;'>Employee Name </span></td>
						<td style='width:29.5%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$name </span></td>
									<td style='width:1%;'>
									</td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:9.2px;
								  font-weight:bold;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
									border-top:0.5px solid #000000; margin-left:12px;'><span style='margin-left:5px;'>Branch </span></td>
						<td style='
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$branch </span></td>
						
					</tr>
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial, verdana;
						  font-size:9.2px;
						  	font-weight:bold;
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
							border-top:0.5px solid #000000;
							border-bottom:0.5px solid #000000;'><span style='margin-left:5px;'>Designation </span></td>
						<td style='width:29.5%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    
									border-top:0.5px solid #000000;
									border-bottom:0.5px solid #000000;'><span style='margin-left:5px;'>$designation </span></td>
									<td style='width:1%; border-bottom:#000000 0.5px solid;'>
									</td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:9.2px;
								  	font-weight:bold;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
									border-top:0.5px solid #000000;
									border-bottom:0.5px solid #000000; '> <span style='margin-left:5px;'>Department </span></td>
						<td style='
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    
									border-top:0.5px solid #000000;
									border-bottom:0.5px solid #000000;'><span style='margin-left:5px;'>$department </span></td>

					</tr>
					
				</table>
			</td>
		</tr>

		<tr style='width:99.9%;
		           height:15px;
				   margin-bottom:0px;
				     box-shadow:1px 2px 2px #CCC;
					 background-color:#EEE;
					 font-size:14px;
					 text-align:center;
					 font-family:Arial,verdana;
					 text-transform:capitalize;
					 color:#000000;
					 line-height:15px;
					 font-weight:bold;
					 border:#CCC 0.5px solid;'>
			<td colspan='4' style=' text-align:center; border:0.5px solid #000000; height:15px; font-weight:bold;' >Salary Details</td>

		</tr>
		<tr border='0' cellspacing='0' cellpadding='0'>
			<td> 
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
					<tr>
						<td style='width:20%;
							padding-left:1%;
							height:15px;
							line-height:15px;
							font-family:Arial, verdana;
							font-size:9.2px;
							font-weight:bold;
							color:#000000;
							text-transform:capitalize;
							text-align:left;
							float:left;
							text-transform:capitalize;		
							border-right:0.5px solid #000000;
							border-left:0.5px solid #000000;
							border-top:0.5px solid #000000;'
						>
							<span style='margin-left:5px;'>Working Days </span>
						</td>
						<td style='width:29.5%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$workingdays </span></td>
									<td style='width:1%; border-top:#000000 0.5px solid;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:9.2px;
								  font-weight:bold;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
									border-top:0.5px solid #000000;margin-left:12px;'><span style='margin-left:5px;'>Payment Method </span></td>
						<td style='
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$paymentmethod </span></td>
						
					</tr>
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial, verdana;
						  font-size:9.2px;
						  	font-weight:bold;
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
						    border-bottom:0.5px solid #000000;
							border-top:0.5px solid #000000;'><span style='margin-left:5px;'>Bank Name </span></td>
						<td style='width:29.5%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$bankcode </span></td>
									<td style='width:1%; border-bottom:#000000 0.5px solid;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:9.2px;
								 font-weight:bold; 	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000; margin-left:12px;'><span style='margin-left:5px;'>Bank Account Number </span></td>
						<td style='
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000;'><span style='margin-left:5px;'>$bankaccountnumber </span></td>
						
					</tr>
				</table>
			</td>
		</tr>
		<tr border='0' cellspacing='0' cellpadding='0'>
			<td> 
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
					<tr style='height:15px;
						box-shadow:1px 2px 2px #CCC;
						background-color:#EEE;
						font-size:14px;
						text-align:center;
						font-family:verdana;
						text-transform:capitalize;
						color:#000000;
						line-height:15px;
						font-weight:bold;
						border:0.5px solid #000000;'>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial, verdana;
						  font-size:11px;
						  font-weight:bold;
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;
						  border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
						    border-bottom:0.5px solid #000000;
							border-top:0.5px solid #000000;	
							text-align:center;	
						   '>Earnings </td>
						<td style='width:29.5%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:11px;
								  	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;
								  border-right:0.5px solid #000000;
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000;
									text-align:center;			
								   '>Amount </td>
								   <td style='width:1%; background-color:#fff; border-top:0.5px solid #000000; border-bottom:0.5px solid #000000;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:11px;
								 font-weight:bold;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;	
								  border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000;
									text-align:center;		
								  '>Other Adjustments</td>
								  
						<td style='width:29.5%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial, verdana;
								  font-size:11px;
								 font-weight:bold;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;
								  border-right:0.5px solid #000000;
								    text-align:center;
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000;			
								   '>Amount</td>
				
					</tr>	

					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial,verdana;
						  font-size:9.2px;	
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
							'><span style='margin-left:5px;'>Basic Salary </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								   
									'><span>$basicsalary </span></td>
									<td style='width:1%;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial,verdana;		  
								  font-size:9.2px;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								 margin-left:12px;'><span style='margin-left:5px;'>Salary Arrears </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								    
									'><span>$salaryarrears </span></td>
						
					</tr>
			
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial,verdana;		  
						  font-size:9.2px;
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
							'><span style='margin-left:5px;'>Other Allowance </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								    
									'><span>$other </span></td>
									<td style='width:1%;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial,verdana;		  font-size:9.2px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								 margin-left:12px;'><span style='margin-left:5px;'>Bonus </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
						'><span>$bonus </span></td>
					</tr>
			
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial,verdana;		  font-size:9.2px;	
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
						'><span style='margin-left:5px;'>Transportation Allowance </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								    
								'><span>$transport </span></td>
									<td style='width:1%;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial,verdana;		  font-size:9.2px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								 margin-left:12px;'><span style='margin-left:5px;'>Expense claims </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								    
								'><span>$expenseclaims </span></td>
					</tr>
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial,verdana;		  font-size:9.2px;
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
						'><span style='margin-left:5px;'>Housing Allowance </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								    
								'><span>$housingallowance </span></td>
									<td style='width:1%;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial,verdana;		  font-size:9.2px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								 margin-left:12px;'><span style='margin-left:5px;'>Other Payables / Deductions </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								   
								'><span>$otherdeduction </span></td>
						
					</tr>
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial,verdana;		  font-size:9.2px;
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
						'><span style='margin-left:5px;'>Air Fare Allowance </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
								    
								'><span>$airfare </span></td>
									<td style='width:1%;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  font-family:Arial,verdana;		  
								  font-size:9.2px;
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								 margin-left:12px;'><span style='margin-left:5px;'>Adv. Housing Allowance </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   padding-right:5px;
				  
						'><span>$advancehousingallowance </span></td>
				
					</tr>
					<tr>
						<td style='width:20%;
						   padding-left:1%;
						  height:15px;
						  line-height:15px;
						  font-family:Arial,verdana;		  font-size:9.2px;
						  font-weight:bold;
						  background-color:#EEE;		
						  color:#000000;
						  text-transform:capitalize;
						  text-align:left;
						  float:left;
						  text-transform:capitalize;		
						   border-right:0.5px solid #000000;
						    border-left:0.5px solid #000000;
						    border-bottom:0.5px solid #000000;
							border-top:0.5px solid #000000;'><span style='margin-left:5px;'>total earning </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;	
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								   
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000;'><span style='padding-right:5px;'>$totalEarnings </span></td>
									<td style='width:1%; border-top:0.5px solid #000000; border-bottom:0.5px solid #000000;'></td>
						<td style='width:20%;
								   padding-left:1%;
								  height:15px;
								  line-height:15px;
								  background-color:#EEE;
								  font-family:Arial,verdana;		  font-size:9.2px;
								  font-weight:bold;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:left;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-left:0.5px solid #000000;
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000; margin-left:12px;'><span style='margin-left:5px;'>Total additions/deductions </span></td>
						<td style='width:29.5%;
								  height:15px;
								  line-height:15px;
								  font-family:verdana;
								  font-size:9px;		
								  color:#000000;
								  text-transform:capitalize;
								  text-align:right;
								  float:left;
								  text-transform:capitalize;		
								   border-right:0.5px solid #000000;
								    border-bottom:0.5px solid #000000;
									border-top:0.5px solid #000000;
									padding-right:5px;
									'><span style='padding-right:5px;'>$totalAdditions </span></td>
						
					</tr>
			
				</table>
			</td>
		</tr>
		<tr>
		 	<td style='padding-left: 5px; margin-top:6px; height:25px;'><span style='text-align:left;
		 			  margin-left:5px;
		               color:#000000;
					   font-size:11px;
					   font-family:verdana;
					   display:block; font-weight:bold;'>Notes: $instructions </span></td>
		</tr>
	  
		<tr style='margin-top:6px;
		           height:15px;
				   margin-bottom:0px;
				     box-shadow:1px 2px 2px #CCC;
					 background-color:#EEE;
					 font-size:14px;
					 text-align:center;
					 font-family:Arial,verdana;
					 text-transform:capitalize;
					 color:#000000;
					 line-height:15px;
					 font-weight:bold;
					 border:#CCC 0.5px solid;
					 padding:4px 0; text-align:left;'>
		  	<td style='padding-left: 5px; margin-top:6px; height:25px;'>Net Pay: AED $netsalary</td>
		</tr>
	   <tr>
	   		<td style='margin-top:6px; text-align:left;
	   				padding-left: 5px;
	             	padding-top:8px;
	             	padding-bottom:8px;
	               	color:#000000;
				   	font-size:10px;
				   	font-family:Verdana;
				   	font-style:italic;
				   	display:block;'> Note: This is a computer generated statement, hence no signature is required.</td>
		</tr>
	</table>

	</page>";
    ob_clean();
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($content);
    // $mpdf->WriteHTML('<h1>Hello world!</h1>');

    $mpdf->Output();
 }
else
{
	header("Location: payroll.php"); 
	
}




 

?>