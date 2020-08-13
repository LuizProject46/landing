$(document).ready(function (){
  var name = $(".form input[name=name]").val()
  var email = $(".form input[name=email]").val()
  var sub = $(".form input[name=subject]").val()
  var msg = $(".form input[name=msg]").val()


  $(".btn-send").click(function (){
   $.ajax({
     url : "./controllers/sendMail.php",
     method: "POST",
     data:{
       action: "email",
      name: name,
      email: email,
      subject: sub,
      msg: msg
     },

     success : function(data){
        if(data == 1){
          alert("enviado")
        }else{
          alert("não enviado")
        }
     }
   })
  })
})