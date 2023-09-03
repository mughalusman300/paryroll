<?php
	if (!empty($result)) {
		$name=$result['fullname']==NULL ? '-' :$result['fullname'];
		
		$code=$result['employeecode'];
		$bankaccountnumber=$result['bankaccountnumber'];
		$salarymonth=$result['salarymonth'];
		$grosssalary=$result['grosssalary'];
		$basicsalary=$result['basicsalary'];
		$designation=$result['designation']==NULL ?'-':$result['designation'];
		$dateofjoining=$result['dateofjoining'];
		$bonus=$result['bonus'];
		$workingdays=$result['workingdays'];
		$bankcode=$result['bankcode'];
		$transport=$result['transport'];
		$airfare=$result['airfare'];
		$housingallowance=$result['housingallowance'];
		$otherdeduction=$result['otherdeduction'];
		$expenseclaims=$result['expenseclaims'];
		$netsalary=$result['netsalary'];
		$other=$result['other'];
		$paymentmethod=$result['paymentmethod']==NULL?'-':$result['paymentmethod'];
		
		$salaryarrears=$result['salaryarrears'];
		$advancehousingallowance=$result['advancehousingallowance'];
		$otherpayables=$result['otherpayables'];
		
		$totalEarnings=($basicsalary) +($other)+($transport)+($airfare)+($housingallowance);
		
		$totalEarnings=number_format((float)$totalEarnings, 2, '.', '');
		
		$location=$result['location']==NULL ? '-' :$result['location'];
		$branch=$result['branch']==NULL ? '-':$result['branch'];
		$department=$result['department']==NULL ? '-':$result['department'];
		$instructions=$result['instructions']==NULL?'-':$result['instructions'];
		
		$totalAdditions=($salaryarrears)+($bonus)+($expenseclaims)+($otherdeduction)+($advancehousingallowance); 
		
		$totalAdditions=number_format((float)$totalAdditions, 2, '.', '');
		
 	} else {
 		redirect('payroll');
 	}
?>

<style type="text/css">
	* {
	    margin: 0;
	    padding: 0;
	}
	#content {
	    color: #333;
	    font-family: sans-serif, Arial, Helvetica;
	    font-size: 12px;
	    line-height: 18px;
	    margin: 0 auto 0 auto;
	    max-width: 1260px;
	    min-width: 780px;
	    padding: 35px 0px 30px 0px;
	}
.btn2p{ padding:0px 6px;
           height:22px;
     line-height:22px;
           border:1px solid #D3D3D3;
     background-color:transparent;
     /*box-shadow:#D2D2D2 1px 1px 2px;*/
     color:#7E7E7E;
     font-family:Verdana, Geneva, sans-serif;
     font-size:12px;
     font-weight:700;
     text-align:center;
     margin:12px 10px 0 0px;
     border-radius:5px;
     float:right;
     cursor:pointer;
     
}
.btn2p:hover{background-color:#DBDBDB;
color:#FFFFFF;
}

