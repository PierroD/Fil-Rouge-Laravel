
@if (!isset($_GET["page"]) || $_GET["page"] == 0)
@php $page = 1; @endphp
@else 
@php $page = $_GET["page"]; @endphp
@endif
@php $for_min = ($page - 1) * 10;
$for_max = $page * 10;
$paginator_lenght = $count

@endphp
@if($paginator_lenght % 10 != 0) 
@php $number_pages = floor(($paginator_lenght / 10)) + 1; @endphp
@else 
@php $number_pages = floor(($paginator_lenght / 10)); @endphp
@endif

@if(($page + 2) <= $number_pages) 
@php $pages_max = $page + 2; @endphp
@else 
@php $pages_max = $number_pages; @endphp
@endif

@if(($page - 2) >= 1) 
  @php  $pages_min = $page - 2; @endphp
@else 
@php $pages_min = 1; @endphp
@endif

<link rel="stylesheet" href="/css/bootstrap.css">

<title>Fil-Rouge</title>

<nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4 mt-4 container">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a>{{ $continent }}</a></li>
        </ol>
</nav>


<h1 class="text-secondary text-center mt-5"> Toutes les villes du continent </h1>
<h4 class="text-primary text-center"> Nombre de pays: {{ $count }}</h4>
<table class="table table-striped container mt-5 mb-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Code</th>
            <th scope="col" class="text-center">Capital</th>
        </tr>
    </thead>
    <tbody>
        @for($i = $for_min; $i < $for_max; $i++) 
           @if($i < $paginator_lenght)   
                <tr class="">
                    <th><img src="{{ $countries[$i]->Image2}}" style="height:20px;width:40px" /></th>
                    <td><a class="text-primary text-decoration-none font-weight-bold" href="/country/{{ $countries[$i]->Country_Id }}">{{ $countries[$i]->Name }}</a></td>
                    <td>{{ $countries[$i]->Code }}</td>
                    <td class="text-center">{{ $countries[$i]->capital->Name }}</td>
                </tr>
                @endif
                @endfor
    </tbody>
</table>


   <!-- paginator -->
   <nav aria-label="...">
    <ul class="pagination pagination-lg d-flex justify-content-center ">
        <li class="page-item">
            <a class="page-link" href="?page=<?= 1 ?>" aria-label="Next">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @if (($page - 1) > 0)
            <li class="page-item">
                <a class="page-link" href="?page={{ ($page - 1) }}">Previous</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="?page={{ $page }}">Previous</a>
            </li>
            @endif
            @for($j = $pages_min; $j <= $pages_max; $j++) 
                @if($j == $page) 
                <li class="page-item active" aria-current="page">
                    <span class="page-link">
                        {{ $page }}
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
            @else
                <li class="page-item"><a class="page-link" href="?page={{ $j }}">{{ $j }}</a></li>
            @endif
           @endfor
            
            @if(($page + 1) <= $number_pages)

            <li class="page-item"><a class="page-link" href="?page={{ ($page+1) }}">Next</a></li>
       @else
            <li class="page-item disabled"><a class="page-link" href="?page={{ $page }}">Next</a></li>
       @endif
        <li class="page-item">
            <a class="page-link" href="?page={{ $number_pages }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<!-- paginator -->

