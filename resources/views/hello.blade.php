<link rel="stylesheet" href="/css/bootstrap.css">


<h1 class="text-center text-primary"> Bonjour mon maître Pierro LPBO</h1>
<div class="text-center">
    <img src="https://media.giphy.com/media/LW5vBvAb48Oe9OoEKT/giphy.gif" />
</div>

<p class="text-center"> hello : {{$name}}</p>


<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Navbar</a>
    <form class="form-inline" action="/result" method="POST">
        @csrf
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>