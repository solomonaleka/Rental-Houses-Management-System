function validate() { 

   if( document.myForm.paid.value == "" ) {
      alert( "Please provide the Deposit Amount!!" );
      document.myForm.paid.focus() ;
      return false;
   }

   /*
   //Ensuring the tenant cannot pay less than half the deposit
   var first_pay=document.myForm.paid.value;
   var price=document.myForm.amount.value;
   var half=0.5*price;
   if(first_pay<half) {
    alert( "You must pay atleast half the amount of Deposit!!" );
    document.myForm.paid.focus() ; 
   }*/

}
// End of registration form validation...