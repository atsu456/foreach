@charset "utf-8";

/*--------------------------------
初期設定
----------------------------------*/
:root {
    --main-color: #567167;
    --accent-color: #514C49;
    --black: #000000;
    --white: #FFFFFF;
    scroll-behavior: smooth;
    --header-height: 130px;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

body {
    font-family: "articulat-cf", sans-serif;
    font-weight: 200;
    font-style: normal;
    color: var(--white);
    background-color: var(--main-color);
}

body,
h1,
h3,
p,
ul,
figure {
    margin: 0;
    padding: 0;
}

ul {
    list-style-type: none;
}

img {
    display: block;
    width: 100%;
    margin: 0;
    padding: 0;
}

a {
    text-decoration: none;
    color: var(--black);
}

/* 全ページ共通 -----------------------------------------------------------*/

/*--------------------------------
コンテナ
----------------------------------*/

#container {
    max-width: 100%;
    margin: 0 auto;
}

/*--------------------------------
ヘッダー
----------------------------------*/

.header {
    display: flex;
    width: 100%;
    background-color: var(--white);
    padding: 0 100px;
    position: sticky;
    top: 0;
    z-index: 10;
    justify-content: space-between;

}

/*--------------------------------
ロゴ
----------------------------------*/

.header__logo a img{
    height: 100px;
    margin: 15px 0;
}

/*--------------------------------
グロナビ
----------------------------------*/

#g-nav {
    width: 300px;
}

.g-nav__item {
    width: calc(100% / 2);
    line-height: var(--header-height);
}

.g-nav__item a {
    display: block;
    text-align: center;
    color: var(--black);
}

.g-nav__item a:hover {
    background-color: var(--white);
    color: var(--main-color);
}

.nav {
    display: flex;
    justify-content: end;
}

/*--------------------------------
フッター
----------------------------------*/

.footer {
    height: 450px;
    paddside-by-side-center headering: 20px 80px;
    background-color: var(--white);
    font-size: 16px;
    color: var(--black);
}

.ft {
    display: flex;
    justify-content: space-between;
}

.ft_links_li {
    margin: 30px;
}

.ft_links_li:hover a {
    color: #9d9d9d;
}

.ft__logo a img{
    width: 250px;
    height: 100px;
    margin: 20px;
    text-align: center;
}

.ft__add {
    text-align: center;
    margin: 10px;
}

.ft__name {
    font-size: 30px;
}

.ft_snsLinks_ul {
    display: flex;
    justify-content: end;
    font-size: 50px;
}

.ft_snsLinks_ul li:hover a {
    color: #9d9d9d;
}

.fa-brands {
    margin: 0 20px;
}

.ft_copyright {
    text-align: center;
}

/* 全ページ共通ここまで ---------------------------------------------------*/

/* TOPページページここから ------------------------------------------------*/

/*--------------------------------
セクション
----------------------------------*/

section {
    margin-bottom: 3rem;
}

/*--------------------------------
メインビジュアル(mv)
----------------------------------*/

#top #mv {
    background-image: url(../image/hugues-de-buyer-mimeure-hGuGRayJrv0-unsplash.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: calc(100vh - var(--header-height));
    position: relative;
    margin-bottom: 150px;
}

.mv__text {
    text-align: right;
    position: absolute;
    top: 20%;
    right: 5%;
    color: var(--white);
}

.mv__copy {
    font-size: 20px;
    font-weight: normal;
}

.mv__lead {
    font-size: 70px;
}

/*--------------------------------
コンテンツ(contents)
----------------------------------*/

.contents {
    width: 1166px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 183px;
}

/*--------------------------------
お知らせ(news)
----------------------------------*/

#news01 {
    display: flex;
}

#news01 .news_page_description {
    width: 424px;
    height: 336px;
    display: flex;
    flex-flow: column;
    justify-content: space-between;
}

#news01 .page_description {
    height: 336px;
    margin-top: 0;
}

.title-style {
    font-size: 40px;
}

.btn {
    width: 293px;
    line-height: 96px;
    font-size: 30px;
    text-align: center;
}

a.btn {
    color: var(--white);
    background-color: #898989;
}

a.btn:hover {
    background: #9d9d9d;
}

.news__item {
    display: flex;
    width: 742px;
    justify-content: space-between;
}

.img {
    width: 230px;
}

/*--------------------------------
facility shop access 共通
----------------------------------*/

.page_description {
    width: 424px;
    height: 576px;
    padding-top: 150px;
    display: flex;
    flex-flow: column;
    justify-content: space-between;
}

.contents_img {
    width: 740px;
}

/*——　文字の右にライン　——*/
.title-border-right {
    display: flex;
    align-items: center;
}

