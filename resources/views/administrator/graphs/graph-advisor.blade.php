@vite('resources/css/administrator/dashboard.css')
@vite('resources/js/administrator/graph-advisor.js')

<div class="{{ $isActive ? 'border-t-16 border-green-ut' : '' }} w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
  <a class="group w-full p-5 flex flex-col" href="/asesores-dash">
    <div id="container-advisor" class="w-full h-full min-h-[224px]"></div>
  </a>
</div>

<script>
  // Asignar el total de asesores académicos en la división a una variable JavaScript
  var totalAdvisorsInDivision = {{ $advisorData['totalAdvisorsInDivision'] }};

  // Si necesitas pasar más datos de advisorData a tu gráfica, puedes hacerlo directamente sin mapearlos como un arreglo
  var advisorData = @json($advisorData);

  // Utiliza las variables en tu script para la gráfica. Asegúrate de que tu script graph-advisor.js sepa cómo utilizar estas variables.
</script>
