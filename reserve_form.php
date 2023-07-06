<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/pke3ujd.css">
    <script src="https://kit.fontawesome.com/0fb73e8725.js" crossorigin="anonymous"></script>
</head>
<body id="reserve_form">
    
<header class="header">
    <h1 class="header__logo"><a href="index.php"><img src="image/camplogo.svg" alt="foreach campground"></a></h1>
        <nav id="g-nav">
        <ul class="nav">
            <li class="g-nav__item"><a href="#">予約</a></li>
            <li class="g-nav__item"><a href="onlineshop.php">オンラインショップ</a></li>
        </ul>
            </nav>
        </header>
    <main>
        <article>
        <h1>予約フォーム</h1>

        <form action="/reserve" method="post">
        <label for="name">氏名:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">電話番号:</label>
        <input type="tel" id="phone" name="phone">
        
        <label for="arrival">到着日:</label>
        <input type="date" id="arrival" name="arrival" required>
        
        <label for="departure">出発日:</label>
        <input type="date" id="departure" name="departure" required>
        
        <label for="number_of_people">人数:</label>
        <input type="number" id="number_of_people" name="number_of_people" required>
        
        <label for="site_type">サイトタイプ:</label>
        <select id="site_type" name="site_type">
            <option value="free">フリーサイト(電源なし)</option>
            <option value="auto">区画電源オートサイト(電源あり)</option>
            <option value="solo">ソロキャンプサイト(電源なし)</option>
        </select>
        
        <label for="additional_options">追加オプション:</label>
        火起こしセット
        <input type="checkbox" id="fire_kit" name="additional_options" value="fire_kit">
        椅子
        <input type="checkbox" id="chair" name="additional_options" value="chair">
        
        <label for="special_requests">特別な要求:</label>
        <textarea id="special_requests" name="special_requests"></textarea>
        
        <button type="submit">予約</button>
    </form>







        </article>
    </main>
        <footer class="footer">
        <div class="ft">
        <ul class="ft__ul">
        <li class="ft__logo"><a href="#"><img src="image/camplogo.svg" alt="foreach campground"></a></li>
        <li class="ft__add"><span class="ft__name">foreach camp ground</span></li>
        <li class="ft__add">〒888-8888</li>
        <li class="ft__add">福岡県福岡市東区888-88</li>
        <li class="ft__add">0493-81-6166</li>
        </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="#">アクセス</a></li>
                <li class="ft_links_li"><a href="news.php">お知らせ</a></li>
                <li class="ft_links_li"><a href="facility.php">施設紹介</a></li>
                <li class="ft_links_li"><a href="reserve.php">予約</a></li>
                <li class="ft_links_li"><a href="onlineshop.php">オンラインストア</a></li>
            </ul>
            <ul class="ft_links_ul">
                <li class="ft_links_li"><a href="contact.php">お問い合わせ</a></li>
                <li class="ft_links_li"><a href="#">事業情報</a></li>
                <li class="ft_links_li"><a href="#">採用情報</a></li>
                <li class="ft_links_li"><a href="#">個人情報保護方針</a></li>
                <li class="ft_links_li"><a href="#">ソーシャルメディアポリシー</a></li>
            </ul>
            </div>
            <div class="ft_snsLinks">
                <ul class="ft_snsLinks_ul">
                    <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                </ul>
            </div>
            <div class="ft_copyright">©2023 foreach campground</div>
        </footer>
</body>
</html>
