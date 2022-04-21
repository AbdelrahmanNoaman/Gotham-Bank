<?php
$connection=mysqli_connect('localhost','root','123456789','mybank');
if(!$connection)
{
    echo "Connection error: ". mysqli_connect_error();
}

$sql="SELECT * FROM users ORDER BY UserID";
$result =mysqli_query($connection,$sql);
$Users=mysqli_fetch_all($result,MYSQLI_ASSOC);

$SenderID=$RecID=$Balance='';
$errors=array('S'=>'','RecID'=>'','Balance'=>'');
if(isset($_GET['submit']))
{
  if(empty($_GET['SenderID']))
  {
    $errors['S']="SenderID is required <br/>";
    echo "SenderID is required <br/>";
  }
  else
  {  
      $SenderID=$_GET['SenderID'];
  } 
  if(empty($_GET['RecID']))
  {
    $errors['RecID']="RecID is required <br/>";
  }
  else
  {  
      $RecID=$_GET['RecID'];
  } 

  if($SenderID==$RecID)
  {
    $errors['RecID']="Sender and reciever ID are the same";
    $errors['S']="Sender and reciever ID are the same";
  }


    if(empty($_GET['Balance']))
    {
      $errors['Balance']="Balance is required <br/>";
      echo"Balance is required <br/>";
    }
    else
     { $Balance=$_GET['Balance'];
      if(!preg_match('/^[0-9]*$/',$Balance))
      $errors['Balance']='Balance must be a Number';
     }  
     if(!array_filter($errors))
     {
    $SenderBalance="SELECT Balance FROM users Where UserID=$SenderID ";
    $result1=mysqli_query($connection,$SenderBalance);
    $FinalSenderBalance=mysqli_fetch_assoc($result1);

     if($FinalSenderBalance['Balance']<$Balance)
     {
        $errors['S']="Sorry Your balance isn't enough";
     }
    }
     if(!array_filter($errors)){

        $UpdatingSQl1="Update Users set Balance=Balance-$Balance where UserID=$SenderID";
        mysqli_query($connection,$UpdatingSQl1);
        $UpdatingSQl2="Update Users set Balance=Balance+$Balance where UserID=$RecID";
        mysqli_query($connection,$UpdatingSQl2);
        $InsertingInTransaction="INSERT INTO transactions(SenderID,RecID,Balance) values ($SenderID,$RecID,$Balance)";
        $result=mysqli_query($connection,$InsertingInTransaction);

      header('Location: ViewCostumers.php');



     }

}

