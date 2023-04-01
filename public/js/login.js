//矢印の回転
$('.arrow').click(function () {
  $('.arrow').toggleClass('active');
})

//ナビゲーションメニューの表示/非表示
$(".arrow").click(function () {
  $(".nav").slideToggle();
})

//投稿編集画面の表示/非表示
// $(".iframe-open").modaal({
//   type: 'iframe',
//   width: '300',
//   height: '300',
//   overlay_close: 'true',
//   background: 'rgba(0,0,0,0.3)',
// });
// $(".iframe-open").modaal({
//   type: 'iframe',
//   width: 800,//iframe横幅
//   height: 800,//iframe高さ
//   overlay_close: true,//モーダル背景クリック時に閉じるか
//   before_open: function () {// モーダルが開く前に行う動作
//     $('html').css('overflow-y', 'hidden');/*縦スクロールバーを出さない*/
//   },
//   after_close: function () {// モーダルが閉じた後に行う動作
//     $('html').css('overflow-y', 'scroll');/*縦スクロールバーを出す*/
//   }
// });

//投稿編集画面のmodal
$(".modal-open").on('click', function () {
  $('.modal').fadeIn();

  //クリックされたらpostを取得して変数へ格納
  var post = $(this).attr('post');
  //クリックされたらpost_idを取得して変数へ格納
  var post_id = $(this).attr('post_id');

  //var id = $(this).attr('id');

  //取得した投稿内容（post）をmodalの中へ渡す
  $('.modal-post').text(post);
  //取得した投稿のidをmodalへ渡す
  $('.modal-id').val(post_id);

  //$('')

  return false;
});

//投稿編集画面の背景部分をクリックしたら元の画面に戻る
$('.modal-bg').on('click', function () {
  $('.modal').fadeOut();
  return false;
});

//ユーザー検索画面
function follow(followingId) {
  $.ajax({
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
    url: `/follows/${followingId}`,
    type: "POST",
  })
    .done((data) => {
      console.log(data);
    })
    .fail((data) => {
      console.log(data);
    });
}


//user_id は following_id