.title-border-right:after {
    border-top: 0.5px solid;
    content: "";
    flex-grow: 0.5;
}

.title-border-right:after {
    margin-left: 1rem;
}

/*--------------------------------
facility　access　共通
----------------------------------*/

#facility, #access {
    display: flex;
    flex-direction: row-reverse;
}

.right_flow {
    text-align: right;
}

.btn_r {
    margin: 0 0 0 auto;
}

/*——　文字の左にライン　——*/
.title-border-left {
    display: flex;
    justify-content: end;
    align-items: center;
    }
.title-border-left:before {
    border-top: 0.5px solid;
    content: "";
    flex-grow: 0.5;
    }
.title-border-left:before {
    margin-right: 1rem;
    }

/*--------------------------------
ストア(shop)
----------------------------------*/

#onlinestore {
    display: flex;
}

/* TOPページページここまで ------------------------------------------------*/

/* slider ------------------------------------------------*/
.slider {
    width: 70%;
    margin: 100px auto;
}

.slick-slide {
  margin: 0px 20px;
}

.slick-slide img {
  width: 230px;
  height: 336px;
  
}

.slick-prev:before,
.slick-next:before {
  color: black;
}

.slick-slide {
  transition: all ease-in-out .3s;
}
/* sliderここまで ------------------------------------------------*/

/*--------------------------------
shop
----------------------------------*/
#shop #mv {
    background-image: url(../image/mug.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: calc(100vh - var(--header-height));
    position: relative;
    margin-bottom: 150px;
}

.arrivals{
    text-align: center;
    margin: 64px 0;
} 
.all_products{
    text-align: center;
    margin: 64px 0;
} 

#shop .contents{
    display: flex;
    margin-block-start: 3rem;
    margin-bottom: 3rem;
}
#shop .contents:nth-child(odd) {
    flex-direction: row-reverse;
}
#shop .contents img {
  width: 740px;
  height: 470px;
  object-fit: cover;
}

#all .contents{
  padding-top: 2rem;
} 

/*--------------------------------
news
----------------------------------*/
#news #mv {
    background-image: url(../image/news.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: calc(100vh - var(--header-height));
    position: relative;
    margin-bottom: 150px;
}
#news .news__item {
    display: flex;
    width: 1166px;
    justify-content: space-between;
}
.recently{
    text-align: center;
    margin: 64px 0;
}
#textnews{
    text-align: center;
    background: var(--main-color);
    width: auto;
    height: auto;
}
/*--------------------------------
reserve
----------------------------------*/
#reserve #mv {
    background-image: url(../image/log-home.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: calc(100vh - var(--header-height));
    position: relative;
    margin-bottom: 150px;
}

#reserve h1 {
    text-align: center;
}

#reserve .section_reserve {
    display: flex;
    gap: 20px;
}

#reserve .section_left {
    width: 60%;
}

#reserve .section_right {
    width: 40%;
}

#reserve .campsite_article {
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 20px;
    padding: 10px;
}

#reserve .campsite_article h2 {
    margin-top: 0;
}

#reserve .campsite_article p {
    margin: 0;
    font-size: 18px;
}

#reserve .campsite_article .campsite_top p {
    font-size: 22px;
}

#reserve .campsite_article .site_img {
    width: 100%;
    object-fit: cover;
}

#reserve .text {
    margin: 20px 0;
}

#reserve .button_reserve a {
    /* 購入ボタン */
    background: #eee;
    border-radius: 3px;
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 0 auto;
    max-width: 280px;
    padding: 10px 25px;
    color: #313131;
    transition: 0.3s ease-in-out;
    font-weight: 500;
    border: solid 1px #313131;
}

#reserve .button_reserve a:after {
    content: "";
    position: absolute;
    top: 50%;
    bottom: 0;
    right: 2rem;
    font-size: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: right 0.3s;
    width: 6px;
    height: 6px;
    border-top: solid 2px currentColor;
    border-right: solid 2px currentColor;
    transform: translateY(-50%) rotate(45deg);
}

#reserve .button_reserve a:hover {
    background: #009456;
    color: #FFF;
}

#reserve .button_reserve a:hover:after {
    right: 1.4rem;
}


#reserve_form h1 {
    color: #333333;
}

#reserve_form form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#reserve_form label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="email"],
#reserve_form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

#reserve_form input[type="submit"] {
    background-color: #4caf50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

#reserve_form input[type="submit"]:hover {
    background-color: #45a049;
}

/* カレンダー */
.calendar-section {
    color: var(--black);
    text-align: center;
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    max-width: 500px;
    margin: 20px auto;
}

