
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
          window.location = window.location.pathname.substring(0,window.location.pathname.lastIndexOf("/"))  + "/signin.php";
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

        if(resp=="Success")
        {
          alert("User Verified!");
          window.location = window.location.pathname.substring(0,window.location.pathname.lastIndexOf("/")) + "/catalog.php";
        }
        else {
          alert(resp);
        }
      }
  );
});


$('#searchbtn').on('click', function(e){
  e.preventDefault();
  $.ajax(
    {
      method: "POST",
      url: 'includes/search.php',
      data: {usearch:$('#inputsearch').val()}
    }
  ).done(function(resp)
    {
          $('#searchresults').html(resp);
          alert("Search Return!");
    }
  );
});


$(document).on('click','.buy', function(e){
  e.preventDefault();
  console.log( );
  $.ajax(
    {
      method: "POST",
      url: 'infocheck.php',
      data: {usku:$($(e.target).parent().parent().children()[0]).html()}
    }
  ).done(function(resp)
    {
        //$('#searchresults').html(resp);
        alert(resp);
        //trigger the modal in response to the response from the info check

        //when modal is submitted with the required information, move to the purchase confirmation

        
        alert("Search Return!");
    }
  );
});
