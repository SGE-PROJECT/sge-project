@vite('resources/js/administrator/graph-users.js')
@vite('resources/css/administrator/dashboard.css')

<div class="border-t-16 border-green-ut w-auto h-56 shadow-lg hover:shadow-2xl transition duration-200 ease-in-out bg-white rounded-sm relative">
    <a class="group w-full p-5 flex flex-col" href="/usuarios">
    <div id="container-users" class="w-full h-full min-h-[224px]"></div>
    </a>
  </div>

  <script>
    var totalUsers = {{$activeUsersCount}};
  </script>