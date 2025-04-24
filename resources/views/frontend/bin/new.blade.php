<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotel Booking Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 font-sans">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Arrival, Departure, Stayover, Housekeeping -->
    <div class="bg-white rounded-2xl shadow p-4">
      <h2 class="text-xl font-semibold mb-2">Guest Status</h2>
      <div class="grid grid-cols-2 gap-2">
        <div>Arrival: <span class="font-bold">12</span></div>
        <div>Departure: <span class="font-bold">10</span></div>
        <div>Stayover: <span class="font-bold">25</span></div>
        <div>Housekeeping: <span class="font-bold">8</span></div>
      </div>
    </div>

    <!-- Housekeeping Status -->
    <div class="bg-white rounded-2xl shadow p-4">
      <h2 class="text-xl font-semibold mb-2">Housekeeping</h2>
      <div class="grid grid-cols-2 gap-2">
        <div>Dirty: <span class="font-bold">6</span></div>
        <div>Occupied: <span class="font-bold">15</span></div>
        <div>Clean: <span class="font-bold">20</span></div>
        <div>Vacant: <span class="font-bold">12</span></div>
      </div>
    </div>

    <!-- Daily Projection -->
    <div class="bg-white rounded-2xl shadow p-4">
      <h2 class="text-xl font-semibold mb-2">Daily Projection</h2>
      <div>
        Expected Check-ins: <span class="font-bold">18</span><br>
        Expected Check-outs: <span class="font-bold">16</span>
      </div>
    </div>

    <!-- Room Statistics -->
    <div class="bg-white rounded-2xl shadow p-4">
      <h2 class="text-xl font-semibold mb-2">Room Statistics</h2>
      <div class="grid grid-cols-2 gap-2">
        <div>Available: <span class="font-bold">30</span></div>
        <div>Occupied: <span class="font-bold">25</span></div>
        <div>Reserved: <span class="font-bold">5</span></div>
        <div>Cancelled: <span class="font-bold">2</span></div>
        <div>Out of Order: <span class="font-bold">3</span></div>
      </div>
    </div>
  </div>

  <!-- Room Availability by Category -->
  <div class="bg-white rounded-2xl shadow p-4">
    <h2 class="text-xl font-semibold mb-4">Room Availability</h2>
    <table class="min-w-full text-left border">
      <thead class="bg-gray-200">
        <tr>
          <th class="p-2 border">Category</th>
          <th class="p-2 border">Price</th>
          <th class="p-2 border">Available Rooms</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="p-2 border">Deluxe</td>
          <td class="p-2 border">$120</td>
          <td class="p-2 border">10</td>
        </tr>
        <tr>
          <td class="p-2 border">Suite</td>
          <td class="p-2 border">$180</td>
          <td class="p-2 border">5</td>
        </tr>
        <tr>
          <td class="p-2 border">Standard</td>
          <td class="p-2 border">$90</td>
          <td class="p-2 border">15</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
