<?php

print_r($_POST);
?>

<!-- ****************static************************* 
<script>
    $('form').submit(function(event){
        event.preventDefault();
        $.post('test.php',{
            username : $('input:first').val(),
            password : $('input:nth-child(2)').val()
        },function(data){
            console.log(data);
        })
    })
    </script>

********************dynamic**************************
    var log = console.log ;

$('form').submit(function(ev){
    ev.preventDefault();
    var data = {};
   $('.form input').each(function(index,item){
    data[$(item).attr('name')] = $(item).val();
   })
   log(data);
})