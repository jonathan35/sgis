<?
		
		
	
	$order_set_query=mysqli_query($conn, "select * from inquiry_log where id='".$_GET['id']."' ");
	$order_set=mysqli_fetch_assoc($order_set_query);
	
	//$item_incart_query=mysqli_query($conn, "select * from family_productcart where session_id='".$order_set['session_id']."'");
	//$item_incart=mysqli_fetch_assoc($item_incart_query);



?>

<!--
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>
                        <table width="100%"  border="0" cellspacing="1" cellpadding="0">
          <?php if($item_incart!=''){?>
          <tr>
            <td bgcolor="#E2E2E2">
              <table width="100%"  border="0" align="center" cellpadding="2" cellspacing="1" class="content">
                <tr align="left" valign="bottom" bgcolor="#FFFFFF">
                  <td width="28%"><div align="center"><span class="title">Item</span></div></td>
                  <td width="28%"><div align="center"><span class="title">Product Name </span></div></td>
                  <td width="19%"><div align="center"><span class="title">Qty</span></div></td>
                  <td width="25%"><div align="center"><span class="title">Price</span></div></td>
                </tr>
                <?php do{?>
                <tr align="left" valign="top" bgcolor="#FFFFFF">
                  <td><div align="center">
                      <table width="0"  border="0" cellspacing="1" cellpadding="0">
                        <tr>
                          <td bgcolor="#999999"><table width="0"  border="0" cellspacing="1" cellpadding="0">
                              <tr bgcolor="#FFFFFF">
                                <td width="0"><img src="../product/<?php echo $item_incart['product_photo']?>" alt="" border="0" height="70" width="88" /></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table>
                  </div></td>
                  <td valign="middle"><div align="center"><span class="content1"><?php echo $item_incart['product_name']?> </span></div></td>
                  <td valign="middle"><div align="center"><span class="content1"><?php echo $item_incart['product_quantity']?></span></div></td>
                  <td valign="middle"><div align="center"><span class="content1"><?php echo $total_price = $item_incart['product_quantity'] * $item_incart['product_price']?></span></div></td>
                </tr>
                <?php $qty = $qty +  $item_incart['product_quantity'];
$grand_price = $grand_price + $total_price; 
}while($item_incart=mysqli_fetch_assoc($item_incart_query));?>
                <tr align="left" valign="top" bgcolor="#FFFFFF">
                  <td><div align="center"></div></td>
                  <td bgcolor="#FFFFFF"><div align="center"><span class="subcat">Total</span></div></td>
                  <td bgcolor="#FFFFFF"><div align="center"><span class="subcat"><?php echo $qty?></span></div></td>
                  <td bgcolor="#FFFFFF"><div align="center"><span class="subcat">RM<?php echo $grand_price?> </span></div></td>
                </tr>
            </table></td>
          </tr>
          <?php }else{?>
          <tr>
            <td align="center"><span class="sub_title"> NO ITEN </span></td>
          </tr>
          <?php }?>
      </table>
!-->
<br /><br />
                    </td>
                  </tr>
                                    
                  <tr>
                    <td colspan="2" align="left"><div style="font-size:16px; color:#FFF; background-color:#669; padding:3px 5px 3px 5px; width:100%; font-weight:bold;">Inbound Booking Details</div></td>
                  </tr>
                  
                  
                 <!-- //////////////////////////PART 2//////////////////////////////// -->
                  <tr >
                    <td>
                      <table width="100%" cellpadding="2" cellspacing="2" class="main_title">
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0">Tour Package Name: </td>
                          <td colspan="3"><?php echo $order_set['tour'];?></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0">Title</td>
                          <td><?php echo $order_set['title'];?></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0">Name</td>
                          <td width="359"><?php echo $order_set['name'];?></td>
                          <td width="154">&nbsp;</td>
                          <td width="317">&nbsp;</td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0">Phone Contact<span class="style3"> </span></td>
                          <td colspan="3"><?php echo $order_set['contact'];?></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0"><span class="content">Email</span></td>
                          <td colspan="3"><?php echo $order_set['email02'];?></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0"><span class="content">Country/Nation</span></td>
                          <td><?php echo $order_set['country'];?></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0"><span class="content">No. Of Days For The Trip</span></td>
                          <td><span class="content">
                           <?php echo $order_set['no_days'];?> <?php echo $order_set['day'];?>
                          </span></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0"><span class="content">Children Under 12</span></td>
                          <td> <span class="content">
                            <?php echo $order_set['no_children'];?>
                          </span></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0"><span class="content">Arrive Date</span><span class="content"></span></td>
                          <td> <span class="content">
                            <?php echo $order_set['date02'];?>
                          </span></td>
                          <td>Flight No:</td>
                          <td><span class="content">
                            <?php echo $order_set['flight_no_a'];?>
                          </span></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0"><span class="content">Departure Date</span></td>
                          <td> <span class="content">
                           <?php echo $order_set['date03'];?>
                          </span></td>
                          <td>Flight No:</td>
                          <td><span class="content">
                             <?php echo $order_set['flight_no_d'];?>
                          </span></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0">Preferred Hotel</td>
                          <td> <span class="content">
                            <?php echo $order_set['preferred_hotel'];?>
                          </span></td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="198" height="0"><span class="content">Room Type </span></td>
                          <td colspan="3"><span class="content">
                            <?php echo $order_set['room_type'];?>
                          </span></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0"><span class="content">With Meal</span></td>
                          <td colspan="3"><span class="content">
                            <?php echo $order_set['meals'];?>
                          </span></td>
                        </tr>                        
                        
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0"><span class="content">Intended Time Of Travel (Month/Year)</span> </td>
                          <td colspan="3"><span class="content">
                            <?php echo $order_set['intended'];?>
                          </span></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0"><span class="content">Information Required</span></td>
                          <td colspan="3"><?php echo $order_set['information'];?></td>
                        </tr>
                      </table>
                      
                      
                      <?php //if($order_set['instruction']!='' || $order_set['delivery']!='' || $order_set['payment_method']!=''){?>
                    <!--  <table width="100%" height="0"  border="0" cellpadding="2" cellspacing="1" class="main_title1">
                        <tr>
                    <td colspan="4" align="left"><div style="font-size:16px; color:#FFF; background-color:#669; padding:3px 5px 3px 5px; width:100%; font-weight:bold;">Order Details</div></td>
                    
                        </tr>
                        <tr align="left" valign="top" bgcolor="#E0E0E0">
                          <td height="0" colspan="4"><div align="center"><span class="style7">Payment</span> </div></td>
                        </tr>
                        <tr>
                          <td width="131" height="0" colspan="5" bgcolor="#FEFDE0"><span class="content">Payment Method</span></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td width="333" colspan="5"><span class="content">
                            <?php echo $order_set['payment_method'];?>
                            <br />
                            </span>
                          <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="9%" valign="top"><span class="style41">Note : <br />
                                  </span></td>
                                  <td width="86%"><span class="style41">Please refer to our <a href="payment.php">payment method</a>. </span></td>
                                </tr>
                                <tr>
                                  <td valign="top">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0"><span class="content">Delivery Option</span></td>
                          <td colspan="3"><span class="content">
                            <?php echo $order_set['delivery'];?>
                          </span></td>
                        </tr>
                        <tr align="left" valign="top" bgcolor="#FEFDE0">
                          <td height="0"><span class="content">Special Instruction </span></td>
                          <td colspan="3"><?php echo $order_set['instruction'];?></td>
                        </tr>
                    </table>!-->
                  
                    </td>
                  </tr>
                </table>

