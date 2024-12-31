<?php
require('database_conn.php');
$sid=$_GET['id'];
?>
<html>
    <head>
        <style>
            .invoice_body{
                height:auto;
                width:50%;
                border:1px solid black;
            }
            .customer_Details{

                width:auto;
                text-align:right;
                float:right;
                font-size:20px;
                padding:5px;
                margin:10px;  
            } 
            .details_table{
                height:auto;
                width:auto;
                margin:15px;
                margin-top:200px;
                padding:10px;
                
            }
            th{
                font-size:20px;
                text-align:center;
                background-color: lightgray;
            }
            td{
                text-align:center;
            }
            tr{
                border-bottom:1px solid gray;
                
            }
            th,td{
                padding:10px;
            }
            table{
                border-collapse:collapse;
                width:100%;
                border-spacing:0;
                
                
            }
            .total{
                text-align:right;
                font-size:20px;
                font-weight:bold;
                margin-right:50px;
            }
            .heading{
                text-align:center;
            }
            .invoice{
                text-align:center;
                text-decoration: underline;
            }
            .date{
                font-size:20px;
                padding-left:10px;
                margin-top:20px;
                text-align:left; 
            } 
           .no{
                
                margin:10px; 
                width:auto;
                height:auto;
                text-align:left;
            } 
            .incus{
                border:1px solid black;
                height:auto;
                margin:10px;
            }
            .img{
                padiing:10px;
                width:100%;
                border-bottom:1px solid lightgray;
                
                
            }
            .company_info{
                width:50%;
                float:right;
                text-align:right;
            }
            
        </style>
		<script>
  function printDiv() {
    // Get the div element to be printed
    var printContents = document.getElementById("printThis").innerHTML;
    // Create a new window for printing
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
		</script>
    </head>
            <body>
           
                <div class="invoice_body" id="printThis">
                    <div class="invoice">
                        <h2>INVOICE</h2>
                        <h3>Amita Furnishing and Mattresses</h3>
                    </div>
                    <div class="img">
                        <img src="amita_logo.jpg" height="20%" width="50%" >
                    <div class="company_info">
                        
                        <p>A-7, Sahaj Platinum, Sneh Plaza, Chandkheda, Ahmedabad.</p>
                        <p>contact : 9624573883</p>
                        <p>email: amitafurnishing@gmail.com</p>
                    </div>
                    </div>
                         <div class="no">
                            <p class="date"><b>Invoice No.:</b>&nbsp;<?php echo $sid; ?></p>
                            <?php $q="select date from sales where idsales='$sid'";
                            $qres=mysqli_query($conn,$q);
                            $qrow=mysqli_fetch_array($qres);
                            ?>
                            <p class="date"><b>Invoice Date:</b>&nbsp;<?php echo $qrow[0]; ?></p>
                        </div> 
                            
                        <div class="customer_details">
                            <?php
                                $uid=$_GET['uid'];
                                $sql1="select * from user where iduser='$uid'";
                                $res1=mysqli_query($conn,$sql1);
                                $row1=mysqli_fetch_array($res1);
                                echo "<u><b>Bill TO.</b></u><br>";
                                echo $row1[1]."<br>";
                                echo $row1[2]."<br>";
                                echo $row1[3]."<br>";
                                echo $row1[4]."<br>";
                            ?>
                        
                        </div>
                    
                    <div class="details_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Description</th>
                                    <th>QTY</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <?php
                             
                            $sql2="select * from sales where user_iduser='$uid'";
                            $res2=mysqli_query($conn,$sql2);
                            $total = 0;
                           
                                $sql3="select * from sales_details where sales_idsales='$sid'" ;
                                $res3=mysqli_query($conn,$sql3);
                                while($row3=mysqli_fetch_array($res3))
                                {
                                    
                                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row3['product_idproduct'];?></td>
                                    <?php
                                    $pid=$row3['product_idproduct'];
                                    $sql4="select * from product where idproduct='$pid'";
                                    $res4=mysqli_query($conn,$sql4);
                                    while ($row4 = mysqli_fetch_array($res4)) 
                                    {
                                        $a = $row4['price'] * $row3['qty'];
                                        $dis=$row4['offer_idoffer'];
                                        $sql5="select discount from offer where idoffer='$dis'";
                                        $res5=mysqli_query($conn,$sql5);
                                        $row5=mysqli_fetch_array($res5);
                                        $discount=$row5[0];
                                        $disamount=$a*$discount/100;
                                        $amount=$a-$disamount;
                                        $total = $total + $amount;
                                                                           
                                    
                                    ?>
                            
                                    <td><?php echo $row4['name'];?></td>
                                    <td><?php echo $row3['qty'];?></td>
                                    <td><?php echo $row4['price'];?></td>
                                    <td><?php echo $amount;?></td>
                                </tr>
                            </tbody>
                            <?php
                                    }
                                }                            
                        
                            ?>
                            
                        </table>
                        <p class="total">Total Amount:&nbsp;&nbsp; <?php echo $total;?> </p>

                    </div>

                </div>
				<button onclick="printDiv()">Print</button>
            </body>
</html>