//best practice
//free result from memory



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
    </div>

                      

          <!--ADD CHARTS-->
          <div class="graphBox">
              
              

          <form action="MakeTransactions.php" class="white" method="GET">  

         <div class="details">
              <div class="recentCustomers">
                  <div class="cardHeader">
                      <h2>Make a Transaction</h2>
                  </div>

    <div class="BigContainer">
        <div class="leftDiv">
                  <div class="containerss">
                      <h3> SenderID</h3>
                  </div>
                  
 
                <div class="select-box">
                      
                <select name="SenderID">
                    <option value="" selected disabled>Select The Sender</option>
                    <?php foreach($Users as $MenuUsers):?>
                        <option value="<?php echo $MenuUsers['UserID'];?>"><?php echo $MenuUsers['UserID']. " - " .$MenuUsers['UserName']?></option>
                    <?php  endforeach; ?>
                </select>
                <br>
                <div class="redText">
                    <?php echo $errors['S'] ?>
                </div>
                </div>
                
              
               
                  
        </div>   
        <div class="RightDiv">
                  <div class="containerss">
                      <h3> RecieverID</h3>
                  </div>
                  <div class="select-box2">
                  <select name="RecID">
                    <option value="" selected disabled>Select The Reciever</option>
                    <?php foreach($Users as $MenuUsers):?>
                        <option value="<?php echo $MenuUsers['UserID'];?>"><?php echo $MenuUsers['UserID']. " - " .$MenuUsers['UserName']?></option>
                    <?php endforeach; ?>
                </select>
                <br>
            
                <div class="redText">
                    <?php echo $errors['RecID']?>
                </div>
               
        </div>

       </div>
       <div class="MostRightDiv">
                  <div class="containerss">
                      <h3> Balance</h3>
                  </div>

                  <div class="select-box2">
                     
                       <input type="number" name ="Balance" class="SpecialOnne"placeholder="    Balance"value="<?php echo$Balance?>">
                       <br>
               
                       <div class="redText">
                    <?php echo $errors['Balance']?>
                           </div>
                       
                  </div>

       </div>
      
    </div>
          


            </div>
            </div>
            <div class="Button">
          <input type="submit" name="submit" value="submit" class="SpecialBtn";>
          </div>
          </form>   

          </div>

          <script>
        const selected=document.querySelector(".selected");
        const optionsContainer=document.querySelector(".options-container");
        const optionsList=document.querySelectorAll(".option");
        const selected2=document.querySelector(".selected2");
        const optionsContainer2=document.querySelector(".options-container2");
        const optionsList2=document.querySelectorAll(".option2");
        selected.addEventListener("click",() => {
            optionsContainer.classList.toggle("activvv");
        });
        selected2.addEventListener("click",() => {
            optionsContainer2.classList.toggle("activvv");
        });
        optionsList.forEach(option =>{
            option.addEventListener("click",()=> {
                selected.innerHTML=option.querySelector("label").innerHTML;
                optionsContainer.classList.remove("activvv"); 
            })
        });
        optionsList2.forEach(option2 =>{
            option2.addEventListener("click",()=> {
                selected2.innerHTML=option2.querySelector("label").innerHTML;
                optionsContainer2.classList.remove("activvv"); 
            })
        });
       
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
.SpecialOnne{
    text-align:center;
}
.RightDiv{
    margin-left:50px;
}
.redText{
    font-size:15px;
    color:red;
}
body{
    overflow-x:hidden;  
}
h3{
    font-size:22px;
    font-weight:600
}
.BigContainer{
    display:flex;
    flex-direction:row;
   color: var(--blue);
}
.container{
    position: relative;
    width:100%;
}
.recent{
    display:flex;
    flex-direction:row;
    color: var(--blue);
}
.containerss{
    margin-top:60px;
    padding :32px;
    text-align:left;
    font-weight:300;
}
.select-box .options-container.activvv{
    max-height:150px;
    opacity:1 !important;
    overflow-y:scroll;
}
.select-box2 .options-container2.activvv{
    max-height:150px;
    opacity:1 !important;
    overflow-y:scroll;
    z-index:250;
}
.select-box{
    display:flex;
    width:200px;
    flex-direction:column;
    height:550px;
}
.Button{
    position:absolute;
    top:65%;
    left:50%;
    width:500px;
    z-index:0;
    
}
.SpecialBtn{
    border-radius:10px;
    width:100px;
    height:50px;
    text-align:Center;
    border:1px solid rgba(0,0,0,0);
    background-color:#287bdd;
    font-size:18px;
    transition:1s;
    margin-left:35px;
    color:white;
}

.SpecialBtn:hover{
    background-color: rgb(5, 5, 117);

}

.select-box2{
    display:flex;
    width:200px;
    flex-direction:column;
    height:550px;
}

select{
    padding :8px 12px;
    background:#2f3640;
    color:#f5f6fa;
    border: 1px solid #dddddd;
    cursor:pointer;
    border-radius:5px;
    width:200px;
    max-height:100px;
    overflow-y:scroll;

}
select:focus,select:hover{
    outline:none;
    border:1px solid #bbbbbb;
}
option{
    background:#2f3640;
    color:#f5f6fa;
}

.MostRightDiv{
    margin-left:40px;
}
.select-box label{
    cursor:pointer;
}
.select-box2 .option2 .radio{
    display:none;
}
.select-box2 .option2,
.selected2 {
padding :12px 24px;
cursor:pointer;
}
select-box2 .option2:hover{
    background :#414b57;
}
.select-box2 label{
    cursor:pointer;
}
.select-box .option .radio{
    display:none;
}
.firstIcon{
    position:absolute;
    top:27.5%;
    left:25%;
    color:white;
    font-size:30px;
    transition:0.5s;
    cursor:pointer;
}
input{
    border-radius:20px;
    width:200px;
    height:40px;
    border:1px solid rgba(0,0,0,0.6);
    

}
.SecondIcon{
    position:absolute;
    top:18%;
    left:86%;
    color:white;
    font-size:30px;
    transition:0.5s;

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

.details{
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-gap: 60px;
    margin-top: 10px;
    width:800px;
    left :450px;
    top:100px;
    height:500px;
    background-color:var(--white);
}
.details .recentCustomers{
    position: relative;
    display: grid;
    padding: 20px;
    box-shadow: 0px 7px 25px rgba(0, 0, 0, 0.05);
}
.cardHeader{
    position:relative;
    text-align:center;
    top:30px;
 
}
.cardHeader h2{
    font-weight: 400;
    color: var(--blue);
    font-size:30px;
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

.graphBox{
    background-color:lightblue;
    height:745px;
}


</style>
    
</body>
</html>