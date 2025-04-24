<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            background: #f5f7fa;
        }

        .dashboard {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #eef2f1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .user {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            margin: 10px 0;
            cursor: pointer;
        }

        .main {
            flex-grow: 1;
            padding: 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .top-bar input {
            width: 200px;
            padding: 5px;
        }

        .content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .charts {
            display: flex;
            gap: 20px;
        }

        .chart {
            background: white;
            flex: 1;
            height: 300px;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">Filllo</div>
            <div class="user">👤 Washim</div>
            <nav>
                <ul>
                    <li>Home</li>
                    <li>Front Desk</li>
                    <li>Reservations</li>
                    <li>Guests</li>
                    <li>Housekeeping</li>
                    <li>Tasks</li>
                    <li>Online Booking</li>
                    <li>Accounts</li>
                    <li>Reports</li>
                </ul>
            </nav>
        </aside>
        <main class="main">
            <header class="top-bar">
                <input type="search" placeholder="Search..." />
                <div class="profile">Washim Chowdhury ⬇</div>
            </header>

            <section class="content">
                <div class="cards">
                    <div class="card">Reservations</div>
                    <div class="card">Check In Guests</div>
                </div>
                <div class="charts">
                    <div class="chart">🌍 Map + Guests</div>
                    <div class="chart">📊 Occupancy Chart</div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
