// // $("form").submit(function (ev) {
//   $(".inc-btn").on("click", function (e) {
//     e.preventDefault();
//     var pro_id = $(this).data("id");
//     var  oldqnt = $(this).closest("form").find("input.qnt").val();
//     var qnt = ++oldqnt;
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
//     var  oldqnt = $(this).closest("form").find("input.qnt").val();
//     var qnt = --oldqnt;
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