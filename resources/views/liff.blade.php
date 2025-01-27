<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIFF Order System</title>
    <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
</head>
<body>
    <h1>Welcome to LIFF Order System</h1>
    <button id="orderBtn">Order Now</button>

    <script>
        liff.init({ liffId: "{{ env('LIFF_ID') }}" })
            .then(() => {
                if (liff.isInClient()) {
                    console.log("LIFF initialized");
                } else {
                    liff.login();
                }
            })
            .catch(err => console.error("LIFF error", err));

        document.getElementById('orderBtn').addEventListener('click', () => {
            alert('Order button clicked!');
        });
    </script>
</body>
</html>
