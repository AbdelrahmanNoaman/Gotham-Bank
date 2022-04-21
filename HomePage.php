
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gotham Bank</title>
    <link href="Css/Main.css>
    <meta name="viewport" content="with=device-width , initial-scale">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@1,100,400;1,95.4,465&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="header">
        <nav>
            <div class="logo">
               
                </span>
                <h1 class="logotext">
                    <i class="fa fa-institution"></i>
               <span>GothamBank</span>
                </h1>
                </a>
            </div>

            <div class="nav-links" id="navLinks">
                <i class="fa fa-close" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="HomePage.php" class="normal">Home</a> </li>
                    <li><a href="ViewCostumers.html" class="normal">View Users</a> </li>
                    <li><a href="ViewTransactions.html" class="normal">View Transactions</a> </li>
                    <li><a href="AddCostumer.html" class="normal">Add User</a> </li>
                    <li><a href="MakeTransactions.html" class="normal">Make a Transaction</a> </li>
                </ul>
            </div>
            <i class="fa fa-align-justify" onclick="ShowMenu()"></i> 
        </nav>


        <div class="text-Box">
            <h2>Financial Transactions Become Much Easier</h2>
            <p>You can easily join us on our free transactions website, You can make your transactions easily and free</p>
            <a href="SignIn.html" class="btn"> Join Us To Know More</a>
        </div>
    </section> 
    <section class="campus">
        <h1> Our Services</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, ut enim quod neque quibusdam eum illo labore sit provident incidunt quaerat accusamus tenetur, commodi nam vero dolores at corrupti cupiditate!</p>
        

        <div class="row">
            <div class="campus-col">
                <img src="london.png" alt="">
                <div class=layer>
                <a href="ViewCostumers.php" class="btn sbtn">View All Customers</a>
                </div>
            </div>
            <div class="campus-col">
                <img src="newyork.png" alt="">
                <div class=layer>
                <a href="AddCostumer.php" class="btn sbtn">Add a Customer</a>
                </div>
            </div>
            <div class="campus-col">
                <img src="washington.png" alt="">
                <div class=layer>
                <a href="MakeTransactions.php" class="btn sbtn">Make a Transaction</a>
                </div>
            </div>
        </div>
         
    </section>

    </section>

    <section class="Contact">
        <h1>Make Your Transactions easily<br> Anywhere From The World </h1> 
         <a href="" class="btn"> CONTACT US</a>


    </section>

    <section class="footer">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, ad repudiandae velit dolore odit modi eaque, voluptate <br> dignissimos unde, porro dolor culpa nisi ullam nulla temporibus in sed debitis. Iusto!</p>
        <div class="Social-media">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>

        </div>
    </section>


    <script>
         var navlinks=document.getElementById("navLinks");

         function ShowMenu(){
             navlinks.style.display="inline-block";
             navlinks.style.opacity=1
         }
         function hideMenu(){
             navlinks.style.display="none";
             navlinks.style.opacity=0;
         }
         window.addEventListener("scroll",function()
         {
            var nav=document.querySelector("nav");
            nav.classList.toggle("sticky",window.scrollY>20)
         })



    </script>
    <style>
        .header{
    min-height:100vh ;
    width:100%;
    background-image:linear-gradient(rgba(5, 2, 27, 0.7),rgba(4,9,30,0.7)),url(BG.jpg) ;
    background-position: center;
    background-size: cover;
    position: relative;
}
*{
    margin:0;
    padding:0;
    font-family: 'Open Sans', sans-serif;
}
.header .logo i{
    display: inline;
    font-size: 30px;

}
.header h1:hover{
    color:#0058af;
}

