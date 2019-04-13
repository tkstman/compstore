
$('#inputPassword').on( 'blur' , function(e){
  if( ($(e.target).val()!= $('#inputPasswordConf').val())  && $(e.target).val()!="")
  {
    //set error color and prevent submission
    console.log("tester");
    $(e.target).addClass('has-error');
  }
  else {
    if($(e.target).hasclass('has-error'))
    {
      $(e.target).removeClass('has-error');
    }
  }
  e.preventDefault();
});

$('#inputPasswordConf').on( 'blur' , function(e){
  if(($(e.target).val()!= $('#inputPassword').val()) && $(e.target).val()!="")
  {
    //set error color and prevent submission
    console.log("test");
    $(e.target).addClass('has-error');
  }
  else {
    if($(e.target).hasclass('has-error'))
    {
      console.log("it has error");
      $(e.target).removeclass("has-error");
    }
  }
  e.preventDefault();
});
