<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>4eachblog 掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        mb_internal_encoding("utf8");
        
        require "DB.php";
        $dbconnect = new DB();
        $pdo = $dbconnect->connect();

        $stmt = $pdo->prepare($dbconnect->select());
        $stmt->execute();

    ?>    

    <header>
         <img class="header_img" src="4eachblog_logo.jpg">
        <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachblogについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </header>

    <h1 class="h1_keiji">プログラミングに役立つ掲示板</h1>

   <main>

        <div class="left">
        
        <div class="form">
            <form method="post" action="insert.php">
                <h2>入力フォーム</h2>
                <div>
                    <label>ハンドルネーム</label>
                    <br>
                    <input type="text" class="text" size="35" name="handlename">
                </div>

                <div>
                    <label>タイトル</label>
                    <br>
                    <input type="text" class="text" size="35" name="title">
                </div>

                <div>
                    <label>コメント</label>
                    <br>
                    <textarea cols="70" rows="7" name="comments"></textarea>
                </div>

                <div>
                    <input type="submit" class="submit" value="投稿する">
                </div>
            </form>
        </div>

        <?php
        while($row = $stmt -> fetch()){
            echo " <div class='kiji'>";
            echo  " <h3>".$row['title']."</h3>";
            echo "<div class='contents'>";
            echo $row['comments'];
            echo "<div class='handlename'> posted by ".$row['handlename']."</div>";
            echo "</div>";
            echo "</div>";
            }
        ?>          
    </div>

        <div class="right">

        <div class="famous_article">
            <h2>人気の記事</h2>
            <p>人気のエディタTop5</p>
            <p>HTMLの基礎</p>
        </div>

        <div class="recomend_link">
            <h2>オススメリンク</h2>
            <p>株式会社インターノウス</p>
            <p>VScodeのダウンロード</p>
            <p>XAMP/MAMPのダウンロード</p>
            <p>Eclipseのダウンロード</p>
        </div> 
        
         <div class="categories">
            <h2>カテゴリ</h2>
            <p>HTML</p>
            <p>CSS</p>
            <p>JavaScript</p>
            <p>MySQL</p>
            <p>Java</p>
        </div> 
    </div>
</main>



    <footer>
        <div>
           <p>copyright &copy internous | 4each blog is the one which provides A to Z about programing. </p>
        </div>
    </footer>

    </body>
 </html>