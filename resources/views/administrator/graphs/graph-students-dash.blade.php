@vite('resources/css/administrator/dashboard.css')
@vite('resources/js/administrator/graph-students.js')

<div class="{{ $isActive ? 'border-t-16 border-green-ut' : '' }}  w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
  <a class="group w-full p-5 flex flex-col" href="/estudiantes-dash">
    <div id="container-students" class="w-full h-full min-h-[224px]"></div>
    </a>
  </div>
  <script>
   var totalStudentsInDivision = {{ $totalStudentsInDivision }};
  var programData = @json($programsData).map(function(program) {
      return {
          name: program.program_name,
          y: parseFloat(program.percentage)
      };
  });
</script>