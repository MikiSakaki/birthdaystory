<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>絵本を作成する</title>
    
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
            background-color: rgb(255, 255, 153);
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .header {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .header img {
            height: 80px;
        }


        header {
            display: flex;
            justify-content: center; /* ロゴを中央に配置 */
            align-items: center;
            height: 80px; /* ヘッダーの高さを適切に設定 */
            position: relative; /* ログインボタンの絶対位置決め用 */
        }
        header img {
            height: 80px;
        }


        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="date"] {
            margin-bottom: 20px;
            padding: 10px;
            width: 80%;
            max-width: 300px;
        }

        button {
            background-color: #FFA54F; /* ボタンの背景色を指定 */
            color: white; /* ボタンのテキスト色を指定 */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #FFC27A; /* ホバー時の色を指定 */
        }
    </style>
    
    
</head>
<body>
    
    <div class="header">
        <img src="{{ asset('images/logo_BS.png') }}" alt="ロゴ">
    </div>



<form action="{{ route('character.save') }}" method="POST">
    @csrf
    <label for="babyName">赤ちゃんの名前</label>
    <input type="text" id="babyName" name="baby_name" value="{{ old('baby_name') }}" autocomplete="off" required>
    <br>
    <label for="babyBirthday">赤ちゃんの生年月日</label>
    <input type="date" id="babyBirthday" name="baby_birthday" value="{{ old('baby_birthday') }}" autocomplete="off" required>
    <br>
   　<input type="hidden" name="user_id" value="{{ auth()->id() }}"> <!-- ユーザーIDを隠しフィールドとして追加 -->
    <button type="submit" class="btn btn-primary btn-lg">保存する</button>
</form>



</body>
</html>
