<?php
$connection=mysqli_connect('localhost','root','123456789','mybank');
if(!$connection)
{
    echo "Connection error: ". mysqli_connect_error();
}

//do the query and connect it with the database
$sql="SELECT UserID,UserName,UserEmail,Balance,Time FROM Users ORDER BY UserID";
//do the query and connect it with the database
$sql2="SELECT * FROM Transactions";
$result =mysqli_query($connection,$sql);
$count = mysqli_query($connection,$sql2);
//fetching the resulting rows as an array

$Users=mysqli_fetch_all($result,MYSQLI_ASSOC);
$counter=mysqli_fetch_all($count);
//best practice
//free result from memory
mysqli_free_result($result);
//end connection
mysqli_close($connection); 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class ="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="HomePage.php">
                        <span class =icon><i class="fa fa-institution"></i></span>
                        <span class ="title"> GothamBank</span>
                    </a>

                </li>
                <li>
                    <a href="HomePage.php">
                        <span class =icon><i class="fa fa-home"></i></span>
                        <span class ="title" > Main Page</span>
                    </a>

                </li>

                <li>                             
                    <a href="ViewCostumers.php">
                        <span class =icon> <i class="fa fa-users"></i></i> </span>
                        <span class ="title"> View All Costumers</span>
                    </a>

                </li>
                <li>
                    <a href="ViewTransactions.php">
                        <span class =icon><i class="fa fa-exchange"></i></span>
                        <span class ="title" > View All Transactions</span>
                    </a>

                </li>
                <li>
                    <a href="AddCostumer.php">
                        <span class =icon><i class="fa fa-user"></i></span>
                        <span class ="title" > Add a Costumer</span>
                    </a>

                </li>

                <li>
                    <a href="MakeTransactions.php">
                        <span class =icon> <i class="fa fa-credit-card"></i></span>
                        <span class ="title" >Make a Transaction</span>
                    </a>

                </li>
               

            </ul>

        </div>
    </div>

     <div class="main">
         <div class="topbar">
             <div class="toggle">
                <i class="fa fa-bars"></i>
             </div>   
         </div>
         <div class="cardbox">
              <div class="card">
                  <div>
                      <div class="numbers"> <?php echo count($Users)?></div>
                      <div class="cardName">Number Of Customers</div>
                  </div>
                    <div class="IconBox">
                        <i class="fa fa-user"></i>
                    </div>
              </div>
                        <div class="card">
                            <div>
                                <div class="numbers"> <?php echo count($counter)?></div>
                                <div class="cardName">Transactions</div>
                            </div>
                                <div class="IconBox">
                                    <i class="fa fa-line-chart"></i>
                                </div>
                        </div>

          </div>

          <!--ADD CHARTS-->
          <div class="graphBox">
              
              

          <div class="details">
              <div class="recentCustomers">
                  <div class="cardHeader">
                      <h2>Recent Transactions</h2>
                  </div>

                  <table>
                      <thead class="Head"> 
                          <tr>
                              <td>TransactionID</td>
                              <td>SenderID</td>
                              <td>RecieverID</td>
                              <td>Balance</td>
                              <td>Time</td>
                          </tr>
                      </thead>

                     
                      <tbody>
                      <?php foreach ($count as $counter){ ?>
                          <tr>
                              <td><?php echo $counter['TransactionID']?></td>
                              <td><?php echo $counter['SenderID']?></td>
                              <td><?php echo $counter['RecID']?></td>
                              <td><?php echo $counter['Balance']?></td>
                              <td><?php echo $counter['Time']?></td>
                          </tr>
                          <?php }?>
                          
                      </tbody>
                  </table>
              </div>
            </div>
        
            

     </div>

       
    </script>
    <script>
        let list=document.querySelectorAll('.navigation li');
        let navig=document.querySelector('.navigation');
        let main=document.querySelector('.main');
        let toggle=document.querySelector('.toggle');

        toggle.onclick = function(){
            navig.classList.toggle('active');
            main.classList.toggle('active2');
        }
        function activelink(){
            list.forEach((item) => 
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activelink));
    </script>
    <style>
        *{
    margin:0;
    padding :0;
    box-sizing:border-box;
}
:root{
    --blue:#287bdd;
    --white:#fff;
    --grey:#f5f5f5;
    --black1:#222;
    --black2:#999
}
body{
    overflow-x:hidden;  
}
.container{
    position: relative;
    width:100%;
}
.navigation{
    position:fixed;
    width:300px;
    height:100%;
    background: var(--blue);
    border-left:10px solid var(--blue);
    transition: 0.5s;
    overflow:hidden
}
.active{
    width:80px
}

