@vite('resources/css/administrator/dashboard.css')

<div class="{{ $isActive ? 'border-t-16 border-green-ut' : '' }} w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
    <a class="group w-full p-5 flex flex-col" href="/usuarios">
    <div id="container-users" class="w-full h-full min-h-[224px]"></div>
    </a>
  </div>

  <script>
    var totalUsers = {{$activeUsersCount}};

    var usersData = [
        { name: 'Super Administrador', y: {{ $superAdminCount }}, color: '#2637d4' },
        { name: 'Administrador de División', y: {{ $managmentAdminCount }}, color: '#a31fe1' },
        { name: 'Asesor Académico', y: {{ $adviserCount }}, color: '#efa534' },
        { name: 'Estudiante', y: {{ $studentCount }}, color: '#6aebc3' },
        { name: 'Presidente Académico', y: {{ $presidentCount }}, color: '#0ff' },
        { name: 'Asistente de Dirección', y: {{ $secretaryCount }}, color: '#f0f' },
    ];
  </script>
  @vite('resources/js/administrator/graph-users.js')
