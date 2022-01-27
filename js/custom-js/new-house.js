function validate() {     
    
    if( document.myForm.amount.value == "" )
   {
      alert( "Please provide the Amount of Rent" );
      document.myForm.amount.focus() ;
      return false;
   }
   
   if( document.myForm.destinationid.value == "" )
   {
      alert( "Please provide the Destination ID" );
      document.myForm.destinationid.focus() ;
      return false;
   }
    if( document.myForm.buildingid.value == "" )
   {
      alert( "Please provide the Building ID" );
      document.myForm.buildingid.focus() ;
      return false;
   }

   if( document.myForm.image.value == "" )
   {
      alert( "Please provide the House Image" );
      document.myForm.image.focus() ;
      return false;
   }

   if( document.myForm.number.value == "" )
   {
      alert( "Please provide the House Number" );
      document.myForm.number.focus() ;
      return false;
   }

}
// End of new house form validation...