<!DOCTYPE html>
<html x-data="" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Alpine JS and other scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/@alpinejs/trap@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <!-- Tambahkan Tom Select -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select"></script>
    <style>
      body {
                    background-image: url('{{ asset('storage/BG.png') }}');
                    background-size: cover ;
                    background-position: center;
                    background-repeat: no-repeat;
                    
                    min-height: 100vh;
                }
                .pagination nav[role="navigation"] span[aria-current="page"] span {
        background-color: #22c55e !important; /* bg-green-500 */
        border-color: #22c55e !important;
        color: white !important;
    }
    
    .pagination a:hover {
        background-color: #dcfce7 !important; /* bg-green-100 */
        border-color: #86efac !important; /* border-green-300 */
    }
    
    .pagination button:focus, .pagination a:focus {
        --tw-ring-color: rgba(134, 239, 172, 0.5) !important; /* ring-green-300 */
        border-color: #22c55e !important; /* border-green-500 */
    }
    </style>

    
    
</head>
<body class="relative overflow-hidden max-h-screen">
    <aside class="fixed inset-y-0 left-0 bg-black/95 shadow-xl max-h-screen w-60 m-4 rounded-xl">
      <div class="flex flex-col justify-between h-full">
        <div class="flex-grow">
          <div class="px-4 py-6 text-center border-b border-green-700">
            <h1 class="text-xl font-bold leading-none"><span class="text-green-700">PharmaCare</span> Admin</h1>
          </div>
          <div class="p-4">
            <ul class="space-y-3">
              <li>
                <a href="{{ url('adminDashboard') }}" class="flex items-center {{ Request::is('adminDashboard') ? 'bg-green-500 text-white' : 'bg-white/95 hover:bg-green-50 text-gray-900' }} rounded-xl font-bold py-3 px-4">
                  <i class="fas fa-chart-pie text-lg mr-4"></i>Dashboard
                </a>
              </li>
              <li x-data="{ open: true }">
                <div
                    @click="open = !open" 
                    class="flex items-center cursor-pointer rounded-xl font-bold py-3 px-4 {{ Request::is('adminDashboard/customers') || Request::is('adminDashboard/staff') ?  'bg-green-500 text-white' : ' hover:bg-green-100 text-gray-900' }}">
                    <i class="fas fa-users text-lg mr-4"></i>
                    Customer & Staf
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </div>
                <div x-show="open" x-cloak class="pl-8 py-2 space-y-2 flex flex-col">
                    <a href="{{ route('admin.customers') }}" class="flex items-center {{ Request::is('adminDashboard/customers') ?  'bg-green-500 text-white' : 'hover:bg-green-100' }} font-bold p-2 rounded-md">
                        <i class="fas fa-user-friends mr-2"></i>
                        Customer
                    </a>
                    <a href="{{ route('admin.staffs') }}" class="flex items-center {{ Request::is('adminDashboard/staff') ?  'bg-green-500 text-white' : 'hover:bg-green-100' }} font-bold p-2 rounded-md">
                        <i class="fas fa-user-tie mr-2"></i>
                        Staf
                    </a>
                </div>
              </li>
              <li>
                <a href="{{ route('admin.medicines') }}" class="flex items-center {{ Request::is('adminDashboard/medicines') ?  'bg-green-500 text-white' : ' hover:bg-green-100 text-gray-900' }} rounded-xl font-bold py-3 px-4">
                  <i class="fas fa-solid fa-pills text-lg mr-4"></i>Medicines
                </a>
              </li>
              <li>
                <a href="{{route('admin.suppliers')}}" class="flex items-center {{ Request::is('adminDashboard/suppliers') ?  'bg-green-500 text-white' : 'hover:bg-green-100 text-gray-900' }} rounded-xl font-bold  py-3 px-4">
                  <i class="fas fa-truck text-lg mr-4"></i>Suppliers
                </a>
              </li>
              <li>
                <a href="{{ route('admin.procurements') }}" class="flex items-center {{ Request::is('adminDashboard/procurements') ?  'bg-green-500 text-white' : 'bg-white hover:bg-green-100 text-gray-900' }} rounded-xl font-bold  py-3 px-4">
                    <i class="fas fa-shopping-cart text-lg mr-4"></i>Procurements
                </a>
              </li>
            </ul>
          </div>
        
        </div>
        <form action="{{ route('logout') }}" method="POST" class="px-4 py-6 text-center">
            @csrf
            <button type="submit"  class="flex items-center bg-black hover:bg-gray-700 text-white rounded-xl font-bold text-sm py-3 px-4">
                <i class="fas fa-sign-out-alt text-lg mr-4"></i>Logout
            </button>
        </form>
        </div>
      </div>
    </aside>
  
    <main class="flex flex-col flex-grow">
        @yield('content')
    </main>

    @stack('scripts')
    
  </body>
</html>