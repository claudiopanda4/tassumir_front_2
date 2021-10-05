@section('header-main')
<header class="header-main header-main-component clearfix">
        <ul class="ul-left clearfix">
            <li class="title clearfix">
                <a href=""><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
            </li>
            <li class="search-lg mobile-hidden">
                <div class="input-search">
                    <i class="fas fa-search fa-16 fa-search-main"></i>
                    <input type="search" name="" placeholder="O que está procurando?" class="input-text">
                </div>
            </li>
        </ul>
        <nav class="menu-header">
            <ul class="clearfix">
                <li class="l-5 mobile-header-icon">
                    <a href=""><i class="fas fa-search fa-24" size="7"></i></a>
                </li>
                <li class="l-5 mobile-header-icon">
                    <a href=""><i class="far fa-bell fa-24" size="7"></i></a>
                </li>
                <li class="l-5 mobile-hidden">
                    <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                </li>
                <li class="user-tassumir clearfix l-5">
                    <img class="l-5" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                    <a href="" class="l-5"><h1 class="user-account">Delton</h1></a>
                </li>
            </ul>
        </nav>
</header>
@stop