      function validate() { 
          if( document.myForm.firstname.value == "" )
         {
            alert( "Please provie your First Name with letters only!!" );
            document.myForm.firstname.focus() ;
            return false;
         }
          if( document.myForm.secondname.value == "" )
         {
            alert( "Please provide your Second Name with letters only!!" );
            document.myForm.secondname.focus() ;
            return false;
         }
         
         if( document.myForm.emailaddress.value == "" )
         {
            alert( "Please provide your Email Address!!" );
            document.myForm.emailaddress.focus() ;
            return false;
         }
         var emailID = document.myForm.emailaddress.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct Email Address!!")
            document.myForm.emailaddress.focus() ;
            return false;
         }

         if( document.myForm.phonenumber.value == "" )
         {
            alert( "Please provide your Phone Number!!" );
            document.myForm.phonenumber.focus() ;
            return false;
         }
         
          if( document.myForm.username.value == "" )
         {
            alert( "Please provide your Username!!" );
            document.myForm.username.focus() ;
            return false;
         }
          if( document.myForm.password.value == "" )
         {
            alert( "Please provide your Password!!" );
            document.myForm.password.focus() ;
            return false;
         }

         if( document.myForm.password.value.length <8 )
         {
            alert( "Atleast 8 characters required for Password!!" );
            document.myForm.password.focus() ;
            return false;
         }

         if( document.myForm.confirmpassword.value == "" )
         {
            alert( "Please provide your Password!!" );
            document.myForm.confirmpassword.focus() ;
            return false;
         }

         if( document.myForm.confirmpassword.value.length <8 )
         {
            alert( "Atleast 8 characters required for Confirm Password!!" );
            document.myForm.confirmpassword.focus() ;
            return false;
         }

         if( document.myForm.paid.value == "" )
         {
            alert( "Please provide the Amount!!" );
            document.myForm.paid.focus() ;
            return false;
         }

      }
      // End of registration form validation...