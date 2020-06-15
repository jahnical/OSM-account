<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content=" This is great Website">
    <meta name="width=width-device,intial scale=1.o">
   <title>Malawi online shopping Website</title>
   <link rel="stylesheet" type="text/css"href="search-box.css">

   </head> <br>
   <br>
   <br>
    <body>
      <div> 
          <table class="two">
              <tr>
                  <td style="background:rgb(220, 20, 20);"></td>
                  <td>NET-HARD <br/> <i>&copy;2020</i></td>
              </tr>
          </table>
        <header id="main-header">
            <h2> <big> WELCOME TO MALAWI ONLINE SHOPPING(MOS)</big></h2>
            </header>
      
<nav>
        <table>
          <tr>
            <th><a href="index.html">HOME</a></th>
            <th><a href="page1.html/page2.html/page3.html/page4.html">SHOPS</a></li>
          <th><a href="news.html" title="Welcome to News and Updates"><strong>NEWS</strong></a></li>
         
          <th><a href="#contact">CONTACT</a></th>
          <th><a href="about.asp">ABOUTUS</a></th>
          <th><a href="www.facebook.com">FACEBOOK</a></th>
          <th><a href="www.googlemap.com">LOCATION</a></th>
          <th><a href="#">SERVICES</a></th>
          <th><a href="#">PRODUCTS</a></th>
          <th><a href="#">HELP</a></th>
          <th> <?php if (isset($_SESSION['user_id'])) echo "<a><strong>" . $_SESSION['firstname'] . "<br/>" . $_SESSION['lastname'] . "</strong>"; 
              else echo '<a href="/account/signin.html" title="Please register your name "><strong>LOGIN</strong></a>'; ?></li>
         
        </tr>
        </table>
         </nav>
      </header>

      <aside class="search-box-wrapper">
          
            <input type="text" class="input" placeholder="Search"/>
            <button class="button">&#128270</button>
           
      </aside> 
      </div>
     
<br>
<div>
<section class="column1of2">
  
     
    <p class="paragraph3"> Malawi Online Shopping(MOS) provides <br>easy way of buying products from big shops in Malawi through online.
       It requires customers to have <i> airtel money account,mpamba account or bank account</i> for you to purchase goods in the shops listed below.
      With MOS life becomes easy for customers.  </p>
      <br>
      <p class="paragraph"><strong>Catalogs:</strong></p><br>
      <a href="page1.html" title="Welcome at Shoprite's page" ><strong>SHOPRITE</strong></a><br><br>
      <a href="page2.html" title="This is Game Store's page" ><strong>GAME STORE</strong><br><br>
       <a href="page3.html" title="Welcome to Chipiku Malawi's page"><strong>CHIPIKU PLUS</strong></a><br><br>
       <a href="page4.html" title="The most trusted shop in Malawi"><strong>PEOPLE'S MALAWI SHOP</strong></a>

      
      </section>
    
  
        <section class="column2of2">
           
    
   <h3 class="header"><i>LINKED SHOPS:</i></h3>
   
     <p class="para"><a href="page1.html" title="Welcome at Shoprite's page" ><strong>SHOPRITE</strong></a></p>
     
     <p class="para2"><a href="page2.html" title="This is Game Store's page" ><strong>GAME STORE</strong></a></p>
     
     <p class="para3"><a href="page3.html" title="Welcome to Chipiku Malawi's page"><strong>CHIPIKU PLUS</strong></a></p>
     
     <p class="para0"><a href="page4.html" title="The most trusted shop in Malawi"><strong>PEOPLE'S MALAWI SHOP</strong></a></p> <br><br>
     </section>
  </div>
  
     <div class="main-footer" >  <p> <a name="Contact"></a><p class="paragraph1"><strong><i>NET-HARD</i></strong></p>
      
     
      <p>Primary Business Address<br>
            Address Line1<br>
          Address Line2<br>
          Address Line3
      
      
    
      <br>Contact us for more info:<br>Tel:+265882791514/+265992056253
      <br >Email:net-hard@online.shopping.com<br>
      Copyright &copy;2020</p>
                                   
     </div>
   
    
                  
                
        




              
                


    </body>
</html>
