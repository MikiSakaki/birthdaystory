@extends('layouts.header')

@section('title', 'ホームページ')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap');
    
        body {
            background-color: rgb(255, 255, 153);
            font-family: 'Noto Sans', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
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
        .login-button {
            position: absolute;
            right: 20px; /* ログインボタンを右端に配置 */
            background-color: #FFA54F;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .login-button:hover {
            background-color: #FFC27A;
        }
        
        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            flex-grow: 1; /* 残りのスペースを占める */
        }

        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 3列のグリッド */
            gap: 20px; /* ボックス間の間隔 */
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .grid-item {
            background-color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px; /* ボックスの角を丸くする */
        }
        
        .register-button {
            background-color: #FFA54F;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        
        .register-button:hover {
            background-color: #FFC27A;
        }
        
        footer {
            color: black;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            background-color: rgb(255, 255, 153); /* 背景色を追加 */
        }
        
        .first-view {
            max-height: calc(100vh - 200px); /* 高さを200px短くする */
            object-fit: cover; /* 画像のアスペクト比を保ちつつ、高さに収める */
            width: 100%; /* 横幅を100%に設定 */
        }
        
        .grid-item h2 {
            margin-top: 0; /* 見出しの上部マージンを削除 */
            font-size: 1.5rem; /* 見出しのフォントサイズを設定 */
        }

        .grid-item p {
            font-size: 1rem; /* 本文のフォントサイズを設定 */
            color: #333; /* 本文のテキストカラーを設定 */
        }
        
        
        .grid-item img {
            width: 100px; /* イラストの幅を指定 */
            height: 100px; /* イラストの高さを指定 */
            object-fit: contain; /* イラストのアスペクト比を保つ */
            margin-bottom: 10px; /* イラストと見出しの間にマージンを追加 */
        }
        
       h1, h3 {
            text-align: center; /* テキストを中央に揃える */
        }

        h1 {
            margin: 40px 0 20px 0; /* 上部マージンを40px、下部マージンを20pxに設定 */
        }

        h3 {
            margin: 0 0 20px 0; /* 下部マージンを40pxに設定 */
        }
        
    </style>

    <header>
        <img src="{{ asset('images/logo_BS.png') }}" alt="ロゴ">
        <a href="{{ route('login') }}" class="login-button">ログイン</a>
    </header>
    
    
    <div>
        <img src="{{ asset('images/fb.png') }}" alt="ファーストビュー" class="first-view">
    </div>
    
    <div class="center-content">
        <h1>
            出産の数だけドラマがある、その奇跡の瞬間を<br>
            ”絵本”で子供に紡ぎませんか？
        </h1>
            
            
        <h3>
　　　　　　パパやママからの読み聞かせを通じて<br>
　　　　　　子供へ愛を伝えることができる<br>
　　　　　　子供がパパやママからの想いを確認できる<br>
　　　　　　そんな自分達だけのオリジナル出産ストーリーを絵本に。<br>
　　　　　
　　　　</h3>
            
            
        
        <div class="grid-container">
        
            <div class="grid-item">
                <img src="{{ asset('images/point_1.png') }}" alt="イラスト">
                <h2>思い出に浸って作成</h2>
                <p>出産当時の様子を思い返して笑ったり、思わず涙することも。パパやママのコミュニケーションツールとなり、作成過程もが楽しめます。</p>
            </div>
            
            <div class="grid-item">
                <img src="{{ asset('images/point_2.png') }}" alt="イラスト">
                <h2>当時の感情が残せる</h2>
                <p>産前の様子をはじめ、写真だけでは残せない記憶や感情を、オリジナルストーリーを通じて親から子への視点で残すことができます。</p>
            </div>
            
            <div class="grid-item">
                <img src="{{ asset('images/point_3.png') }}" alt="イラスト">
                <h2>親子の語り場を創出</h2>
                <p>デジタルデバイスに埋もれることなく、手触り感のある絵本として手にすることができます。絵本の読み聞かせを通じて親子の絆に寄り添います。</p>
            </div>
            
            <div class="grid-item">
                <img src="{{ asset('images/point_4.png') }}" alt="イラスト">
                <h2>子供の成長と共に</h2>
                <p>幼少期から小学生、中学生...大人、そして子供自身が親になる時と、成長と共に絵本の存在、メッセージの受け取り方が進化する絵本です。</p>
            </div>
 
        </div>
        
        <a href="{{ route('register') }}" class="register-button">アカウントを作成して絵本をつくる</a>
    </div>
    
    <div>
        <!-- 他のコンテンツがここに挿入される -->
    </div>
    
    <footer>
        <div class="footer-content">
            <p>Copyright © 2023 wellf</p>
            
             </footer>
    