.con89{width:100%;
          
           height:auto;
		  margin:auto;
}
.con89x{width:100%;
           height:auto;
		   float:left;
		   border-radius:5px;
		   
		  
		 
		  
}
.ro1{width:100%;
           height:20px;
		   float:left;
		  
		    border-bottom:#999 solid 1px;
			border-top:#999 solid 1px;
			 background-color:#EEE;
}
.ro4{width:100%;
          /* height:20px;*/
		 
		   float:left;
		  /* margin-bottom:6px;
		     box-shadow:1px 2px 2px #CCC;*/
			/* background-color:#CCC;*/
			 border-top:#999 1px solid; 
}
.ro12{width:100%;
           height:30px;
		   float:left;
		   margin-bottom:0px;
		     box-shadow:1px 2px 2px #CCC;
			 background-color:#EEE;
			 font-size:14px;
			 text-align:center;
			 font-family:Helvetica, sans-serif;
			 text-transform:capitalize;
			 color:#333;
			 line-height:30px;
			 font-weight:bold;
			 
}
.ro13{width:100%;
 padding-left:1%;
           height:40px;
		    line-height:40px;
		   float:left;
		   margin-bottom:0px;
		    
			 background-color:#EEE;
			 font-size:14px;
			 text-align:left;
			 font-family:Arial, Helvetica, sans-serif;
			 color:#333;
			 font-weight:bold;
			 text-transform:capitalize;
			 	
				
			 
}
.ro2x{width:100%;
          /* height:18px;*/
		  height:auto;
		   float:left;
		 /*  margin:3px 0;*/
		 
		  
}
.ro3x{width:100%;
          /* height:18px;*/
		  height:auto;
		   float:left;
		/*   margin:3px 0;*/
		    
}
.ro2{width:100%;
           height:25px;
		   float:left;
		   margin:3px 0;
		     box-shadow:1px 2px 2px #CCC;
}
.style2a{;
           width:29%;
		   padding-left:1%;
		  height:20px;
		  line-height:20px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:14px;
		  font-weight:bold;
		  color:#333;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		   border-right:1px #999999 solid;
}
.style2a2{;
           width:30%;
		   padding-left:1%;
		  height:20px;
		  line-height:20px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:14px;
		  font-weight:bold;
		  color:#333;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
      display:block;
		  
}
.styleca{
	white-space:nowrap;
           width:20%;
		  height:25;
		  line-height:25px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:80%;
		
		  color:#333333;
		  font-weight:900;
		  text-transform:capitalize;
		  text-align:center;
		  float:left;
		    background-color:#E8E8E8;
		   border-right:1px #999999 solid;
		
}
.styleca33{ 
           width:35%;
		  height:inherit;
		  line-height:18px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:90%;
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:center;
		  float:left;
		 border-right:1px #999999 solid;
		  box-shadow:1px 1px 1px #CCCCCC;
		 
}
.styleca2{ 
           width:29%;
		   padding-left:1%;
		  height:22px;
		  line-height:22px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:12px;
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		 border-right:1px #999999 solid;
		 border-top:1px #999999 solid;
		
		
		 
}
.styleca22{ 
           width:30%;
		  padding-left:1%;
		  height:22px;
		  line-height:18px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:12px;
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		  border-top:1px #999999 solid;
		 
		
		 
	
}
.styleca22right{ 
          width:30.5%;
		   padding-right:1%;
		  height:18px;
		  line-height:18px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:12px;
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:right;
		  float:left;
		  border-top:1px #999999 solid;
		
		 
	
}
.styleca2right{ 
           width:27.8%;
		   padding-right:1%;
		  height:18px;
		  line-height:18px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:12px;
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:right;
		  float:left;
		 border-right:1px #999999 solid;
		 border-top:1px #999999 solid;
		
		 
}

.style2b{
           width:10%;
		  height:20px;
		  line-height:20px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:14px;
		  font-weight:bold;
		  color:#333;
		  text-transform:capitalize;
		  text-align:center;
		  float:left;
		  border-right:1px #999999 solid;
		 
}
.stylecb{
           width:10%;
		  height:18px;
		  line-height:18px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:12px;
	
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:center;
		  float:left;
		   border-right:1px #999999 solid;
}
.style2b2{
           width:20%;
		   padding-left:1%;
		  height:20px;
		  line-height:20px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:14px;
		  font-weight:bold;
		  color:#333;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		   
			border-right:1px #999999 solid;
			border-left:1px #999999 solid;
}
.style2c2{
           width:20%;
		   padding-left:1%;
		  height:22px;
		  line-height:22px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:12px;
		  font-weight:700;
		
		  color:#000000;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		  text-transform:capitalize;
		
		   border-right:1px #999999 solid;
		    border-left:1px #999999 solid;
			border-top:1px #999999 solid;
		   
}
.style2c{
          width:13%;
		  height:20px;
		  line-height:20px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:85%;
		  font-weight:900;
		  color:#333;
		  text-transform:capitalize;
		  text-align:center;
		  float:left;
		 
}
.style2d1{
           width:14.7%;
		  height:25px;
		  line-height:25px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:80%;
		  font-weight:900;
		  color:#000000;
		  text-transform:capitalize;
		  text-align:center;
		  float:right;
		   background-color:#E8E8E8;
		     border-left:1px #999999 solid;
			
		   
}
.tbover{width:100%;
     height:auto;
	 float:left;
	 border:1px #999999 solid;
}
.style2yy{
           width:20%;
		   padding-left:1%;
		  height:22px;
		  line-height:22px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:12px;
		  font-weight:normal;
		
		  color:#000000;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		  text-transform:capitalize;
		
		   border-right:1px #999999 solid;
		    border-left:1px #999999 solid;
			
			 
			
		   
}
.styleyy{ 
           width:29%;
		   padding-left:1%;
		  height:22px;
		  line-height:22px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:12px;
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		 border-right:1px #999999 solid;
		
		
		
		 
}
.styleyz{ 
           width:29%;
		   padding-left:1%;
		  height:22px;
		  line-height:22px;
		  font-family:Arial, Helvetica, sans-serif;
		  font-size:12px;
		  color:#3E3E3E;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		 border-right:1px #999999 solid;
		 background-color:#FFF;
		
		
		
		 
}
.style2yz{
           width:20%;
		   padding-left:1%;
		  height:22px;
		  line-height:22px;
		  font-family:Arial, Helvetica, 
		  sans-serif;
		  font-size:12px;
		  font-weight:700;
		
		  color:#000000;
		  text-transform:capitalize;
		  text-align:left;
		  float:left;
		  text-transform:capitalize;
		
		   border-right:1px #999999 solid;
		    border-left:1px #999999 solid;
			 background-color:#EEE;
			
			 
			
		   
}
.style32{ text-align:center;
               padding:2px 0;
			   color:#666;
			   font-family:Arial, Helvetica, sans-serif;
			   font-size:14px;
			   text-transform:capitalize;
			   line-height: 22px;
}
.style32 span{font-weight:bold;color:#333;
font-size:22px;
display:block;
}
.style32c{text-align:left;
             padding:8px 0;
               color:#333;
			   font-size:13px;
			   font-family:Arial, sans-serif;
			   display:block;
}
.style32c span{padding-right:6px;
font-weight:bold;
}


