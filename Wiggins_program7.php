<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
</head>
<body>

<pre>
<?php //This is the beginning of the PHP

//FILENAME   : Wiggins_Program7.php
//PROGRAMMER : Timothy Wiggins
//PURPOSE    : Is to build a form for an airlines company. Then send the information
//PURPOSE    : from the form to the php program. The php program gathers all the
//PURPOSE    : information, include flight destination, customer name, which class
//PURPOSE    : they would like to fly, how many tickets, seat location, and the
//PURPOSE    : flight options. Then it calculates the total amount of each ticket
//PURPOSE    : from the customers selections. And then displays the final report in
//PURPOSE    : the form of an airline ticket.

   define('INSURANCE_PRICE',34.95);
   define('MEAL_PRICE',5.50);
   define('WARMER_PRICE',2.50);
   define('INTERNET_PRICE',19.95);
   define('HOTEL_PRICE',134.95);
   
   $insPrice    = NULL;
   $mealPrice   = NULL;
   $warmPrice   = NULL;
   $netPrice    = NULL;
   $hotelPrice  = NULL;
   $optionsCost = NULL;
   $choiceCost  = NULL;
   $totalCost   = NULL;
   $flightNum   = NULL;
   $depTime     = NULL;
   $flyTime     = NULL;

   //Extracting the userName
   extract($_POST);      //Into $username
   if(empty($username))
      printf("You must enter a user name. Please use the browser back button and enter a name.\n");
   else{
      //Extracting the Destination
      extract($_POST);     //Into $choice
      if(!isset($choice))
         printf("You must choose a destination. Please use the browers back button and select a destination.\n");
      else{
         //Extracting One-way or Round-trip
         extract($_POST);     //Into $tripWay

         //Extracting Ticket Type
         extract($_POST);     //Into $class

         //Extracting Amount of Tickets
         extract($_POST);     //Into $amountOfTickets

         //Extracting Seat Preference
         extract($_POST);     //Into $seat

         //Extracting Flight Options
         if(isset($options)){
            foreach($_POST['options'] as $value){
                if($value=="insurance"){
                     $optionsCost +=INSURANCE_PRICE;
                     $insPrice = INSURANCE_PRICE;
                }
                elseif($value=="meal"){
                     $optionsCost +=MEAL_PRICE;
                     $mealPrice = MEAL_PRICE;
                }
                elseif($value=="warmer"){
                     $optionsCost +=WARMER_PRICE;
                     $warmPrice = WARMER_PRICE;
                }
                elseif($value=="internet"){
                     $optionsCost +=INTERNET_PRICE;
                     $netPrice = INTERNET_PRICE;
                }
                else {
                     $optionsCost +=HOTEL_PRICE;
                     $hotelPrice = HOTEL_PRICE;
                }
              }
          }

          //Set the price of the destination
          if($choice == "Miami")
               $choiceCost = 345.00;
          elseif($choice == "Orlando")
               $choiceCost = 245.00;
          elseif($choice == "Atlanta")
               $choiceCost = 175.00;
          elseif($choice == "Myrtle Beach")
               $choiceCost = 75.00;
          elseif($choice == "Outer Banks")
               $choiceCost = 219.00;
          elseif($choice == "Charlotte")
               $choiceCost = 210.98;
          elseif($choice == "Nashville")
               $choiceCost = 345.99;
          elseif($choice == "Memphis")
               $choiceCost = 450.99;
          elseif($choice == "Williamsburg")
               $choiceCost = 275.00;
          elseif($choice == "New Orleans")
               $choiceCost = 299.99;
         
          if($tripWay == "Round-Trip"){
               switch($choice){
                 case "Miami" :
                      $choiceCost = 450.00;
                      break;
                 case "Orlando" :
                      $choiceCost = 310.00;
                      break;
                 case "Atlanta" :
                      $choiceCost = 250.00;
                      break;
                 case "Myrtle Beach" :
                      $choiceCost = 125.00;
                      break;
                 case "Outer Banks" :
                      $choiceCost = 378.95;
                      break;
                 case "Charlotte" :
                      $choiceCost = 313.30;
                      break;
                 case "Nashville" :
                      $choiceCost = 450.99;
                      break;
                 case "Memphis" :
                      $choiceCost = 550.00;
                      break;
                 case "Williamsburg" :
                      $choiceCost = 399.99;
                      break;
                 case "New Orleans" :
                      $choiceCost = 399.99;
                      break;
              }
          }
    
          //Building the final Cost of the ticket or tickets
          $totalCost = $choiceCost;
          if($class == "First"){
              $totalCost = $totalCost * 1.20;
              $choiceCost = $choiceCost * 1.20;
          }
          $totalCost += $optionsCost;
          $totalCost = $totalCost * $amountOfTickets;
    
          //Building the final report and setting variables for it
          switch($choice){
                 case "Miami" :
                     $flightNum = "MI-239";
                     $depTime   = "12:00 pm";
                     $flyTime   = "1 Hour 29 Minutes";
                     break;
                  case "Orlando" :
                     $flightNum = "ORL-345";
                     $depTime   = "1:30 pm";
                     $flyTime   = "1 Hour 5 Minutes";
                     break;
                 case "Atlanta" :
                     $flightNum = "ATL-980";
                     $depTime   = "9:30 am";
                     $flyTime   = "20 Minutes";
                     break;
                 case "Myrtle Beach" :
                     $flightNum = "MB-345";
                     $depTime   = "10:15 am";
                     $flyTime   = "15 Minutes";
                     break;
                 case "Outer Banks" :
                     $flightNum = "OB-3432";
                     $depTime   = "2:45 pm";
                     $flyTime   = "32 Minutes";
                     break;
                 case "Charlotte" :
                     $flightNum = "CH-009";
                     $depTime   = "7:45 pm";
                     $flyTime   = "15 Minutes";
                     break;
                 case "Nashville" :
                     $flightNum = "BNA-343";
                     $depTime   = "3:30 pm";
                     $flyTime   = "1 Hour 35 Minutes";
                     break;
                 case "Memphis" :
                     $flightNum = "MEM-989";
                     $depTime   = "5:00 pm";
                     $flyTime   = "1 Hour 50 Minutes";
                     break;
                 case "Williamsburg" :
                     $flightNum = "WMBG-333";
                     $depTime   = "6:30 pm";
                     $flyTime   = "2 Hours 15 Minutes";
                     break;
                 case "New Orleans" :
                     $flightNum = "NO-455";
                     $depTime   = "4:15 pm";
                     $flyTime   = "2 Hours 30 Minutes";
                     break;
         }

          printf("<h1><b><font color ='BLUE'>FBN Airlines\n</font></b></h1><br><br>");
          printf("Issue Date: ");
          print date("D, F jS Y");
          printf("<br><hr />");
          printf("<br>Customer                               Tickets<br>");
          printf("%-40s %1d", $username, $amountOfTickets);
          printf("<br><hr />");
          printf("FLIGHT INFORMATION<br>");
          printf("Destination           Flight Number            Class             Departure Time            Flying Time           Seating Preference<br>");
          printf("%-23s %-22s %-20s %-20s %-29s %s<br>", $choice, $flightNum, $class, $depTime, $flyTime, $seat);
          printf("<br><h5>Flight operated by RICK'S FBN AIRLINES.</h5>");
          printf("<hr />");
          printf("FARE INFORMATION<br><br>");
          printf("Fare Breakdown<br>");
          printf("Airfare:                  %11.2f<br>",   $choiceCost);
          printf("Insurance:                %11.2f<br>", $insPrice);
          printf("Meal:                     %11.2f<br>", $mealPrice);
          printf("Seat Warmer:              %11.2f<br>", $warmPrice);
          printf("Internet:                 %11.2f<br>", $netPrice);
          printf("Accommodations:           %11.2f<br>", $hotelPrice);
          printf("<hr />");
          printf("Per Person Total:             $%6.2f<br>", $optionsCost + $choiceCost);
          printf("Total Tickets:            %11d<br>", $amountOfTickets);
          printf("<br><b><h3>Total Amount Due:        $%6.2f</b></h3>", $totalCost);
    
      }
  }
?>
</pre>
</body>
</html>
