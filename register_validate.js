function validateform(){

var UniverID=document.RegistrationForm.UniverID.value;  
var InstID=document.RegistrationForm.InstID.value;  
var CourseID=document.RegistrationForm.CourseID.value;  
var EnrNo=document.RegistrationForm.EnrNo.value;  
var EnrolledYear=document.RegistrationForm.EnrolledYear.value; 
var FirstName=document.RegistrationForm.FirstName.value;  
var MiddleName=document.RegistrationForm.MiddleName.value;  
var LastName=document.RegistrationForm.LastName.value;  
var MobileNo=document.RegistrationForm.MobileNo.value;
var Email=document.RegistrationForm.Email.value;
var DateofBirth=document.RegistrationForm.DateofBirth.value;
var Gender=document.RegistrationForm.Gender.value;
var Category=document.RegistrationForm.Category.value;
var Address=document.RegistrationForm.Address.value;
var ProfilePicUrl=document.RegistrationForm.ProfilePicUrl.value;
var State=document.RegistrationForm.State.value;
var City=document.RegistrationForm.City.value;
var Pincode=document.RegistrationForm.Pincode.value;
var CnfEmail=document.RegistrationForm.CnfEmail.value;
var Password=document.RegistrationForm.Password.value;
var CnfPassword=document.RegistrationForm.CnfPassword.value;

if (UniverID==null || UniverID==""){  
  alert("Please select university");

  return false;  
}
if (InstID==null || InstID==""){  
  alert("Please Select Institute");  
  return false;  
}
if (CourseID==null || CourseID==""){  
  alert("Please Select Course");  
  return false;  
}
if (EnrNo==null || EnrNo==""){  
  alert("Please Fill Enrollnment No.");  
  return false;  
}
if (EnrolledYear==null || EnrolledYear==""){  
  alert("Please select Enrolled Year");  
  return false;  
}

if (FirstName==null || FirstName==""){  
  alert("First Name can't be blank");  
  return false;  
}
if (MiddleName==null || MiddleName==""){  
  alert("Middle Name can't be blank");  
  return false;  
}
if (LastName==null || LastName==""){  
  alert("Last Name can't be blank");  
  return false;  
}
if (DateofBirth==null || DateofBirth==""){  
  alert("Please fill Date of Birth");  
  return false;  
}
if (Gender==null || Gender==""){  
  alert("Please Select Your Gender");  
  return false;  
}
if (Category==null || Category==""){  
  alert("Please Select Category");  
  return false;  
}
if (Address==null || Address==""){  
  alert("Please Fill Address");  
  return false;  
}
if (ProfilePicUrl==null || ProfilePicUrl==""){  
  alert("Please Upload Profile Pic");  
  return false;  
}
if (State==null || State==""){  
  alert("Please Select State");  
  return false;  
}
if (City==null || City==""){  
  alert("Please Select City");  
  return false;  
}
if (Pincode==null || Pincode==""){  
  alert("Please Enter Pincode");  
  return false;  
}

if (Email==null || Email==""){  
  alert("E-mail can't be blank");  
  return false;  
}
if (CnfEmail==null || CnfEmail==""){  
  alert("Please Fill Confirm Email Field");  
  return false;  
}
if (Email!=CnfEmail){  
  alert("Email Miss-Matched..Please Reconfirm");  
  return false;  
}

if (MobileNo==null || MobileNo==""){  
  alert("Mobile No. can't be blank");  
  return false;  
}
if (Password==null || Password==""){  
  alert("Password can't be blank");  
  return false;  
}
if (CnfPassword==null || CnfPassword==""){  
  alert("Confirm Password can't be blank");  
  return false;  
}
if (Password!=CnfPassword){  
  alert("Password Doesn't Matched..Reconfirm");  
  return false;  
}

}  