.calendar-section .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.calendar-section .header h1 {
    margin: 0;
    font-size: 1.2em;
}

.calendar-section .prev-btn,
.calendar-section .next-btn {
    background-color: transparent;
    border: none;
    font-size: 1.2em;
    cursor: pointer;
}

.calendar-section .calendar {
    width: 100%;
    border-collapse: collapse;
}

.calendar th {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
}

.calendar td {
    padding: 10px;
    background-color: #f2f2f2;
}

.calendar .day:hover {
    background-color: #ddd;
}
.calendar table{
    width: 100%;
}


/* reserve_form */
#reserve_form h1{
    text-align: center;
}
#reserve_form form {
    display: flex;
    flex-direction: column;
    margin: 20px auto;
    color: black; /* 文字の色を黒に設定 */
    width: 80%; /* フォームの幅を縮小する */
    max-width: 800px; /* フォームの最大横幅を800pxに制限する */
}

#reserve_form label {
    margin: 10px 0 5px;
}

#reserve_form input, select, textarea, button {
    padding: 5px;
    width: 100%; /* 入力フィールドをフォームの幅に合わせる */
}
/*--------------------------------
facility
----------------------------------*/

#facility #mv {
    background-image: url(../image/tent1.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: calc(100vh - var(--header-height));
    position: relative;
    margin-bottom: 150px;
}
/*--------------------------------
news
----------------------------------*/
#news #mv {
    background-image: url(../image/news.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: calc(100vh - var(--header-height));
    position: relative;
    margin-bottom: 150px;
}
#news .news__item {
    display: flex;
    width: 1166px;
    justify-content: space-between;
}
.recently{
    text-align: center;
    margin: 64px 0;
}
#textnews{
    text-align: center;
    background: var(--main-color);
    width: auto;
    height: auto;
}
#news .contents{
    margin-bottom: 100px;
}
/*--------------------------------
news detail
----------------------------------*/
.news_detail p{
    margin: 0 auto;
    margin-bottom: 2rem;
}


