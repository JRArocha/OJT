<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/R.e7e4d800b99f44d0a4a829f5126ca862?rik=JQWcj5P8Ymgwpw&riu=http%3a%2f%2fwedo.russnino.com%2fwp-content%2fuploads%2f2018%2f03%2flogo-1.png&ehk=Beuc%2b0ybW0GoeV6KXIF7GdgrETR38wHIsB%2bRdgp%2fP%2bA%3d&risl=&pid=ImgRaw&r=0">
    <title>Login Page</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled JQuery -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <!-- Latest compiled Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Latest compiled font awesome -->
    <script src="https://kit.fontawesome.com/941ad23302.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/WeDoProject.js') }}"></script>

</head>

<body class="bg-dark text-muted">
    <div class="container py-5 bg-dark text-center">
        <div class="row py-5">
            <div class="col-lg-6 bg-dark py-4">
                <img src="https://th.bing.com/th/id/R.e7e4d800b99f44d0a4a829f5126ca862?rik=JQWcj5P8Ymgwpw&riu=http%3a%2f%2fwedo.russnino.com%2fwp-content%2fuploads%2f2018%2f03%2flogo-1.png&ehk=Beuc%2b0ybW0GoeV6KXIF7GdgrETR38wHIsB%2bRdgp%2fP%2bA%3d&risl=&pid=ImgRaw&r=0" alt="" style="width: 65%;">
            </div>
            <div class="col-lg-6 bg-dark text-center">
                <div class="w-75 bg-dark py-3">
                    <h2 class="text-center py-2">Login</h2>
                    <form class="row g-4 py-2 justify-content-center text-dark" >
                        <input class="form-control w-75" type="text" name="username" id="username" placeholder="Email or Phone Number">.
                        <input class="form-control w-75" type="password" name="password" id="password" placeholder="Password">
                        <button class="btn btn-primary w-75" type="button" id="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
