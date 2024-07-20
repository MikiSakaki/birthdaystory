@extends('layouts.header')

@section('content')

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
        flex-direction: column;
        justify-content: center;
        align-items: center;
  
        min-height: 100vh;
        margin: 0;
        background-color: white;
        overflow-y: auto; /* スクロール可能にする */
    }

    .logo-container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
        margin-top: 100px; /* 上にスペースを追加 */
        background-color: white; /* 背景色を白に設定 */
    }

    .logo-container img {
        max-width: 200px;
        height: auto;
    }

    .content-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .container {
        text-align: center;
        position: relative;
    }

    .image-container {
        display: flex;
        justify-content: center;
        margin-bottom: 60px; /* ボタンのマージンが確実に反映されるように調整 */
        border: 1px solid gray; /* 細いグレイの枠線を追加 */
    }

    .image-wrapper {
        margin: 10px 0; /* 余白を調整 */
        position: relative;
        width: 350px;
        height: 350px;
        text-align: center;
    }

    .overlay-text {
        position: absolute;
        top: calc(50% - 60px); /* 現在の位置から20px上に移動 */
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 12px;
        font-weight: bold;
        color: black; /* 文字色を黒色に設定 */
        font-family: 'Noto Sans', sans-serif; /* Noto Sans フォントを設定 */
        text-shadow: none; /* シャドーを無しにする */
    }

    .edit-button {
        width: 200px;
        text-align: center;
        padding: 10px;
        background-color: #FFA54F;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px; /* 角を丸くする */
        margin: 20px auto 50px !important; /* 上側のマージンを10pxに設定、下側のマージンを30pxに設定 */
        
    }

    .edit-button:hover {
        background-color: #FFC27A;
    }

    .baby-image {
        width: 350px;
        height: 350px;
        object-fit: cover;
    }

    .overlay-text_book_0 {
        position: absolute;
        top: calc(50% - 70px); /* 現在の位置から20px上に移動 */
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        font-weight: bold;
        color: black; /* 文字色を黒色に設定 */
        font-family: 'Noto Sans', sans-serif; /* Noto Sans フォントを設定 */
        text-shadow: none; /* シャドーを無しにする */
    }
    
    .footer-content {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100px; /* 高さを必要に応じて調整 */
     position: relative;
    bottom: 0;
    }
    


    </style>
</head>


