<?php
  include 'connect_db.php';

  if (isset($user)) {
    if (isset($_POST['userid'])) {
      $sqltext = "SELECT * FROM messages WHERE fromid=" . $user->id . " AND toid=" . $_POST['userid'] . " UNION ALL SELECT * FROM messages WHERE fromid=" . $_POST['userid'] . " AND toid=" . $user->id . " ORDER BY date;";
      $query = $connection->query($sqltext);

      $sqltext2 = "SELECT name FROM users WHERE id= " . $_POST['userid'] . ";";
      $query2 = $connection->query($sqltext2); 
      $mesuser = $query2->fetch_assoc();
      ?>
      <h2 style="text-align: center;">Messages</h2>
      <table style="width: 100%;">
        <tr>
          <td style="width: 25%"></td>
          <td style="width: 50%">
            <div style="height: 300px; overflow: auto; background-color: #B7F5DD;" class="round">
              <br>
                <table style="width: 100%;">
                  <tr>
                    <th style="border: 1px solid black; width: 50%; text-align: center; border-radius: 8px;">You</th>
                    <th style="border: 1px solid black; width: 50%; text-align: center; border-radius: 8px;"><?php echo $mesuser['name']; ?></th>
                  </tr>
                  <?php 
                    if ($query->num_rows>0) {
                      while ($row = $query->fetch_assoc()) {
                        ?>
                        <tr>
                          <?php
                            if ($row['fromid']==$user->id) {
                              ?>
                              <td style="border: 1px solid black; border-radius: 8px;">
                              <?php echo $row['message']; ?>
                              </td>
                              <td>
                              </td>
                              <?php    
                            }
                            else if ($row['fromid']==$_POST['userid']) {
                              ?>
                                <td>
                                </td>
                                <td style="border: 1px solid black; border-radius: 8px;">
                                <?php echo $row['message']; ?>
                                </td>
                              <?php    
                            }
                          ?>
                        </tr>
                        <?php
                      }
                    }
                  ?>
                </table>
            </div>
          </td>
          <td style="width: 25%"></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <div>
              <form action="addmessage.php" method="POST" style="text-align: center;">
                <textarea name="message" required rows="4" cols="95"></textarea><br>
                <input type="hidden" name="fromid" value= <?php echo "\"" . $user->id . "\"";?>>
                <input type="hidden" name="toid" value= <?php echo "\"" . $_POST['userid'] . "\"";?>>
                <input type="submit" style="float: right;">
              </form>  
            </div>
          </td>
          <td></td>
        </tr>
      </table>

      
      
      <?php
    }
  }
  else {
    header("Location: index.php");
  }

?>