<tr>
						<td  align="center">
						  <ul class="cat">
						  <?php

						     $q="SELECT * FROM `categories` ";
							 $r = $conn->query($q);
							 $i=0;
							 while($row = $r->fetch_assoc()){
 
			?>
                     <li><i class="<?php echo $row['faCode']; ?>" ></i>
 <?php echo $row['CatName']; ?> </li>
			<?php
							 }
			?>
						  </ul>
						</td>
</tr>