@media print
{
a {
        display:none;
    }
    
body * { visibility: hidden; }
.donotprint {
	display: none;
}

    
.con89 * { visibility: visible; }
.con89 { position: absolute; top: 40px; }

}



</style>
<script type="text/javascript">
$(function() {
	
	$("#print").click(function(){
		//alert("im here");
		window.print();
	});
	$("#ulpaymanagement").addClass("current");
});
</script> 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">





<div class="con89">
   <div class="con89x">
   <div class="style32" style="text-align: left; border-left:1px #999999 solid; border-top:1px #999999 solid; border-right:1px #999999 solid;">
   <span style="font-size: 16px; margin: 5px;">Private & Confidential</span>
</div>
   <div class="style32" style="border-left:1px #999999 solid; border-right:1px #999999 solid;">
   <span>United Arab Emirates</span>
Phone: +971 4 81 81 733 | Fax: +971 4 81 81 777</div>
    <div class="ro13" style="border:1px #999999 solid;">pay slip for month of <?php echo $salarymonth;?>
    	<!-- <a href="#" target="_blank" style="text-decoration: none;"> -->
    	<a href="<?= URL?>payroll/salary_pdf/<?= $id; ?>" target="_blank" style="text-decoration: none;">
    	<div class="donotprint btn2p">PDF</div>
    	</a>
    	<div id="print" class="donotprint btn2p" style="margin-right:3px;">Print</div>
    	
    </div>
    <div style="width: 1px; height: 2px;  float:left;"></div>
    
  
   <div class="tbover">
   <div class="ro12">employee details</div>
      
      <div class="ro2x">
      <div class="style2c2" style="border-left:none;">employee code</div>
         <div class="styleca2" ><?php echo $code;?></div>
          <div class="style2c2" 
          style="margin-left:1%;">Location</div>
          <div class="styleca22" ><?php echo $location;?></div>
      
        
      </div>
      <div class="ro2x">
      <div class="style2c2" style="border-left:none;">Name</div>
         <div class="styleca2" ><?php echo $name;?> </div>
           <div class="style2c2"
          
          style="margin-left:1%;">Branch</div>
      
         <div class="styleca22"><?php echo $branch;?> </div>
      </div>
      
      <div class="ro2x">
      <div class="style2c2" style="border-left:none;">Designation</div>
         <div class="styleca2" ><?php echo $designation;?>  </div>
         <div class="style2c2"
          
          style="margin-left:1%;">Department</div>
      
         <div class="styleca22"><?php echo $department;?> </div>
      </div>
      
     
      </div>
       <div style="width: 1px; height: 2px;  float:left;"></div>
       <div class="tbover">
        <div class="ro12">salary details</div>
        
        <div class="ro2x">
      <div class="style2c2" style="border-left:none;">Working Days</div>
         <div class="styleca2" ><?php echo $workingdays;?></div>
         <div class="style2c2"
          
          style="margin-left:1%;">Payment Method</div>
          <div class="styleca22" ><?php echo $paymentmethod;?></div>
      
        
      </div>
      <div class="ro2x">
      <div class="style2c2" style="border-left:none;">Bank Name</div>
         <div class="styleca2" ><?php echo $bankcode;?></div>
          <div class="style2c2 " style="margin-left:1%;">Bank Account Number</div>
          <div class="styleca22" ><?php echo $bankaccountnumber;?></div>
      
        
      </div>
   </div>
        
     
      <div style="width: 1px; height: 2px;  float:left;"></div>
       <div class="tbover">
      <div class="ro1" style="border-top: none;">
         <div class="style2b2" style="border-left:none; text-align: center;">earnings </div>
         <div class="style2a" style="text-align: center;">
           amount
         </div>
         <div class="style2b2" style="margin-left:1%; text-align: center;">Other Adjustments</div>
         <div class="style2a2" style="text-align: center;">
           amount
         </div>
      </div>
      
      
      
       <div class="ro3x">
      <div class="style2yy" style="border-left:none;">Basic Salary</div>
         <div class="styleyy" style="text-align: right; padding-right: 5px;" ><?php echo $basicsalary;?></div>
          <div class="style2yy" style="margin-left:1%;">Salary Arrears</div>
          <div class="styleyy"  style="border-right:none; width:30%; padding-right: 5px; text-align: right;"><?php echo $salaryarrears;?></div>
      </div>
      
      <div class="ro3x">
      <div class="style2yy" style="border-left:none; padding-right: 5px;">Other Allowance</div>
         <div class="styleyy" style="text-align: right; padding-right: 5px;" ><?php echo $other;?></div>
         <div class="style2yy" style="margin-left:1%;">Bonus</div>
          <div class="styleyy" style="border-right:none; width:30%; padding-right: 5px; text-align: right;" ><?php echo $bonus;?></div>
      </div>
      
      <div class="ro3x">
      <div class="style2yy" style="border-left:none;">Transportation Allowance</div>
         <div class="styleyy" style="text-align: right; padding-right: 5px;" ><?php echo $transport;?></div>
         <div class="style2yy" style="margin-left:1%;">Expense claims</div>
          <div class="styleyy"  style="border-right:none; width:30%; padding-right: 5px; text-align: right;"><?php echo $expenseclaims;?></div>
      </div>
      
      <div class="ro3x">
      <div class="style2yy" style="border-left:none;">Housing Allowance</div>
         <div class="styleyy" style="text-align: right; padding-right: 5px;" ><?php echo $housingallowance;?></div>
          <div class="style2yy" style="margin-left:1%;">Other Payables / Deductions</div>
          <div class="styleyy"  style="border-right:none; width:30%; text-align: right; padding-right: 5px;"><?php echo $otherdeduction;?></div>
      </div>
       <div class="ro3x">
      <div class="style2yy" style="border-left:none;">Air Fare Allowance</div>
         <div class="styleyy" style="text-align: right; padding-right: 5px;" ><?php echo $airfare;?></div>
          <div class="style2yy" style="margin-left:1%;">Advance Housing Allowance</div>
          <div class="styleyy"  style="border-right:none; width:30%; text-align: right; padding-right: 5px;"><?php echo $advancehousingallowance;?></div>
      </div>
      
      <div class="ro4">
      <div class="style2yz" style="border-left:none;">total earning</div>
       <div class="styleyz" style="text-align: right; padding-right: 5px;" ><?php echo $totalEarnings;?></div>
       <div class="style2yz" style="margin-left:1%;">Total additions / deductions</div>
      <div class="styleyz" style="border-right:none; width:30%; text-align: right; padding-right: 5px;" ><?php echo $totalAdditions;?></div>
      </div>
      
      </div>
      
   
   </div>
   <div class="style32c" style="line-height:20px;">
   
   <span>Notes: </span><?php echo $instructions;?></div>
   <div class="ro13" style="font-size:16px;">Net Pay: AED <?php echo $netsalary;?></div>
   <div class="style32c" style="font-style:italic;margin-top:6px; line-height: 20px;">Note: This is a computer generated statement, hence no signature is required.</div>


</div>

</div>