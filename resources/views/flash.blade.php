
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
@if($message = Session::get('success'))
<div class="alert alert-success alert-block"  id="success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>

@endif

@if($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button class="close" type="button" data-dismiss="alert">x</button>
        <strong>{{$message}}</strong>
    </div>
@endif

@if($message = Session::get('info'))
    <div class="alert alert-warning alert-block">
        <button class="close" type="button" data-dismiss="alert">x</button>
        <strong>{{$message}}</strong>
    </div>
@endif
@if($message = Session::get('error'))
    <div class="alert alert-danger alert-block" id="error">
        <button class="close" type="button" data-dismiss="alert">x</button>
        <strong>{{$message}}</strong>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger" >
        <button class="close" type="button" data-dismiss="alert">x</button>
        Verificacao de Erros
        {{$errors}}
    </div>
@endif

<script>
    let take_error = $("#error");
    let suc = $("#success");
    if(take_error || suc){

    setTimeout(()=>{  
       take_error.fadeOut();
       suc.fadeOut();
    },4000);
        
    }
  
        
    
</script>