/*--------------------------------
cart
----------------------------------*/
.item__image img{
    width: 300px;
    height: 200px;
    object-fit: cover;
  }
  *,
  *::before,
  *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  :where([hidden]:not([hidden=until-found])) {
    display: none !important;
  }
  
  /* :where(html) {
      -webkit-text-size-adjust: none;
      color-scheme: dark light
  } */
  @supports not (min-block-size: 100dvb) {
    :where(html) {
      block-size: 100%;
    }
  }
  @media (prefers-reduced-motion: no-preference) {
    :where(html:focus-within) {
      scroll-behavior: smooth;
    }
  }
  :where(body) {
    block-size: 100%;
    block-size: 100dvb;
    line-height: 1.5;
    font-family: system-ui, sans-serif;
    -webkit-font-smoothing: antialiased;
  }
  
  :where(input, button, textarea, select) {
    font: inherit;
    color: inherit;
  }
  
  :where(textarea) {
    resize: vertical;
    resize: block;
  }
  
  :where(button, label, select, summary, [role=button], [role=option]) {
    cursor: pointer;
  }
  
  :where(:disabled) {
    cursor: not-allowed;
  }
  
  :where(label:has(> input:disabled), label:has(+ input:disabled)) {
    cursor: not-allowed;
  }
  
  :where(button) {
    border-style: solid;
  }
  
  :where(a) {
    text-underline-offset: 0.2ex;
  }
  
  :where(ul, ol) {
    list-style: none;
  }
  
  :where(img, svg, video, canvas, audio, iframe, embed, object) {
    display: block;
  }
  
  :where(img, picture, svg) {
    max-inline-size: 100%;
    block-size: auto;
  }
  
  :where(p, h1, h2, h3, h4, h5, h6) {
    overflow-wrap: break-word;
  }
  
  :where(h1, h2, h3) {
    line-height: calc(1em + 0.5rem);
  }
  
  :where(hr) {
    border: none;
    -webkit-border-before: 1px solid;
            border-block-start: 1px solid;
    color: inherit;
    block-size: 0;
    overflow: visible;
  }
  
  :where(:focus-visible) {
    outline: 2px solid var(--focus-color, Highlight);
    outline-offset: 2px;
  }
  
  :where(.visually-hidden:not(:focus, :active, :focus-within, .not-visually-hidden)) {
    -webkit-clip-path: inset(50%) !important;
            clip-path: inset(50%) !important;
    height: 1px !important;
    width: 1px !important;
    overflow: hidden !important;
    position: absolute !important;
    white-space: nowrap !important;
    border: 0 !important;
  }
  
  :root {
    /* color */
    --white: #ffffff;
    --grey-10: #eeeeee;
    --grey-25: #aaaaaa;
    --grey-50: #707070;
    --grey-75: #444444;
    --black: #222222;
    --main-color: #567167;
    --base-color: #F7F7ED;
    --accent-color-r: #db5139;
    --accent-color-g: #59CC0D; 
    /* typography */
    --body: clamp(1rem, 0.95rem + 0.2vw, 1.125rem);
    --display: clamp(4.5rem, 1.83rem + 11.34vw, 10rem);
    --heading1: clamp(2rem, 1.3rem + 3vw, 4rem);
    --heading2: calc(var(--body) * 1.5);
    --heading3: calc(var(--body) * 1.2);
    --small-heading2: clamp(0.875rem, 4vw - 1rem, 1.6875rem);
    --small-heading3: calc(var(--small-heading2) * 0.86);
    /* space */
    --space-xs: clamp(1.25rem, 1rem + 0.98vw, 1.875rem);
    --space-sm: calc(var(--space-xs) * 1.5);
    --space-md: calc(var(--space-xs) * 2);
    --space-lg: calc(var(--space-xs) * 3);
    --space-xl: calc(var(--space-xs) * 4);
    --space-jump: clamp(1.25rem, 0.35rem + 3.8vw, 3.75rem);
  }
  
  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
    /* font-size: var(--body); */
    flex-direction: column;
    color: #000000;
  }
  
  /* body > * + * {
    -webkit-margin-before: var(--space-md);
            margin-block-start: var(--space-md);
  } */
  
  main {
    flex: 1;
  }
  
  .container {
    width: clamp(350px, 92vw, 1200px);
    margin-inline: auto;
  }
  .container > * + * {
    -webkit-margin-before: var(--space-xs);
            margin-block-start: var(--space-xs);
  }
  
  .container-narrow {
    width: clamp(350px, 60vw, 720px);
    margin-inline: auto;
    margin-top: 2rem;
  }
  
  .grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 2fr));
    gap: var(--space-md);
  }
  
  .space-between {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .side-by-side {
    display: flex;
    flex-direction: column;
  }
  
  @media (min-width: 768px) {
    .side-by-side {
      flex-direction: row;
      justify-content: space-between;
    }
  }
  .side-by-side-center {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  
  @media (min-width: 768px) {
    .side-by-side-center {
      text-align: left;
    }
  }
  .centering {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    gap: var(--space-xs);
  }
  .cart-thanks-msg{
    font-size: 3rem;
    padding-bottom: 2rem;
  }
  
  .item {
    display: flex;
    flex-direction: column;
  }
  .item > * + * {
    -webkit-margin-before: var(--space-xs);
            margin-block-start: var(--space-xs);
  }
  .item label {
    -webkit-margin-end: var(--space-xs);
            margin-inline-end: var(--space-xs);
  }
  .item input[type=number] {
    width: 2.5rem;
  }
  
  .item__img {
    -o-object-fit: cover;
       object-fit: cover;
    width: 100%;
  }
  .item__img > figure img {
    width: 100%;
    aspect-ratio: 3/2;
  }
  
  .item__name {
    font-weight: bold;
    font-size: var(--heading2);
  }
  
  .item__price {
    font-size: var(--heading3);
    color: var(--base-color);
  }
  
  .item-detail {
    margin-inline: auto;
  }
  .item-detail > * + * {
    -webkit-margin-before: var(--space-xs);
            margin-block-start: var(--space-xs);
  }
  @media screen and (min-width: 768px) {
    .item-detail > * + * {
      -webkit-margin-before: 0;
              margin-block-start: 0;
    }
  }
  .item-detail form {
    display: contents;
  }
  
  .item-detail__img {
    flex-basis: 55%;
  }
  
  .item-detail__info {
    flex-basis: 42%;
    padding-inline: 0.5rem;
  }
  .item-detail__info > * + * {
    -webkit-margin-before: var(--space-xs);
            margin-block-start: var(--space-xs);
  }
  
  .item-detail__name {
    font-size: var(--heading2);
  }
  
  .item-detail__price {
    font-size: var(--heading2);
    font-weight: bold;
    color: var(--base-color);
  }
  
  .item-detail__quantity input {
    -webkit-margin-start: 1rem;
            margin-inline-start: 1rem;
    width: 3em;
  }
  
  .item-detail__btn {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: center;
  }
  @media screen and (min-width: 768px) {
    .item-detail__btn {
      flex-direction: row;
    }
    .item-detail__btn > .btn-item:nth-of-type(1) {
      order: 2;
    }
  }
  
  .cart__item-list {
    display: flex;
    flex-direction: column;
    gap: var(--space-xs);
    margin-top: 2rem;
  }
  .cart__item-list hr {
    color: var(--grey-25);
  }
  
  .cart__item {
    display: flex;
    justify-content: space-around;
    align-items: center;
    /* text-align: center; */
    flex-direction: column;
    gap: var(--space-xs);
  }
  @media screen and (min-width: 768px) {
    .cart__item {
      flex-direction: row;
    }
  }
  
  .cart__item > * {
    flex: 1;
  }
  
  .cart-total {
    background-color: var(--grey-10);
    width: clamp(300px, 40vw, 400px);
    margin-inline: auto;
    margin-block: var(--space-md);
    padding: 0.5rem 1rem;
  }
  .cart-total th,
  .cart-total td {
    padding-block: 1rem;
  }
  .cart-total tr {
    border-collapse: collapse;
  }
  .cart-total th {
    text-align: left;
  }
  .cart-total td {
    text-align: right;
  }
  
  form > * + * {
    -webkit-margin-before: var(--space-xs);
            margin-block-start: var(--space-xs);
  }
  
  .form-item {
    display: flex;
    gap: 0.5rem;
    flex-direction: column;
  }
  @media screen and (min-width: 768px) {
    .form-item {
      flex-direction: row;
      gap: 2rem;
    }
  }
  
  .form-item > *:nth-child(1) {
    flex-basis: 30%;
  }
  
  .form-item > *:not(:nth-child(1)) {
    flex: 1;
  }
  
  .btn-item {
    background-color: #898989;
    border: none;
    color: var(--white);
    padding-block: 0.5rem;
    display: block;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    min-width: 10em;
  }
  
  .btn-item-secondary {
    background-color: var(--grey-25);
  }
  
  .btn-cart {
    position: fixed;
    bottom: 15px;
    right: 15px;
    width: clamp(4.375rem, 3.86rem + 2.353vw, 5.625rem);
    height: clamp(4.375rem, 3.86rem + 2.353vw, 5.625rem);
    border-radius: 10px;
    background-color: #514C49;
    box-shadow: rgba(0, 0, 0, 0.24) 0 3px 8px;
  }
  
  .btn-cart a {
    display: block;
    width: 100%;
    height: 100%;
    text-decoration: none;
  }
  
  .btn-cart__inner {
    width: 100%;
    height: 100%;
    position: relative;
    display: grid;
    place-content: center;
  }
  
  .btn-cart__quantity {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: var(--accent-color-r);
    color: var(--white);
    width: clamp(1.25rem, 1.121rem + 0.588vw, 1.563rem);
    height: clamp(1.25rem, 1.121rem + 0.588vw, 1.563rem);
    display: grid;
    place-content: center;
    border-radius: 50%;
  }
  
  .icon-cart {
    font-size: clamp(3.438rem, 3.051rem + 1.765vw, 4.375rem);
    color: var(--white);
  }
  
  /* .btn {
    margin-block: 1rem;
    text-decoration: none;
    padding: 0.5rem;
    border: 2px outset var(--grey-25);
    cursor: pointer;
  }
  .btn:active {
    border-style: inset;
  } */
  
  .btn-primary {
    background-color: #eb8a1c;
    color: var(--white);
  }
  
  .btn-secondary {
    background-color: var(--grey-50);
    color: var(--white);
  }
  
  .btn-menu {
    background-color: var(--accent-color-g);
    color: var(--white);
  }
  
  #shop .btn-del-cart {
    background-color: var(--black);
    color: var(--white);
    width: 100px;
    height: 50px;
    line-height: 10px;

  }
  
  
  .admin-btn-list {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    margin-block: var(--space-xs);
  }
  
  .admin-table {
    margin-inline: auto;
    width: 80%;
    border-collapse: separate;
  }
  .admin-table th,
  .admin-table td {
    background-color: var(--white);
    padding-block: 0.5rem;
    padding-inline: 1rem;
  }
  .admin-table th {
    white-space: nowrap;
  }
  .admin-table textarea {
    width: 100%;
    height: 150px;
    resize: none;
  }
  
  .admin-table-wide {
    width: 100%;
  }
  
  .admin-info > *:nth-child(2n) {
    -webkit-margin-after: var(--space-xs);
            margin-block-end: var(--space-xs);
  }
  .admin-info dt {
    font-size: var(--heading3);
    font-weight: bold;
  }
  .admin-info dd {
    font-size: var(--heading2);
  }
  
  .ta_c {
    text-align: center;
  }
  
  .disabled > td {
    background-color: var(--grey-25);
  }/*# sourceMappingURL=style.css.map */
  