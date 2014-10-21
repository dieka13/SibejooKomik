
        <div class="row">
        	<div class="large-12 column">
            	<table class="full-width">
                	<thead>
                    	<?php 
							foreach($columns as $c)
							{
								echo"<th>$c</th>";
							}
						?>
                    </thead>
                    <tbody>
                    	<?php
							$count = count($columns);
							
							
							foreach($artworks as $a)
							{
								echo "<tr>";
								
								for($i = 0; $i < $count; $i++)
								{
									echo "	<td>";
									$col = $columns[$i];
									echo $a[$col];
									echo "	</td>";
								}
								echo "</tr>";
							}
							
						?>
                    </tbody>
                </table>

            </div>
        </div>
        
    </div>
  </div> 