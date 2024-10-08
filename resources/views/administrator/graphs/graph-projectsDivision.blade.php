@vite('resources/css/administrator/dashboard.css')

<div class="{{ $isActive ? 'border-t-16 border-green-ut' : '' }}  w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
    <a class="group w-full p-5 flex flex-col" href="/division-projects">
    <div id="container-projectsDivision" class="w-full h-full min-h-[224px]"></div>
    </a>
  </div>


  <script>
    var totalProjectsCount = {{$totalProjectsCount}};
    var projectsData = [
        { name: 'En curso', y: {{$enCursoCount}}, color: '#eab308' },
        { name: 'Finalizados', y: {{$finalizadosCount}}, color: '#a1a1a1' },
        { name: 'Reprobados', y: {{$reprobadosCount}}, color: '#f87171' },
    ];
</script>
@vite('resources/js/administrator/graph-projectsDivision.js')
