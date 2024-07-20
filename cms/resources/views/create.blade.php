<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>絵本作成ページ</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    
    　　body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
    }
    
    .container {
        text-align: center;
        position: relative;
    }
    
    .image-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    
    .image-wrapper {
        margin: 0 10px; /* 余白を調整 */
        position: relative;
        width: 350px;
        height: 350px;
        text-align: center;
    }
    
    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .overlay-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        font-weight: bold;
        color: white;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
    }
    
    .edit-button {
        width: 200px;
        text-align: center;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        margin: 10px auto 0; /* 上側のマージンを追加 */
    }
    
    .edit-button:hover {
        background-color: #0056b3;
    }


    </style>
</head>
<body>
    
    <div class="container">
        <img src="/images/0.jpg" alt="0.jpg" class="baby-image">
        <div class="overlay-text">
            {{ $babyName }}のBirthday Story
        </div>
    </div>
    
    
    <br>

    <div class="image-container">
        <div class="image-wrapper">
            <img src="/images/left-1.jpg" alt="Left Image">
            <div class="overlay-text" id="left-text1">{{ $story1 ?? 'おめでとう' }}</div>
            <button class="edit-button" onclick="openModal('left1')">ストーリーを編集する</button>
        </div>
    
        <div class="image-wrapper">
            <img src="/images/right-1.jpg" alt="Right Image">
            <div class="overlay-text" id="right-text1">{{ $story2 ?? 'おめでとう' }}</div>
            <button class="edit-button" onclick="openModal('right')">ストーリーを編集する</button>
        </div>
    </div>




</body>
</html>
