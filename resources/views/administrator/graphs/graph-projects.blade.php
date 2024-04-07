@vite('resources/css/administrator/dashboard.css')

<div class="border-t-16 border-green-ut w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
    <a class="group w-full p-5 flex flex-col" href="proyectos">
    <div id="container-projects" class="w-full h-full min-h-[224px]"></div>
    </a>
  </div>


  <script>
    var totalProjectsCount = {{$totalProjectsCount}};
    var projectsData = [
        { name: 'Completados', y: {{$enDesarrolloCount}}, color: '#22C55E' },
        { name: 'En desarrollo', y: {{$reprobadosCount}}, color: '#eab308' },
        { name: 'Reprobados', y: {{$completadosCount}}, color: '#f87171' },
    ];
</script>
@vite('resources/js/administrator/graph-projects.js')
