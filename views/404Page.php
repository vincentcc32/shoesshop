<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/404Page.css">
    <title>404 Page</title>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>

    <div class="error-container">
        <div class="lottie-animation"></div>
        <div class="error-content">
            <h1>404</h1>
            <p>Oops! The page you're looking for doesn't exist.</p>
            <!-- <a href="?ctrl=page&view=home" class="btn btn-primary">Go to Homepage</a> -->
        </div>
    </div>

    <script>
        const animation = lottie.loadAnimation({
            container: document.querySelector('.lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://lottie.host/d987597c-7676-4424-8817-7fca6dc1a33e/BVrFXsaeui.json'
        });
    </script>
</body>

</html>