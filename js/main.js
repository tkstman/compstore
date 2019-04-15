
function clearHasE()
{
  if($('#inputPasswordConf')[0].classList.contains('has-error'))
  {
    $('#inputPasswordConf').removeClass('has-error');
  }

  if($('#inputPassword')[0].classList.contains('has-error'))
  {
    $('#inputPassword').removeClass('has-error');
  }
};

$('#inputPassword').on( 'blur' , function(e){
  if( ($(e.target).val()!= $('#inputPasswordConf').val())  && $(e.target).val()!="")
  {
    //set error color and prevent submission
    //console.log("tester");
    $(e.target).addClass('has-error');
  }
  else {
      clearHasE();
  }

  e.preventDefault();
});

$('#inputPasswordConf').on( 'blur' , function(e){
  if(($(e.target).val()!= $('#inputPassword').val()) && $(e.target).val()!="")
  {
    //set error color and prevent submission
    //console.log("test");
    $(e.target).addClass('has-error');
  }
  else {
      clearHasE();
  }
  e.preventDefault();
});

/*
  Sign up process
*/

$('#signupbtn').on('click', function(e){

  $.ajax(
    {
      method: "POST",
      url: 'includes/signup.php',
      data: {uname:$('#inputusername').val(),uemail:$('#inputEmail').val(),pword:$('#inputPassword').val()}
    }
  ).done(function(resp)
    {

        if(resp=="Success")
        {
          alert("Account Created successfully!");
          window.location = window.location.href + "signin.php";
        }
        else {
          alert(resp);
        }
    }
  );

});


$('#signinbtn').on('click', function(e){

  $.ajax(
    {
      method: "POST",
      url: 'includes/login.php',
      data: {uemail:$('#signinEmail').val(),pword:$('#signinPassword').val()}
    }
  ).done(function(resp)
    {

        if(resp=="Success!")
        {
          alert("User Verified!");
          window.location = window.location.href + "catalog.php";
        }
        else {
          alert(resp);
        }
    }
  );

});
