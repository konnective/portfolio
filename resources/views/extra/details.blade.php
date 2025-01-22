{{-- <!DOCTYPE html> --}}
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Goal Tracker</title>
    {{-- for css from different blade files --}}
    <style>
        .main_wrapper{
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .view_wrapper{
            display: flex;
            justify-content: center;
            margin: 10px 0px 0px 0px;
        }
        .view_container{
            width: 50vw;
        }
        .navbar {
            border-radius: 30px;
            box-shadow: 2px 8px 4px 0px rgba(0, 0, 0, 0.15);
            -webkit-box-shadow: 2px 8px 4px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 2px 8px 4px 0px rgba(0, 0, 0, 0.15);
        }
    </style>
    @stack('custom-css')
</head>

<body>
    {{-- navbar component --}}
    <div class="view_wrapper">
    {{-- deciding what to do next about tailwind --}}
    {{-- idea is that there are several things to do 1. chat app for quick idea 2. implementing cyborg for notemaking 3. implementing cleopetra theme to already made tailwind laravel --}}
    {{-- what to do with cleopetra theme for admin bootstrap where to use that.?? --}}
    {{-- Also testing  --}}
    {{-- shifting second-brain folder as a main folder and making a new folder for laravel with tailwind app --}}
    {{-- making icons for different landing pages and giving links of websites to it --}}
    {{-- we can also use cyborg theme for shocasing websites. --}}
    {{-- also set up steller theme to main laravel structure --}}
    {{-- now deciding what to do next trying to make dashboard looking at the ui of others --}}
    <main class="main_wrapper mt-2">
        {{ $slot }}
    </main>
</body>

</html>
