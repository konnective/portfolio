<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hotel Front Desk Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Header -->
  <header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
      <div class="text-xl font-bold text-blue-600">🏨 HotelDesk</div>
      <nav class="flex gap-6 text-gray-600 font-medium">
        <a href="#" class="hover:text-blue-600">Dashboard</a>
        <a href="#" class="hover:text-blue-600">Bookings</a>
        <a href="#" class="hover:text-blue-600">Guests</a>
        <a href="#" class="hover:text-blue-600">Rooms</a>
        <a href="#" class="hover:text-blue-600">Check-In</a>
        <a href="#" class="hover:text-blue-600">Check-Out</a>
      </nav>
      <div class="flex items-center gap-4">
        <span class="text-gray-600">Admin</span>
        <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Logout</button>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="p-6 max-w-7xl mx-auto">
    
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
      <div class="bg-white rounded-xl p-4 shadow">
        <h2 class="text-gray-500">Today's Check-ins</h2>
        <p class="text-2xl font-bold text-blue-600">12</p>
      </div>
      <div class="bg-white rounded-xl p-4 shadow">
        <h2 class="text-gray-500">Check-outs</h2>
        <p class="text-2xl font-bold text-blue-600">8</p>
      </div>
      <div class="bg-white rounded-xl p-4 shadow">
        <h2 class="text-gray-500">Available Rooms</h2>
        <p class="text-2xl font-bold text-blue-600">24</p>
      </div>
    </div>

    <!-- Quick Actions + Calendar -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Booking Action -->
      <div class="bg-white rounded-xl p-6 shadow md:col-span-1 flex flex-col justify-center">
        <h3 class="text-lg font-bold text-gray-700 mb-4">Quick Booking</h3>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ New Booking</button>
      </div>

      <!-- Calendar -->
      <div class="bg-white rounded-xl p-6 shadow md:col-span-2">
        <h3 class="text-lg font-bold text-gray-700 mb-4">Booking Calendar</h3>
        <div class="h-40 flex items-center justify-center text-gray-400">[ Calendar Placeholder ]</div>
      </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-xl p-6 shadow mt-6">
      <h3 class="text-lg font-bold text-gray-700 mb-4">Recent Bookings</h3>
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="text-gray-600 border-b">
            <th class="p-2">Guest</th>
            <th class="p-2">Room</th>
            <th class="p-2">Check-In</th>
            <th class="p-2">Check-Out</th>
            <th class="p-2">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="p-2">John Doe</td>
            <td class="p-2">101</td>
            <td class="p-2">April 24</td>
            <td class="p-2">April 26</td>
            <td class="p-2 text-green-600">Confirmed</td>
          </tr>
          <tr class="border-b">
            <td class="p-2">Jane Smith</td>
            <td class="p-2">203</td>
            <td class="p-2">April 23</td>
            <td class="p-2">April 25</td>
            <td class="p-2 text-yellow-500">Pending</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

</body>
</html>
