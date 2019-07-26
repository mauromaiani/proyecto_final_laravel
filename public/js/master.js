//window.onload = function(){

//   let botonBorrar = document.getElementById('borrarPost');
//   botonBorrar.addEventListener('click', function(event){
//     event.preventDefault();
//     Swal.fire({
//       title: 'Are you sure?',
//       text: "You won't be able to revert this!",
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//       if (result.value) {
//         Swal.fire(
//           'Deleted!',
//           'Your file has been deleted.',
//           'success'
//         )
//       }
//     })
//   });
//
// //}
//
//

// if (window.width > 479) {

$(document).on("scroll", function(){
    var pixels = $(document).scrollTop();
    console.log(pixels)

    let section1 = 400;
    let section2 = 1400;
    let section3 = 2200;

    $("#comunidad01Base").css("top", (pixels - section1) * 0.05);
    $("#comunidad02Compu").css("top", (pixels - section1) * 0.025);
    $("#comunidad03Chicas").css("top", (pixels - section1) * -0.025);
    $("#comunidad04Likes").css("top", (pixels - section1) * -0.09);

    $("#caracteristicas01Base").css("top", (pixels - section2) * -0.05);
    $("#caracteristicas02Pantalla").css("top", (pixels - section2) * 0.025);
    $("#caracteristicas03Gorra").css("top", (pixels - section2) * 0.05);
    $("#caracteristicas04Escudo").css("top", (pixels - section2) * -0.09);

    $("#preguntas01Base").css("top", (pixels - section3) * 0.05);
    $("#preguntas02Signo").css("top", (pixels - section3) * 0.025);
    $("#preguntas03Circulos").css("top", (pixels - section3) * -0.025);
    $("#preguntas04Linea").css("top", (pixels - section3) * -0.009);

});


// function confirmation(){
//     var result = confirm(Swal.fire({
//                   title: 'Are you sure?',
//                   text: "You won't be able to revert this!",
//                   type: 'warning',
//                   showCancelButton: true,
//                   confirmButtonColor: '#3085d6',
//                   cancelButtonColor: '#d33',
//                   confirmButtonText: 'Yes, delete it!'
//                 }).then((result) => {
//                   if (result.value) {
//                     Swal.fire(
//                       'Deleted!',
//                       'Your file has been deleted.',
//                       'success'
//                     )
//                   }
//                 }));
//     if(result){
//       {{ csrf_field() }}
//       {{ method_field('DELETE') }}
//     }
// }
