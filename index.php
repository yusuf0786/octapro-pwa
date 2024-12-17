<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title></title>
</head>
<style>
    .mobile-body {
        padding: 0;
        width: 100%;
        max-width: 576px;
        margin: 0 auto;
        overflow: hidden;
    }
    iframe {
        width: 100%;
        min-height: 100vh;
    }
</style>
<body class="mobile-body">

    <iframe src="dashboard.php" frameborder="0"></iframe>

    <script>
    if (window.innerWidth <= 768) {
        window.location.href = "dashboard.php";
    }
    </script>
</body>
</html>