.header h1{
    background:linear-gradient(to right,#6dbbff,#6fb9fa,#4aaafd,#0088ff,#0058af);
    background-size:400%;
    font-weight: 600px;
    -webkit-text-fill-color:transparent;
    -webkit-background-clip: text;
    animation: animate 15s ease-out infinite;
    animation-direction: reverse;
    margin-bottom: 20px;
    font-size: 30px;
    cursor: pointer;
    text-decoration: none;
}



@keyframes animate {
    0%{
        background-position: 0%;
    }
    25%{
        background-position: 100%;
    }

    50%{
        background-position: 200%;
    }
    
    75%{
        background-position: 300%;
    }
    100%{
        background-position: 400%;
    }
    
}


.verse{

    text-decoration: none;
}
nav{
    display:flex;
    padding: 4% 4%;
    justify-content: space-between;
    align-items: center ;
    position: fixed;
    top :0;
    width: 100%;
    left:0;
    transition: 0.6s;
    z-index: 100;
}
nav img{
    width:200px;

}
nav.sticky{
    background: rgb(45, 44, 44);
    padding: 0% 3.5%;
    padding-top: 10px;
}

.nav-links{
    flex:1;
    text-align:right;
    position: relative;
    right:100px;
    flex-direction: row;
}
.nav-links ul li{
    list-style: none;
    display:inline-block;
    padding: 8px 10px;
    position:static;
    color:rgb(255, 255, 255);
    font-size: 15px;
    margin-bottom: 15px;
}
.Specialbtn{
    border:2px solid white;
    padding:8px 10px;
    border-radius: 3%;
    color: white;
    background:transparent;
    text-decoration: none;
    display:inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 15px;
}

.Specialbtn:hover{
    border-color: #0088ff;
    background:#0088ff;
    transition: 0.7s;
    color:rgb(255, 255, 255)
}

.nav-links ul li a{
    color:seashell;
    text-decoration: none;
}
.nav-links ul .normal::after{
    content:'';
    width:0%;
    height:2px; 
    background:#0088ff;
    display:block;
    margin: auto;
    transition: 0.6s;
}
.nav-links ul .normal:hover::after{
    width:100%
}


.text-Box{
    width:90%;
   top:50%;
   left:50%;
   position: absolute;
   color:white;
   transform:translate(-50%,-50%);
   text-align: center;
}
 
.text-Box h2{
    font-size: 45px;
}
.text-Box p{
    margin-top: 10px;
    margin-bottom: 40px;
    font-size: 12px;
}
.btn{
    border:1px solid white;
    padding:14px 18px;
    border-radius: 3%;
    color: white;
    background:transparent;
    text-decoration: none;
    display:inline-block;
    font-size: 14px;
    cursor: pointer;
}
.btn:hover{
    border-color: #0088ff;
    background:#0088ff;
    transition: 0.7s;
    color:rgb(255, 255, 255)
}
.sbtn:hover{
    border-color: ;
    background: ;
    transition: 0.7s;
    color:rgb(255, 255, 255);
}
.fa{
    width:50px;
    height:50px;
    color:white;
    margin-top:25px;
    font-size: 100px;
    left:80
    
}
.fa-align-justify
{
    margin-right:20px;
    bottom :10px;
}
.fa-close{
    width :100px;
    height: 50px;
    margin :20px;

}

nav .fa{
    display:none;
}


@media(max-width:1200px){
    .text-Box h1{
        font-size: 30px;
    }
    .nav-links ul li{
        display:block;
        font-size: 20px;
        margin-bottom:30px;
        text-align: center;
    }
    .nav-links{
        opacity: 1;
        position :absolute;
        background:#0088ff;
        height:100vh;
        width:200px;
        top:0;
        right:0;
        display: none;
        text-align: left;
        z-index:2;
        transition: 0.7s;
    }

    .nav-links ul .normal:hover::after{
        width:50%;
        background:white;
    }
    nav .fa
    {
        display:block;

        color:white;
        cursor:pointer;
        font-size: 30px;
    }
    .nav-links ul
    {
        padding:20px;
        position: relative;
        right:30px
    }
    
    .Specialbtn:hover{
        border-color: white;
        background:#00549d;
        transition: 0.7s;
        color:rgb(255, 255, 255)
    }

}

.course{
    width:90%;
    margin:auto;
    text-align: center;
    padding-top: 70px;
}

.course h1{
font-size: 32px;
font-weight: 600;
color :rgb(57, 55, 55);
}

.course p {
    color :rgb(0, 0, 0);
    font-size: 14px;
    font-weight: 300;
    line-height: 23px;
    padding:10px;
    transition: 0.6s;
}

.row{
    margin-top: 7%;
    display: flex;
    justify-content: space-between;

}
.course-col{
    flex-basis: 30%;
    background: #e4cccc;;
    border-radius: 30px;
    margin-bottom: 5%;
    padding:20px 12px;
    box-sizing:border-box;
    transition: 0.5s ;
    color: rgb(93, 93, 93);
}

.course h3{
    text-align: center;
    font-weight: 600;
    margin-bottom: 10px;
    color: rgb(93, 93, 93);
}
.course-col:hover{
   transform: scale(1.1);
}

@media(max-width:600px){

    .row{
        flex-direction: column;
    }
}

.campus{
    width:90%;
    margin:auto;
    text-align: center; 
    padding-top: 70px;
    line-height: 22px;

}
.campus h1{
    margin-bottom: 20px;
}
.campus-col{
    flex-basis: 30%;
    border-radius: 30px;
    margin-bottom: 30px;
    overflow: hidden;
    position: relative;

}

.campus-col img{
    width:100%;
}


.layer{
    background: transparent;
    height: 100%;
    width: 100%;
    position: absolute;
    bottom: 4px;
    transition: 0.7s;
}


.layer a{
width: 50%;
font-weight: 500;
font-size: 20px;
color: white;
bottom: 0;
left:50%;
transform: translateX(-50%);
position:absolute;
opacity:0;
transition: 0.7s;
border-radius:10px;
}
.layer:hover{
    background: rgba(0,150,255,0.92);
}



.layer:hover a{
    bottom:47%;
    opacity: 1;
}

.facilities{
    width:90%;
    margin:auto;
    text-align: center; 
    padding-top: 70px;
    transition: 0.6s;
    color:rgb(93, 93, 93);
}

.facilities h1{
    margin-bottom: 20px;
}
.facilities-col{
    flex-basis: 30%;
    border-radius: 20px;
    margin-bottom: 5%;
    text-align: center;
    background: #e4cccc;
    transition: 0.6s;
    color:rgb(93, 93, 93);
}

.facilities-col:hover{
  transform:scale(1.05)
}


.facilities-col img{
width: 100%;
    border-radius: 20px;
}
.facilities-col p{
     padding:10px;
     color:rgb(93, 93, 93);

}
.facilities-col h3{
    text-align: center;
    margin-top: 10px;
    color:rgb(93, 93, 93);
}

.testimonials{
    width:90%;
    margin:auto;
    text-align: center; 
    padding-top: 70px;
}

.testinmonial-col{
    flex-basis: 37%;
    border-radius: 30px;
    margin-bottom: 5%;
    text-align: left;
    display:flex;
    background:#e4cccc ;
    padding :40px;
    color:rgb(93, 93, 93);
}

.testinmonial-col img{
    border-radius: 50%;
    height:70px;
    margin-left: 5px;
    margin-right :30px;
    cursor: pointer;
    transition: 0.6s;
}
.testinmonial-col img:hover{
    transform: scale(1.3);
}

.testinmonial-col h3{
    margin-top: 30px;
    margin-bottom: 0px;
    color:rgb(93, 93, 93);
}

.Contact{
    margin:auto;
    width:80%;
    background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(eduford_img/banner2.jpg);
    background-position: center;
    background-size: cover;
    text-align: center;
    border-radius: 12px;
    padding:30px;
    color:white;
    margin-top: 30px;
}
.Contact h1{
    font-size:30px;
    line-height: 20px;
    line-height: 50px;
    margin :20px 0;
}

.footer{
    width:100%;
    text-align: center;
    padding: 30px 0px;
    margin-top :10px;
    background:black;
    color:white
}
.footer h4{
    font-size: 20px;
    margin-bottom: 20px;
    font-weight: 500;
}

.footer p{
    font-size: 9px;
}

.footer .fa{
    color:rgb(184, 148, 148);
    font-size: 30px;
    padding :10px;
    transition: 0.6s;
}
.footer .fa:hover{
    transform: scale(1.3);
}
.fa-star{
    font-size: 5px;
    color:#f44336;
    text-align: left;
}
.fa-star-half-o{
    font-size: 5px;
    color:#f44336;
    text-align: left;

}

    </style>
</body>
</html>