<body>
    <div class="logo-container">
        <img src="/images/logo_BS.png" alt="ロゴ">
    </div>
    
    <div class="content-container">
        <div class="container">
            <img src="{{ asset('images/book_0.png') }}" alt="0.jpg" class="baby-image">
            <div class="overlay-text_book_0">
                {{ $babyName }}の<br>Birthday Story
            </div>
        </div>
        
        <br>

        <!-- 1-2 -->
        <div class="image-container">
            <div class="image-wrapper">
                <img src="/images/1.png" alt="Left Image">
                <div class="overlay-text" id="left-text1">{{ $stories['story1'] ?? 'ある日、ママはお医者さんから「赤ちゃんがいますよ」と言われました。ずっと待ち望んでいた知らせに、ママは胸がいっぱいになりました。' }}</div>
                <button class="edit-button" onclick="openModal('left1')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        
            <div class="image-wrapper">
                <img src="/images/2.png" alt="Right Image">
                <div class="overlay-text" id="right-text1">{{ $stories['story2'] ?? 'パパも同じように、嬉しさと驚きで胸がドキドキしました。私たちのもとに赤ちゃんが来てくれるなんて、本当に夢みたいでした。' }}</div>
                <button class="edit-button" onclick="openModal('right1')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        </div>
        
        <!-- 3-4 -->
        <div class="image-container">
            <div class="image-wrapper">
                <img src="/images/3.png" alt="Left Image">
                <div class="overlay-text" id="left-text2">{{ $stories['story3'] ?? 'ママのお腹が少しずつ大きくなるたびに、赤ちゃんが元気に育っていることを感じました。毎晩、お腹に手を当てて「元気に育ってね」と話しかけました。' }}</div>
                <button class="edit-button" onclick="openModal('left2')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        
            <div class="image-wrapper">
                <img src="/images/4.png" alt="Right Image">
                <div class="overlay-text" id="right-text2">{{ $stories['story4'] ?? 'パパも毎日、赤ちゃんに話しかけていました。「パパだよ。会える日が待ち遠しいよ」。赤ちゃんが動くのを感じると、二人で喜びました。' }}</div>
                <button class="edit-button" onclick="openModal('right2')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        </div>
        
        <!-- 5-6 -->
        <div class="image-container">
            <div class="image-wrapper">
                <img src="/images/5.png" alt="Left Image">
                <div class="overlay-text" id="left-text3">{{ $stories['story5'] ?? 'ついに出産の日がやってきました。ママは少し不安もありましたが、何よりも赤ちゃんに会える喜びが勝りました。' }}</div>
                <button class="edit-button" onclick="openModal('left3')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        
            <div class="image-wrapper">
                <img src="/images/6.png" alt="Right Image">
                <div class="overlay-text" id="right-text3">{{ $stories['story6'] ?? 'パパはママを励ましながら、一緒にドキドキしていました。赤ちゃんが生まれた瞬間、二人とも涙がこぼれました。赤ちゃんが「こんにちは」と言ってくれた気がしました。' }}</div>
                <button class="edit-button" onclick="openModal('right3')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        </div>
        
        <!-- 7-8 -->
         <div class="image-container">
            <div class="image-wrapper">
                <img src="/images/7.png" alt="Left Image">
                <div class="overlay-text" id="left-text4">{{ $stories['story7'] ?? '生まれてきた赤ちゃんを見て、パパとママは「○○ちゃん」という名前をつけました。この名前にはたくさんの愛と希望が込められています。' }}</div>
                <button class="edit-button" onclick="openModal('left4')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        
            <div class="image-wrapper">
                <img src="/images/8.png" alt="Right Image">
                <div class="overlay-text" id="right-text4">{{ $stories['story8'] ?? '「○○ちゃん、あなたが私たちのもとに来てくれて本当に嬉しいよ」。名前を呼ぶたびに、幸せな気持ちが溢れてきます。' }}</div>
                <button class="edit-button" onclick="openModal('right4')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        </div>
        
        
        <!-- 9-10 -->
         <div class="image-container">
            <div class="image-wrapper">
                <img src="/images/9.png" alt="Left Image">
                <div class="overlay-text" id="left-text5">{{ $stories['story9'] ?? 'ママと赤ちゃんは病院でしばらく過ごしました。お医者さんや看護師さんがたくさんお手伝いしてくれました。パパも毎日会いに来てくれました。' }}</div>
                <button class="edit-button" onclick="openModal('left5')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        
            <div class="image-wrapper">
                <img src="/images/10.png" alt="Right Image">
                <div class="overlay-text" id="right-text5">{{ $stories['story10'] ?? '毎日少しずつ、赤ちゃんと一緒に過ごす時間が増えていきました。パパとママは赤ちゃんが笑うたびに、心から幸せを感じました。' }}</div>
                <button class="edit-button" onclick="openModal('right5')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        </div>
        
        
        <!-- 11-12 -->
         <div class="image-container">
            <div class="image-wrapper">
                <img src="/images/11.png" alt="Left Image">
                <div class="overlay-text" id="left-text6">{{ $stories['story11'] ?? '家に帰ってから、パパとママは赤ちゃんとの新しい生活を始めました。毎日、赤ちゃんのために色んなことをしました。お歌を歌ったり、絵本を読んだり。' }}</div>
                <button class="edit-button" onclick="openModal('left6')" style="margin-top: 10px; margin-bottom: 30px !重要;">ストーリーを編集する</button>
            </div>
        
            <div class="image-wrapper">
                <img src="/images/12.png" alt="Right Image">
                <div class="overlay-text" id="right-text6">{{ $stories['story12'] ?? '赤ちゃんの笑顔や泣き声、一つ一つが宝物です。私たちのもとに来てくれて、本当にありがとう。これからもずっと一緒だよ。' }}</div>
                <button class="edit-button" onclick="openModal('right6')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        </div>
                
        <!-- 13-14 -->
         <div class="image-container">
            <div class="image-wrapper">
                <img src="/images/13.png" alt="Left Image">
                <div class="overlay-text" id="left-text7">{{ $stories['story13'] ?? '親愛なる○○ちゃんへ、あなたが生まれてきてくれて、本当にありがとう。あなたのおかげで、毎日がとても幸せです。' }}</div>
                <button class="edit-button" onclick="openModal('left7')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        
            <div class="image-wrapper">
                <img src="/images/14.png" alt="Right Image">
                <div class="overlay-text" id="right-text7">{{ $stories['story14'] ?? 'これからもずっと、一緒に楽しい思い出を作りましょう。愛を込めて、パパとママより。' }}</div>
                <button class="edit-button" onclick="openModal('right7')" style="margin-top: 10px; margin-bottom: 30px !important;">ストーリーを編集する</button>
            </div>
        </div>
        
    </div>
    
    <!-- モーダルウィンドウ -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">ストーリーを編集する</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" id="editText" rows="4"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="saveEditedText()">保存</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <script>
