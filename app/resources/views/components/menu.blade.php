<ul class="navbar-nav  ">

   @foreach ($menu as $item)

    <li class="nav-item @if($item['active']) active @endif">
        <a class="nav-link" href="{{ route($item['route'])}}">{{$item['title']}}</a>
    </li>

    @endforeach




</ul>
