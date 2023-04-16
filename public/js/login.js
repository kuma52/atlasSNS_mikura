//矢印の回転
$('.arrow').click(function () {
  $('.arrow').toggleClass('active');
})

//ナビゲーションメニューの表示/非表示
$(".arrow").click(function () {
  $(".nav").slideToggle();
})

//投稿編集画面のmodal
$(".modal-open").on('click', function () {
  $('.modal').fadeIn();

  //クリックされたらpostを取得して変数へ格納
  var post = $(this).attr('post');
  //クリックされたらpost_idを取得して変数へ格納
  var post_id = $(this).attr('post_id');

  //取得した投稿内容（post）をmodalの中へ渡す
  $('.modal-post').text(post);
  //取得した投稿のidをmodalへ渡す
  $('.modal-id').val(post_id);

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
