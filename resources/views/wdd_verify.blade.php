<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="robots" content="noindex" />
    <meta name="googlebot" content="noindex" />
    <title>WDD Verify</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #0d0d0d;
			color: #6e6e6e;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			margin: 0;
			overflow: hidden;
		}
		.info{
			padding: 20px;
			margin: 0;
		}
		.red{
			color: red;
			font-size: 18px;
			font-weight: 700;
		}
		input {
			padding: 10px;
			width: 200px;
			background-color: #484848;
			border: 0;
			outline: none;
			color: #6e6e6e;
		}

		.wdd_verify_btn {
			padding: 10px 20px;
			background-color: #eaeaea;
			color: #000000;
			border: none;
			cursor: pointer;
		}

		.wdd_verify_btn:hover {
			background-color: #b3b3b3;
		}
		.verify{
			margin-top: 50px;
    display: flex;
		}
	</style>
</head>

<body>
	<div class="info">
		<div class="red">宣導：請勿公開散佈此網址</div>
		<div>親愛的使用者，<br>為了保護我們的測試環境及數據安全，我們請您務必不要公開散佈此網址。<br>這個連結僅供授權用戶使用，未經授權的訪問可能會影響系統的正常運作。</div>
		<form method="GET" class="verify">
			@csrf
			<input type="password" name="wdd_verify_key" placeholder="Please enter the key" autocomplete="off">
			<a type="submit" class="wdd_verify_btn">Send</a>
		</form>
	</div>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		document.querySelector('.wdd_verify_btn').addEventListener('click', function () {
			let wdd_verify_key = document.querySelector('input[name="wdd_verify_key"]').value;
			if (wdd_verify_key.trim().replace(/\s/g, "") === "") {
				return false;
			}
			let xhr = new XMLHttpRequest();
			xhr.open("POST", location.href, true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			
			xhr.onload = function () {
				if (xhr.status >= 200 && xhr.status < 300) {
					location.reload();
				} else {
					location.reload();
				}
			};
			xhr.onerror = function () {
				location.reload();
			};
			xhr.send("ajax=true&wdd_verify_key=" + encodeURIComponent(wdd_verify_key));
		});
	});
</script>
</body>

</html>
