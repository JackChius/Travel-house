/**
 * Created by qiangxl on 2017/2/18.
 */
$(function ( ) {
  $.get("GETNEWS.php",
  function (data,textStatus) {
    $("div.media-body p").html(data[10]);



  });


})