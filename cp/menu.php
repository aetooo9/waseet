              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['UserName']; ?></h5>
				
				  <h6 class="centered"></h6>
				 
				   <li class="sub-menu">
                      <a href="Suppliers.php" <?php if($PageId==1) echo "class='active'" ?>>
                          <i class="fa fa-cogs"></i>
                          <span>ادخال الموردين</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a  href="Imports.php" <?php if($PageId==2) echo "class='active'" ?>>
                          <i class="fa fa-cogs"></i>
                          <span>ادخال الواردات</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a  href="Accounts.php" <?php if($PageId==3) echo "class='active'" ?>>
                          <i class="fa fa-cogs"></i>
                          <span>ادخال الحسابات</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a  href="changePassword.php" <?php if($PageId==4) echo "class='active'" ?>>
                          <i class="fa fa-key"></i>
                          <span>تعديل كلمة المرور</span>
                      </a>
                  </li>

              </ul>
