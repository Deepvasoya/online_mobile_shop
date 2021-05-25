// JavaScript Document
function copyall()
 {
 
if(document.getElementById("same").checked==true)
  {

		 
 document.getElementById("PtxtEmail").value=document.getElementById("txtEmail").value;
 document.getElementById("PtxtFName").value=document.getElementById("txtFName").value;
 document.getElementById("PtxtLName").value=document.getElementById("txtLName").value;
  document.getElementById("PtxtAdd").value=document.getElementById("txtAdd").value;
 document.getElementById("PtxtZipCode").value=document.getElementById("txtZipCode").value;
 document.getElementById("PtxtCountry").value=document.getElementById("txtCountry").value;
 document.getElementById("PtxtState").value=document.getElementById("txtState").value;
 document.getElementById("PtxtCity").value=document.getElementById("txtCity").value;
 document.getElementById("PtxtPhoneNo").value=document.getElementById("txtPhoneNo").value;

  }
  else
  {
  document.getElementById("PtxtEmail").value="";
 document.getElementById("PtxtFName").value="";
 document.getElementById("PtxtLName").value="";
 document.getElementById("PtxtAdd").value="";
 document.getElementById("PtxtZipCode").value="";
 document.getElementById("PtxtCountry").value="";
 document.getElementById("PtxtState").value="";
 document.getElementById("PtxtCity").value="";
 document.getElementById("PtxtPhoneNo").value="";
  }
  
 }
 function copyto2(str)
  {
	  if(document.getElementById("same").checked==true)
        {
			
			str1="P"+str;
			
	  	  document.getElementById(str1).value=document.getElementById(str).value;
		}
  }
  