.navigation ul{
    position:absolute;
    top:0;
    left:0;
    width :100%;
    font-size:18px
}
.navigation ul li{
    position: relative;
    width:100%;
    list-style: none;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    margin-bottom:22px
}
.navigation ul li:hover,
.navigation ul li .hovered
{
    background: var(--white);
}

.navigation ul li:nth-child(1){
    margin-bottom: 50px ;
    pointer-events: none;
}
.navigation ul li a{
    position: relative;
    display: block;
    width: 100%;
    display: flex;
    text-decoration: none;
    color:var(--white);
}

.navigation ul li:hover a,
.navigation ul li .hovered a
{
    color: var(--blue);
}
.navigation ul li a .icon{
    position: relative;
    display: block;
    min-width: 60px;
    height: 60px;
    line-height: 60px;
    text-align: center;
    font-size: 1.75em;
}
.navigation ul li a .title{
    position: relative;
    display: block;
    padding: 0 10px;
    height:  60px;
    line-height: 60px;
    text-align: start;
}
.navigation ul li:hover a::before,
.navigation ul li .hovered a::before
{
    content: '';
    position: absolute;
   right:0;
    width: 50px;
     height: 50px;
     background: transparent; 
    top:-50px;
    border-radius: 50%; 
    box-shadow: 35px 35px 0 10px var(--white);
    pointer-events: none;
}
.navigation ul li:hover a::after,
.navigation ul li .hovered a::after
{
    content: '';
    position: absolute;
   right:0;
    width: 50px;
     height: 50px;
     background: transparent; 
    bottom:-50px;
    border-radius: 50%; 
    box-shadow: 35px -35px 0 10px var(--white);
    pointer-events: none;
}
.main{
    position: absolute;
    width :calc(100%-320px);
    left:320px;
    background: var(--white);
    transition: 0.5s;
}
.topbar{
    width :100%;
    height:60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding :0 10px;
}
.toggle{
    position: relative;
    top:0;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2em;
    cursor: pointer;
}
.active2{
    width :calc(100%-120px);
    left :120px;
}

.cardbox{
    position: relative;
    width: 75%;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(4,1fr);
    grid-gap: 30px;
}

.cardbox .card{
    position: relative;
    background: var(--white);
    padding: 30px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.13);
    display: flex;
    justify-content: space-between;
    border-radius: 30px;
}

.cardbox .card .numbers{
    position: relative;
    font-weight: 500px;
    font-size: 2.5em;
    color: var(--blue);

}

.cardbox .card .cardName{
    color: var(--black1);
    font-size: 1.2em;
    margin-top: 12px;

}

.cardbox .card .IconBox{
    font-size: 2.5em;
    color:var(--black2);
    margin-left: 40px;
}
.cardbox .card:hover{
    background-color: var(--blue);
}

.cardbox .card:hover .numbers,
.cardbox .card:hover .cardName,
.cardbox .card:hover .IconBox{
    color: var(--white);
}
.details{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-gap: 60px;
    margin-top: 10px;
    width:1000px;
}
.details .recentCustomers{
    position: relative;
    display: grid;
    background: var(--white);
    padding: 20px;
    box-shadow: 0px 7px 25px rgba(0, 0, 0, 0.13);
}
.cardHeader{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 50px;
}
.cardHeader h2{
    font-weight: 600;
    color: var(--blue);
}
.btn{
    position: relative;
    padding:  5px 10px;
    background: var(--blue);
    text-decoration: none;
    color: var(--white);
    border-radius: 6px;
    margin-top: 20px;
    transition: 0.5s;
}
.btn:hover{
    background: rgb(5, 5, 117)
}
.details table{
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.details .recentCustomers table thead{
    font-size: 20px;
    font-weight: 700px;
    background: var(--blue);
    color: var(--white);
    border-radius: 15px;
    
}

.details .recentCustomers table thead tr{
    color: var(--white);
    padding: 2px 2px;
    border:1px solid black;
    border-radius: 15px;
}
.details table tr:nth-child(even){
    background-color: #f2f2f2;
}
.details .recentCustomers table{
    border-left: 1px solid rgba(0, 0, 0, 0.13);
    border-right: 1px solid rgba(0, 0, 0, 0.13);
    border-bottom: 1px solid rgba(0, 0, 0, 0.13);
}


.details .recentCustomers table tr{
    color: var(--black1);
    border-bottom: 2px solid rgba(0, 0, 0, 0.13);
}
.details .recentCustomers table tr:last-child{
    border-bottom: none;
}

.details .recentCustomers table tr:hover{
    background: rgba(40,123,221,0.95);
    color: var(--white);
}

.details .recentCustomers table tr td{
    padding: 10px;
}

.details .recentCustomers table tr td{
    text-align: center;
}


</style>
    
</body>
</html>