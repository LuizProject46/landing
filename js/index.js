$(document).ready(function (){

  $(".btn-send").click(function (){


  var name = $("input[name='name']").val()
  var email = $("input[name='email']").val()
  var sub = $("input[name='subject']").val()
  var msg = $("input[name='msg']").val()
 
   $.ajax({
     url : "./controllers/sendMail.php",
     method: "POST",
     dataType: "json",
     data:{
       action: "email",
      name: name,
      email: email,
      subject: sub,
      msg: msg
     },

     success : function(data){
       console.log(data)
        if(data == 1){
          $.toast({
            heading: 'Sucesso!',
            text: 'Email enviado com sucesso. Em breve você receberá uma resposta em seu e-mail :)',
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: '#57c7d4',
            position: 'top-center',
            hideAfter: 10000
        })
        }else{
          alert("não enviado")
        }
     }
   })
  })
})