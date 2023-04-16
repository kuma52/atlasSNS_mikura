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


//投稿編集画面のmodal　3回目
// $(".modal-open").on('click', function () {
//   $('.modal').fadeIn();

//   //クリックされたらpostを取得して変数へ格納
//   var post = $(this).attr('post');
//   //クリックされたらpost_idを取得して変数へ格納
//   var post_id = $(this).attr('post_id');

//   //取得した投稿内容（post）をmodalの中へ渡す
//   $('.modal-post').text(post);
//   //取得した投稿のidをmodalへ渡す
//   $('.modal-id').val(post_id);

//   return false;
// });



//投稿編集画面のmodal　2回目
// $(".modal-open").on('click', function () {
//   var post = $(this).attr('post');
//   var post_id = $(this).attr('post_id');

//   // Ajaxリクエストを送信
//   $.ajax({
//     url: '/post/update', // 投稿編集画面を表示するURL
//     type: 'GET',
//     dataType: 'html',
//     success: function (post, post_id) {
//       // Ajaxリクエストが成功したら、投稿編集画面のHTMLを取得し、モーダル内に表示する
//       $('post').html(post);
//       $('post_id').html(post_id);
//       $('.modal').fadeIn();
//     },
//     error: function (errorThrown) {
//       // Ajaxリクエストが失敗したら、エラーメッセージを表示する
//       alert('Error : ' + errorThrown);
//     }
//   });

//   return false;
// });

// //投稿編集画面の背景部分をクリックしたら元の画面に戻る
// $(document).on('click', '.modal-bg', function () {
//   $('.modal').fadeOut();
//   return false;
// });

// //投稿の更新処理を非同期で行う
$(document).on('submit', '#edit-post-form', function (event) {
  event.preventDefault();

  var form = $(this);
  var url = form.attr('action');
  var formData = form.serialize();

  $.ajax({
    url: url,
    type: 'POST',
    data: formData,
    dataType: 'html',
    success: function () {
      // 投稿更新に成功した場合、トップページにリダイレクトする
      window.location.href = '/top';
    },
    error: function () {
      // 投稿更新に失敗した場合、エラーメッセージを表示する
      $('.modal').html(data);
      $('.modal').fadeIn();
    }
  });
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
