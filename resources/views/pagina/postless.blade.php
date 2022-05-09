@extends('layouts.app')

@section('content')
<div class="main">
    <div class="card br-10">
        <p class="inexistente">Post Inexistente </p>
    </div>
</div>
<script>


function gostar(id){

  $.ajax({
    url: "{{ route('like')}}",
    type: 'get',
    data: {'id': id},
     dataType: 'json',
     success:function(response){
     let likes_qtd = $("#likes-qtd-" + id).text().split(' ')[0];
     if (response == 1) {
       likes_qtd = parseInt(likes_qtd) + 1;
       $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
     } else if (response == 2) {
       likes_qtd = parseInt(likes_qtd) - 1;
       if (likes_qtd >= 0) {
         $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
       }
     }
    }
  });
  }
  function comment_reac(id){
      $.ajax({
        url: "{{ route('comment_reac')}}",
        type: 'get',
        data: {'id': id},
         dataType: 'json',
         success:function(response){
           console.log(response);
         /*let likes_qtd = $("#likes-qtd-" + id).text().split(' ')[0];
         if (response == 1) {
           likes_qtd = parseInt(likes_qtd) + 1;
           $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
         } else if (response == 2) {
           likes_qtd = parseInt(likes_qtd) - 1;
           if (likes_qtd >= 0) {
             $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
           }
         }*/
        }
      });
    }
  function seguir(id){

     $.ajax({
        url: "{{route('seguir')}}",
        type: 'get',
        data: {'id': id},
         dataType: 'json',
         success:function(response){
         console.log(response);
         $('#seguir').hide();

        }
      });
    }

    function comentar(id, c){
    let comment_qtd = $("#comment-qtd-" + id).text().split(' ')[0];
        $.ajax({
          url: "{{route('comentar')}}",
          type: 'get',
          data: {'id': id, 'comment': c},
           dataType: 'json',
           success:function(response){
           //console.log(response);

           comment_qtd = parseInt(comment_qtd) + 1;
           $("#comment-qtd-" + id).text((comment_qtd) + " comentários");

          }
        });
      }

      function guardar(id){

         $.ajax({
            url: "{{route('savepost')}}",
            type: 'get',
            data: {'id': id},
             dataType: 'json',
             success:function(response){
             console.log(response);
             $("#savepost-" + id).hide();

            }
          });
        }

        function delete_post(id){

           $.ajax({
              url: "{{route('delete_post')}}",
              type: 'get',
              data: {'id': id},
               dataType: 'json',
               success:function(response){
               console.log(response);

              }
            });
          }

          function ocultar_post(id){

             $.ajax({
                url: "{{route('ocultar_post')}}",
                type: 'get',
                data: {'id': id},
                 dataType: 'json',
                 success:function(response){
                 console.log(response);


                }
              });
            }
</script>
@stop
