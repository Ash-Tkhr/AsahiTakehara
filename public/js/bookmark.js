$(function(){
    let bookmark = $('.bookmark-toggle'); //bookmark-toggleのついたiタグを取得し代入。
        let bookmarkArticleId; //変数を宣言（なんでここで？）
        bookmark.on('click', function () { //onはイベントハンドラー
            let $this = $(this); //this=イベントの発火した要素＝iタグを代入
            bookmarkArticleId = $this.data('article-id'); //iタグに仕込んだdata-article-idの値を取得
            //ajax処理スタート
            console.log(bookmarkArticleId);
            $.ajax({
                headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
            url: '/bookmark', //通信先アドレスで、このURLをあとでルートで設定します
            method: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
            data: { //サーバーに送信するデータ
              'article_id': bookmarkArticleId //いいねされた投稿のidを送る
            },
          })
          //通信成功した時の処理
          .done(function (data) {
            console.log(data);
            $this.toggleClass('bookmarked'); //bookmarkedクラスのON/OFF切り替え。
            $this.next('.bookmark-counter').html(data.article_bookmarks_count);
          })
          //通信失敗した時の処理
          .fail(function () {
            console.log('fail'); 
          });
        });
})