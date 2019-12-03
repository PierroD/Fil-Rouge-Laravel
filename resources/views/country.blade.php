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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

<nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4 mt-4 container">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/{{ $country->Continent }}/countries">{{ $country->Continent }}</a></li>
          <li class="breadcrumb-item active" aria-current="page" href="/{{ $country->Continent }}/{{ $country->Name }}">{{ $country->Name }}</li>
        </ol>
</nav>

<title>Fil-Rouge</title>

<h1 class="text-secondary text-center mt-5"> Information d'une ville </h1>

<div class="row mx-auto mb-5">
        <div class="col-6">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Country ID</th>
                        <td>{{ $country->Country_Id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Code</th>
                        <td>{{ $country->Code }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{ $country->Name }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Continent</th>
                        <td>{{ $country->Continent }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Région</th>
                        <td>{{ $country->Region }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Superficie</th>
                        <td>{{ $country->SurfaceArea }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Année Indépendance</th>
                        <td>{{ $country->IndepYear }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Population</th>
                        <td>{{ $country->Population }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Espérence de vie</th>
                        <td>{{ $country->LifeExpectancy }}</td>
                    </tr>
                    <tr>
                        <th scope="row">GNP</th>
                        <td>{{ $country->GNP }}</td>
                    </tr>
                    <tr>
                        <th scope="row">GNPOld</th>
                        <td>{{ $country->GNPOld }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nom Local</th>
                        <td>{{ $country->LocalName }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Gouvernement</th>
                        <td>{{ $country->GovernmentForm }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Chef du pays</th>
                        <td>{{ $country->HeadOfState }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nombre de capitals</th>
                        <td>{{ $country->Capital }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Code2</th>
                        <td>{{ $country->Code2 }}</td>
                    </tr>

                    </tr>
                </tbody>
            </table>
        </div>
    <div class="col-6">
        <div class="row justify-content-center align-items-center">
            <img src="{{ $country->Image2 }}" style="height:300px"/>
        </div>
        <div class="mt-4 row justify-content-center align-items-center">


                <div class="container"> <canvas id="myChart" class="chartjs"></canvas></div>
            </div>
            
            
            @php $arraylanguages = [];
            $arraypourcentages = [];
            @endphp
            @foreach ($countrylanguage as $cl) 
               @php $arraylanguages[] = $cl->Language; @endphp
            @endforeach
            @foreach ($countrylanguage as $cl)
             @php $arraypourcentages[] = intval($cl->Percentage); @endphp
            @endforeach
            
            
            <script>
                let myChart = document.getElementById('myChart');
                let myPieChart = new Chart(myChart, {
                    type: 'pie',
                    data: {
                        labels: <?= json_encode($arraylanguages) ?>,
                        datasets: [{
                            label: 'Population',
                            data: <?= json_encode($arraypourcentages) ?>,
                            backgroundColor: [
                                'rgba(255, 50, 100, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 102, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                'rgba(255, 99, 132, 0.6)'
                            ],
                        }],
                    },
                    options: {
                    },
                });
            </script>
            
            
       </div>     
  
    
</div>

<h4 class="text-secondary text-center"> Nombre de villes : <span class="text-primary font-weight-bold">{{ $cities->count() }}</span></h4>
<table class="table table-striped container mt-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">CountryCode</th>
            <th scope="col">District</th>
            <th scope="col" class="text-center">Population</th>
        </tr>
    </thead>
    <tbody>
            @for($i = $for_min; $i < $for_max; $i++) 
               @if($i < $paginator_lenght)   
               @if($cities[$i]->City_Id != $country->Capital)
                    <tr class="">
                @else
                    <tr class="bg-info">
                @endif
                        <td><a class="text-primary text-decoration-none font-weight-bold" href="/city/{{ $cities[$i]->City_Id }}">{{ $cities[$i]->Name }}</a></td>
                        <td>{{ $cities[$i]->CountryCode }}</td>
                        <td class="font-italic">{{ $cities[$i]->District }}</td>
                        <td class="text-center"> {{ $cities[$i]->Population }}</td>
                    </tr>
                    @endif
                    @endfor
        </tbody>
    </table>
    
    
       <!-- paginator -->
       <nav aria-label="...">
        <ul class="pagination pagination-lg d-flex justify-content-center mb-5 mt-4">
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
