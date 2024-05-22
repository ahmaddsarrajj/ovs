                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table datatables" id="dataTable-1">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Accepted</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php  
                            while($rowlist = mysqli_fetch_assoc($get_list)) {
                              $sql = "SELECT user.*, register.REGISTERNUM FROM user JOIN register on user.REGISTERID = register.ID where LISTID = ". $rowlist['ID']; // Change 'user' to your actual table name
                              $result = $conn->query($sql);

                              


                              if ($rowlist['ACCEPTED']) {
                            ?>


                                <tr>
                                    <td><?php echo $rowlist['ID']; ?></td>
                                    <td><?php echo $rowlist['NAME']; ?></td>
                                    <td><?php echo $rowlist['COLOR'];?></td>
                                    <td>
                                        <?php
                                          echo "
                                          <span style='green'>Accepted</span>
                                          <a class='ml-2 btn btn-danger' href='../Logic/deleteList.php?listId=".$rowlist['ID']."'>Delete</a>
                                          ";
                                        
                                      ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="nav-item dropdown">
                                            <?php echo  "<a href='#ui-elements".$rowlist['ID']."'
                                                class='dropdown-toggle nav-link' data-toggle='collapse' aria-expanded='false'>"; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19M12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4" />
                                            </svg>
                                            Candidates list
                                            </a>
                                            <?php echo  " <table class='collapse list-unstyled pl-4 w-100' id='ui-elements".$rowlist['ID']."'>";?>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mother Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Big Area</th>
                                    <th>Small Area</th>
                                    <th>Record</th>
                                    <th>Register ID</th>
                                    <?php 

                                                  if ($result->num_rows > 0) {
                                                    
                                                    while($row = $result->fetch_assoc()) {
                                                        // location
                                                        $get_location_query = "SELECT smallarea.NAME AS small_area_name, bigarea.NAME AS big_area_name, record.NAME AS record_name, register.REGISTERNUM 
                                                        FROM user
                                                        JOIN register ON user.REGISTERID = register.ID
                                                        JOIN record ON register.RECORDID = record.ID
                                                        JOIN smallarea ON record.SMALLAREAID = smallarea.ID
                                                        JOIN bigarea ON smallarea.BIGAREAID = bigarea.ID
                                                        WHERE user.ID =". $row['ID']; 

                                                        $get_location = mysqli_query($conn, $get_location_query);
                                                        $location = mysqli_fetch_assoc($get_location);
                                                      echo "
                                                              <tr class='nav-item'>
                                                                <td>".$row['ID']."</td>
                                                                <td>".$row['FIRSTNAME']. $row['MIDDLENAME']. $row['LASTNAME']."</td>
                                                                <td>".$row['MOTHERNAME']."</td>
                                                               ";
                                                               if ($row['GENDER'] == 1){
                                                                echo "
                                                                  <td>Female</td>
                                                                ";
                                                              }else {
                                                                echo "<td>Male</td>";
                                                              }
                                                               echo "
                                                                <td>".$row['DOB']."</td>
                                                                <td>". $location['big_area_name']."</td>
                                                                <td>". $location['small_area_name']."</td>
                                                                <td>". $location['record_name']."</td>
                                                                <td>".$row['REGISTERNUM']."</td>
                                                            </tr>
                                                       ";
                                                          }
                                                      } else {
                                                          echo "0 results";
                                                      }

                                                      ?>
                        </table>
                        </span>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>



                        <?php }}?>

                        </tbody>
                        </table>
                    </div>
                </div>

                <div class="card shadow mt-4">
                    <div class="card-body">
                        <table class="table datatables" id="dataTable-1">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Accepted</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php  
                                mysqli_data_seek($get_list, 0);
                            while($rowlist = mysqli_fetch_assoc($get_list)) {
                                
                              $sql = "SELECT * FROM user where LISTID = ". $rowlist['ID']; // Change 'user' to your actual table name
                              $result = $conn->query($sql);

                              // location
                              $get_location_query = "SELECT smallarea.NAME AS small_area_name, bigarea.NAME AS big_area_name, record.NAME AS record_name
                              FROM user
                              JOIN register ON user.REGISTERID = register.ID
                              JOIN record ON register.RECORDID = record.ID
                              JOIN smallarea ON record.SMALLAREAID = smallarea.ID
                              JOIN bigarea ON smallarea.BIGAREAID = bigarea.ID
                              WHERE user.ID =". $user['ID']; 

                              $get_location = mysqli_query($conn, $get_location_query);
                              $location = mysqli_fetch_assoc($get_location);


                              if ($rowlist['ACCEPTED']==0) {
                            ?>


                                <tr>
                                    <td><?php echo $rowlist['ID']; ?></td>
                                    <td><?php echo $rowlist['NAME']; ?></td>
                                    <td><?php echo $rowlist['COLOR'];?></td>
                                    <td>
                                        <?php
                                          echo"
                                            <a class='btn btn-secondary' href='../Logic/acceptllist.php?list_id=".$rowlist['ID']."'>Accept</a>
                                            <a class='btn btn-danger' href='../Logic/deleteList.php?listId=".$rowlist['ID']."'>Reject</a>
                                             ";
                                        
                                      ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="nav-item dropdown">
                                            <?php echo  "<a href='#ui-elements".$rowlist['ID']."'
                                                class='dropdown-toggle nav-link' data-toggle='collapse' aria-expanded='false'>"; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19M12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4" />
                                            </svg>
                                            Candidates list
                                            </a>
                                            <?php echo  " <table class='collapse list-unstyled pl-4 w-100' id='ui-elements".$rowlist['ID']."'>";?>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mother Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Big Area</th>
                                    <th>Small Area</th>
                                    <th>Record</th>
                                    <th>Register ID</th>
                                    <?php 

                                                  if ($result->num_rows > 0) {
                                                    
                                                    while($row = $result->fetch_assoc()) {
                                                      echo "
                                                              <tr class='nav-item'>
                                                                <td>".$row['ID']."</td>
                                                                <td>".$row['FIRSTNAME']. $row['MIDDLENAME']. $row['LASTNAME']."</td>
                                                                <td>".$row['MOTHERNAME']."</td>
                                                               ";
                                                               if ($row['GENDER'] == 1){
                                                                echo "
                                                                  <td>Female</td>
                                                                ";
                                                              }else {
                                                                echo "<td>Male</td>";
                                                              }
                                                               echo "
                                                                <td>".$row['DOB']."</td>
                                                                <td>". $location['big_area_name']."</td>
                                                                <td>". $location['small_area_name']."</td>
                                                                <td>". $location['record_name']."</td>
                                                                </tr>
                                                       ";
                                                          }
                                                      } else {
                                                          echo "0 results";
                                                      }

                                                      ?>
                        </table>
                        </span>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>



                        <?php }}?>

                        </tbody>
                        </table>
                    </div>
                </div>