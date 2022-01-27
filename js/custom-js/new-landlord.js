function validate() { 
    if( document.myForm.firstname.value == "" )
   {
      alert( "Please provide the First Name with letters only!!" );
      document.myForm.firstname.focus() ;
      return false;
   }
    if( document.myForm.secondname.value == "" )
   {
      alert( "Please provide the Second Name with letters only!!" );
      document.myForm.secondname.focus() ;
      return false;
   }

   if( document.myForm.phonenumber.value == "" )
   {
      alert( "Please provide the Phone Number!!" );
      document.myForm.phonenumber.focus() ;
      return false;
   }
   
   if( document.myForm.emailaddress.value == "" )
   {
      alert( "Please provide the Email Address!!" );
      document.myForm.emailaddress.focus() ;
      return false;
   }
   
   /*
   var emailID = document.myForm.emailaddress.value;
   atpos = emailID.indexOf("@");
   dotpos = emailID.lastIndexOf(".");
   
   if (atpos < 1 || ( dotpos - atpos < 2 )) 
   {
      alert("Please enter correct Email Address!!")
      document.myForm.emailaddress.focus() ;
      return false;
   }
   */

   if( document.myForm.buildingid.value == "" )
   {
      alert( "Please provide the Building ID!!" );
      document.myForm.buildingid.focus() ;
      return false;
   }
   
}
// End of new landlord form validation...