function openModal(imageId) {
    var initialTextMap = {
        'left1': 'ある日、ママはお医者さんから「赤ちゃんがいますよ」と言われました。ずっと待ち望んでいた知らせに、ママは胸がいっぱいになりました。',
        'right1': 'パパも同じように、嬉しさと驚きで胸がドキドキしました。私たちのもとに赤ちゃんが来てくれるなんて、本当に夢みたいでした。',
        'left2': 'ママのお腹が少しずつ大きくなるたびに、赤ちゃんが元気に育っていることを感じました。毎晩、お腹に手を当てて「元気に育ってね」と話しかけました。',
        'right2': 'パパも毎日、赤ちゃんに話しかけていました。「パパだよ。会える日が待ち遠しいよ」。赤ちゃんが動くのを感じると、二人で喜びました。',
        'left3': 'ついに出産の日がやってきました。ママは少し不安もありましたが、何よりも赤ちゃんに会える喜びが勝りました。',
        'right3': 'パパはママを励ましながら、一緒にドキドキしていました。赤ちゃんが生まれた瞬間、二人とも涙がこぼれました。赤ちゃんが「こんにちは」と言ってくれた気がしました。',
        'left4': '生まれてきた赤ちゃんを見て、パパとママは「○○ちゃん」という名前をつけました。この名前にはたくさんの愛と希望が込められています。',
        'right4': '「○○ちゃん、あなたが私たちのもとに来てくれて本当に嬉しいよ」。名前を呼ぶたびに、幸せな気持ちが溢れてきます。',
        'left5': 'ママと赤ちゃんは病院でしばらく過ごしました。お医者さんや看護師さんがたくさんお手伝いしてくれました。パパも毎日会いに来てくれました。',
        'right5': '毎日少しずつ、赤ちゃんと一緒に過ごす時間が増えていきました。パパとママは赤ちゃんが笑うたびに、心から幸せを感じました。',
        'left6': '家に帰ってから、パパとママは赤ちゃんとの新しい生活を始めました。毎日、赤ちゃんのために色んなことをしました。お歌を歌ったり、絵本を読んだり。',
        'right6': '赤ちゃんの笑顔や泣き声、一つ一つが宝物です。私たちのもとに来てくれて、本当にありがとう。これからもずっと一緒だよ。',
        'left7': '親愛なる○○ちゃんへ、あなたが生まれてきてくれて、本当にありがとう。あなたのおかげで、毎日がとても幸せです。',
        'right7': 'これからもずっと、一緒に楽しい思い出を作りましょう。愛を込めて、パパとママより。',
    };

    var initialText = initialTextMap[imageId] || 'デフォルト初期値';

    $.ajax({
        url: '{{ route('getStory') }}',
        method: 'GET',
        data: { imageId: imageId },
        success: function(response) {
            console.log('AJAXリクエスト成功:', response);
            if (response.story !== undefined) {
                $('#editText').val(response.story);
            } else {
                $('#editText').val(initialText);
            }
            $('#editModal').modal('show');
            $('#editModal').attr('data-image-id', imageId);
        },
        error: function(xhr, status, error) {
            console.error('ストーリーの取得に失敗しました:', error);
            $('#editText').val(initialText);
            $('#editModal').modal('show');
            $('#editModal').attr('data-image-id', imageId);
        }
    });
}

function saveEditedText() {
    var editedText = $('#editText').val();
    var imageId = $('#editModal').attr('data-image-id');
    var textIdMap = {
        'left1': '#left-text1',
        'right1': '#right-text1',
        'left2': '#left-text2',
        'right2': '#right-text2',
        'left3': '#left-text3',
        'right3': '#right-text3',
        'left4': '#left-text4',
        'right4': '#right-text4',
        'left5': '#left-text5',
        'right5': '#right-text5',
        'left6': '#left-text6',
        'right6': '#right-text6',
        'left7': '#left-text7',
        'right7': '#right-text7'
    };

    var textId = textIdMap[imageId] || '#default-text';
    $(textId).text(editedText);

    $.ajax({
        url: '{{ route('save.story') }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            imageId: imageId,
            story: editedText
        },
        success: function(response) {
            console.log('ストーリーが保存されました:', response);
            $('#editModal').modal('hide');
        },
        error: function(xhr, status, error) {
            console.error('ストーリーの保存に失敗しました:', error);
        }
    });
}
</script>
</body>
</html>

<footer>
    <div class="footer-content">
        <p>Copyright © 2023 wellf</p>
    </div>
</footer>

@endsection