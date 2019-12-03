<link rel="stylesheet" href="/css/bootstrap.css">

<title>Fil-Rouge</title>


<nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4 mt-4 container">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/{{ $country->Continent }}/countries">{{ $country->Continent }}</a></li>
          <li class="breadcrumb-item"><a href="/country/{{ $country->Country_Id}}">{{ $country->Name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $city->Name }}</li>
        </ol>
</nav>

<div class="card text-center border-primary mt-5 rounded-square w-50 mx-auto">
        <div class="card-header">
                Ville :  <span class="text-primary font-weight-bold">{{ $city->Name }} </span>
        </div>
        <div class="card-body">
          <h5 class="card-title">District :  {{ $city->District }} </h5>
          <p class="card-text font-italic">Population :  {{ $city->Population }} </p>
        </div>
        <div class="card-footer text-muted font-italic">
                Pays :  <span class="text-uppercase"> {{ $country->Name }} </span> 
        </div>
      </div>
