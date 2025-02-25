// // $("form").submit(function (ev) {
//   $(".inc-btn").on("click", function (e) {
//     e.preventDefault();
//     var pro_id = $(this).data("id");
//     // var  oldqnt = $(this).closest("input").val();
//     var oldqnt = $(".qnt").val();
//     console.log(oldqnt);
    
//     var qnt = ++oldqnt;
    
//     console.log(qnt);

//     $.post(
//       "admin/database/update_cart.php",
//       {
//         pro_id: pro_id,
//         qnt : qnt ,
//       },
//       function (data) {
        
//         console.log(data);
        
        
         
//       }
//     );
//   });

//   $(".dec-btn").on("click", function (e) {
//     e.preventDefault();
//     var pro_id = $(this).data("id");
//     // var  oldqnt = $(this).closest("input").val();
//     var oldqnt = $(".qnt").val();
//     console.log(oldqnt);
    
//     var qnt = --oldqnt;
//     console.log(qnt);
//     $.post(
//       "admin/database/update_cart.php",
//       {
//         pro_id: pro_id,
//         qnt : qnt ,
//       },
//       function (data) {
//         console.log(data);
        
//         // traversing to change he next and previous data 
//       }
//     );
//   });