<!-- style instant repair view-->
<style>

    /* for instant repairer */

    .instant{
        width: 20em;
        height: auto;
        padding: 1em;
        margin: 1em;   
    }

    .instant p{
        margin: 10px;   
    }

    .instant .i-repairer{
        padding: 1em;
        border: 1px solid gainsboro;    
    }

    .instant .i-repairer:hover{
        box-shadow: 0 0 8px gainsboro;    
    }

    .instant .i-repairer img{
        width: 10em;
        height: 10em;
        border-radius: 50%;   
    }

    .instant .i-repairer button{
        border: 1px solid darkgray; 
        background-color: inherit;
        padding: 5px 10px;
        color: darkslategray;
        margin-bottom: 1em;
    }

    .instant .i-repairer button:hover{    
        border: 1px solid skyblue; 
        color: white;
        background-color: skyblue;
        transition: all 0.50s ease-in-out;
    }

    .below{
        margin-top: 1.5em; 
        margin-bottom: 1em;
    }

    .below button{
        border: 1px solid darkgray; 
        background-color: inherit;
        padding: 5px 10px;
        color: darkslategray;
        margin-bottom: 1em;
    }

    .below button:hover{
        background-color: gainsboro;
        color: black;
        transition: all 0.50s ease-in-out;
    }

    .below p{
        margin: 5px;
    }

    .below p:hover{
        color: dodgerblue;
    }

    .below i{
        color: skyblue;
    }

    .below div{
        cursor: pointer;
    }
    
    #toggle{
        display: none;
    }

</style>

<?php
    

                $sql = "SELECT * FROM users WHERE repairer='2' AND activerepairer='1' ORDER BY RAND() LIMIT 1";

                if(!empty($_GET)){
                    
                    $sql = "SELECT * FROM professionals ORDER BY RAND() LIMIT 1";
                }
                
                $result = $db->query($sql);

                        if(mysqli_num_rows($result) > 0){

                                $row = mysqli_fetch_array($result);
                                  
                                $id = $row['id'];
                                $image = BASE_URL . 'public/uploads/' . $row['image'];
                                $mobile = $row['mobile'];
                                $name = $row['firstname'].' '. $row['lastname'];
                            
                                if(!empty($_GET)){                    
                                    $name = $row['name'];
                                }
                                                                
                                ?>

                                    <center><h3>We've found <?php echo $name; ?></h3></center>

                                    <!-- INSTANT REPAIR -->
                                            <center>
                                                <div class="instant">
                                                    <div class="i-repairer">
                                                        <img src="<?php echo $image; ?>" />
                                                        <div class="details">
                                                            <p><b><?php echo $name; ?></b></p>
                                                            <p>Call: <b><?php echo $mobile; ?></b></p>
                                                            <button>About repairer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>       
                               <?php }else{
                                    echo "<center><h3>There are no instant repairers at the moment</h3></center>";
                                }        
                                
                                ?>             
                                                    
                                                    <center>
                                                        <div class="below">
                                                            <form method="get" action="repairs.php">
                                                                <button type="submit" name="professional" value="<?php echo $id; ?>">Switch to professional repairer</button>
                                                            </form>
                                                            <div onclick="divToggle()">
                                                                <p id="reveal">Show list of repairers</p>
                                                                <i id="icon" class="fa fa-arrow-down fa-lg" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </center>
                            

                





