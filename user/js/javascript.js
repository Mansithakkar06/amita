/****Login form password*****/
function myFunction()
	{
		var x=document.getElementById("myInput");
		var y=document.getElementById("hide1");
		var z=document.getElementById("hide2");
		
		if(x.type=="password")
		{
			x.type="text";
			y.style.display="block";
			z.style.display="none"
		}
		else
		{
			x.type="password";
			y.style.display="none";
			z.style.display="block"
		}
	}
	
/********************************************Validation for Registration******************************************/

function register_func()
{
	/***for full name****/
	const name=document.getElementById("name").value;
	const name_regex = /^[a-zA-Z\s]+$/;
    if(name=="")
	{
	 alert('Please enter your full name!'); 
     document.getElementById("name").focus();	 
     return false;  
	}	
    if(!name_regex.test(name)) 
	{
	  alert('Please input alphabet characters only');
	  document.getElementById("name").focus();
      return true;
	}	
	
	/*****for username****/
	const uname=document.getElementById("uname").value;
    const uname_regex =/^[A-Za-z0-9_-]*$/;   
    if(uname=="")
    {
      alert('Please enter your username!'); 
      document.getElementById("uname").focus();   
      return false;  
    }  
    if(!uname_regex.test(uname)) 
    {
      alert('Please enter valid username');
      document.getElementById("uname").focus();
      return true;
    }
    
	
	/****Password & Confirm Password validation***/
   const pw = document.getElementById("password").value; 
   const cpw=document.getElementById("cpassword").value;
   if(pw == "") 
   {  
     alert('Please enter the password!'); 
     document.getElementById("password").focus();	 
     return false;  
   }    
   if(cpw == "") 
   {  
     alert('Please enter the confirm password!');
     document.getElementById("cpassword").focus();	 
     return false;  
   }   
   //minimum password length validation  
   if(pw.length < 8) 
   {  
     alert('Password length must be atleast 8 characters');
     document.getElementById("password").focus();	 
     return false;  
   }    
  //maximum length of password validation  
   if(pw.length > 12) 
   {  
     alert('Password length must not exceed 12 characters');
     document.getElementById("password").focus();	 
     return false;  
   }  
   if(pw!=cpw)
   {
	  alert('Password and confirm password does not match');
	  document.getElementById("password").focus();
	  return false;
   }

    /****for email***/
	
      /*const input = document.getElementById("email").value;
      if (input && /(^\w.*@\w+\.\w)/.test(input)) 
	  {
		alert("valid");
      }
	  else 
	  {
        alert("Please enter valid email address");
      }*/
	  /*const input = document.getElementById("email").value;
	  const email= /(^\w.*@\w+\.\w)/.test(input);
	  if(!email)
	  {
		 alert("Please enter valid email address");
		 document.getElementById("email").focus();
		 return true;
	  }*/
	const email=document.getElementById("email").value;
    const email_regex = /(^\w.*@\w+\.\w)/;
	if(email=="")
	{
	    alert('Please enter your email!'); 
        document.getElementById("email").focus();	 
        return false;  
	}
    if (!email_regex.test(email)) 
    {
	  alert('Please Enter valid email address');
	  document.getElementById("email").focus();
	  return true;
    } 
  
    /***for mobile number***/
    const number=document.getElementById("number").value;
    const mobile_regex = /^[0-9]{10}$/;
	if(number=="")
	{
	    alert('Please enter your mobile number!'); 
        document.getElementById("number").focus();	 
        return false;  
	}
    if (!mobile_regex.test(number)) 
    {
	  alert('Please Enter valid Mobile Number');
	  document.getElementById("number").focus();
	  return true;
    } 
}

/*******************************For chnage_password Validation******************************************/
function change_pass()
{
   const pw = document.getElementById("password").value; 
   const npw = document.getElementById("npassword").value; 
   const cpw=document.getElementById("cpassword").value;
   if(pw == "") 
   {  
     alert('Please enter the password!'); 
     document.getElementById("password").focus();	 
     return false;  
   }

   if(npw == "") 
   {  
     alert('Please enter the yor new password!'); 
     document.getElementById("npassword").focus();	 
     return false;  
   }
   
   if(cpw == "") 
   {  
     alert('Please enter the confirm password!');
     document.getElementById("cpassword").focus();	 
     return false;  
   }   
   //minimum password length validation  
   if(pw.length < 8) 
   {  
     alert('Password length must be atleast 8 characters');
     document.getElementById("password").focus();	 
     return false;  
   }

   if(npw.length < 8) 
   {  
     alert('New Password length must be atleast 8 characters');
     document.getElementById("npassword").focus();	 
     return false;  
   } 

   if(cpw.length < 8) 
   {  
     alert('confirm Password length must be atleast 8 characters');
     document.getElementById("cpassword").focus();	 
     return false;  
   }    
  //maximum length of password validation  
   if(pw.length > 12) 
   {  
     alert('Password length must not exceed 12 characters');
     document.getElementById("password").focus();	 
     return false;  
   }

   if(npw.length > 12) 
   {  
     alert('New Password length must not exceed 12 characters');
     document.getElementById("npassword").focus();	 
     return false;  
   }   
   if(npw!=cpw)
   {
	  alert('New Password and confirm password does not match');
	  document.getElementById("cpassword").focus();
	  return false;
   }
}

