<div class="span3">
					<div class="sidebar">
						<ul>
							<li><a href="todays-orders.php"> Today's Orders 									
								<?php
								$f1="00:00:00";
								$from=date('Y-m-d')." ".$f1;
								$t1="23:59:59";
								$to=date('Y-m-d')." ".$t1;
								$result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
								$num_rows1 = mysqli_num_rows($result);
								{
								?>
										<b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
											<?php } ?>
												</a>
		                	</li>
							<li>
								<a href="pending-orders.php">
										<i class="icon-tasks"></i>
											Pending Orders
										<?php	
	$status='Delivered';									 
$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Manage users
								</a>
							</li>
						</ul>


						<ul class="widget widget-menu unstyled">
                               
                                <li><a href="insert-product.php"><i class="menu-icon icon-paste"></i>Insert Product </a></li>
                                <li><a href="manage-products.php"><i class="menu-icon icon-table"></i>Manage Products </a></li>
                        
                            </ul><!--/.widget-nav-->
						</ul>
					</ul>
					</li>
	</div><!--/.sidebar-->
				</div><!--/.span3-->
