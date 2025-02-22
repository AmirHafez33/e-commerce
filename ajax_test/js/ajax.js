
var log = console.log ;

$('form').submit(function(ev){
    ev.preventDefault();
var data = {};
var name = $('input[name = "name"]').val()
var  phone = $('input[name = "phone"]').val();
var  email = $('input[name = "email"]').val();
var message = $('input[name = "message"]').val();

   $('.form input').each(function(index,item){
    if($(item).val()!=''){

    data[$(item).attr('name')] = $(item).val();
    }else{
        $(item).attr('placeholder', 'can not be empty');
    }
})
if(name && phone && email && message){
   $.post('func/send_mesg.php',data,function(respons){
    console.log(data);
    $('form input').val('');
   })
}
})

//     $.post('func/send_mesg.php',{
//          name : $('input[name = "name"]').val(),
//          phone : $('input[name = "phone"]').val(),
//          email : $('input[name = "email"]').val(),
//          message : $('input[name = "message"]').val()
//     },function(data){
//         console.log(data);
//         $('form input').val('');
//     })
// })