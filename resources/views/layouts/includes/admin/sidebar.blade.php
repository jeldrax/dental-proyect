<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
      
      @php
          $links = [
              [
                  'name' => 'Dashboard',
                  'icon' => 'fa-solid fa-gauge',
                  'href' => route('dashboard'),
                  'active' => request()->routeIs('dashboard'),
              ],
          ];

          // Lógica para ADMIN
          if (auth()->user()->hasRole('Admin')) {
              $links[] = ['header' => 'ADMINISTRACIÓN'];
              
              $links[] = [
                  'name' => 'Usuarios',
                  'icon' => 'fa-solid fa-users',
                  'href' => route('admin.users.index'),
                  'active' => request()->routeIs('admin.users.*'),
              ];
          }

          // Lógica para DENTISTAS y ADMIN
          if (auth()->user()->hasRole(['Admin', 'Dentista'])) {
              $links[] = ['header' => 'CLÍNICA'];

              $links[] = [
                  'name' => 'Tratamientos',
                  'icon' => 'fa-solid fa-tooth',
                  'href' => route('admin.treatments.index'), // route('admin.treatments.index') cuando la tengas
                  'active' => request()->routeIs('admin.treatments.*'),
              ];
          }
      @endphp

      <ul class="space-y-2 font-medium">
         @foreach ($links as $link)
            @isset($link['header'])
               <div class="px-2 pt-4 pb-2 text-xs font-semibold text-gray-500 uppercase">
                   {{ $link['header'] }}
               </div>
            @else
               <li>
                  <a href="{{ $link['href'] }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ $link['active'] ? 'bg-gray-200' : '' }}">
                     <span class="w-6 h-6 inline-flex justify-center items-center text-gray-500">
                        <i class="{{ $link['icon'] ?? '' }}"></i> 
                     </span>
                     <span class="ms-3">{{ $link['name'] }}</span>
                  </a>
               </li>
            @endisset
         @endforeach
      </ul>
   </div>
</aside>