<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify 2FA Code</title>
    <link rel="stylesheet" href="../
    css/index.css">
</head>
<body>
    <header>
        <div class="header-content">
            <h1>Verify 2FA Code</h1>
        </div>
    </header>

    <main>
        <form id="verify-form" method="POST" action="verify_process.php">
            <input type="text" name="twofa_code" placeholder="Enter your 2FA code" required>
            <button type="submit">Verify</button>
        </form>
    </main>
</body>
</html>
