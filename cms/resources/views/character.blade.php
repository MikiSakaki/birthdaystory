<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>絵本を作成する</title>
</head>
<body>

<form action="{{ route('character.save') }}" method="POST">
    @csrf
    <label for="babyName">赤ちゃんの名前：</label>
    <input type="text" id="babyName" name="baby_name" value="{{ old('baby_name') }}" autocomplete="off" required>
    <br>
    <label for="babyBirthday">赤ちゃんの生年月日：</label>
    <input type="date" id="babyBirthday" name="baby_birthday" value="{{ old('baby_birthday') }}" autocomplete="off" required>
    <br>
   　<input type="hidden" name="user_id" value="{{ auth()->id() }}"> <!-- ユーザーIDを隠しフィールドとして追加 -->
    <button type="submit" class="btn btn-primary btn-lg">保存する</button>
</form>

<div class="mt-4">
    <form action="{{ route('create') }}" method="GET">
        <button type="submit" class="btn btn-primary btn-lg">絵本を作成する</button>
    </form>
</div>


</body>
</html>
