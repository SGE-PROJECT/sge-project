@vite('resources/css/administrator/dashboard.css')
@vite('resources/js/administrator/graph-anteprojects.js')

<div class="{{ $isActive ? 'border-t-16 border-green-ut' : '' }} w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
    <a class="group w-full p-5 flex flex-col" href="/anteproyectos">
    <div id="container-anteprojects" class="w-full h-full min-h-[224px]"></div>
    </a>
  </div>

  <script>
    var totalAnteprojectsCount = {{$totalAnteprojectsCount}};
    var anteprojectsData = [
        { name: 'Registrados', y: {{$registradosCount}}, color: '#22C55E' },
        { name: 'En revisión', y: {{$enRevisionCount}}, color: '#eab308' },
        { name: 'Rechazados', y: {{$rechazadosCount}}, color: '#f87171' },
    ];
</script>
