$(document).ready(function() {
  // Load data
  $.ajax({
      type: "GET",
      url: "newsitems/newsitems.json?" + (new Date()).getTime(), // make sure URL is unique to prevent caching
      dataType: "json",
      success: function(it) {processItems(it);}
   });
});

function processItems(items) {
  const ix = items.length;
  for (var i=1; i<4; i++) {
    $("#news_h4_" + i).html(items[ix-i].title);
    $("#news_img_" + i).attr("src", "newsitems/" + items[ix-i].dir + "/picture.jpg");
    $("#news_p_" + i).html(items[ix-i].short);
    //$("#news_a_" + i).attr("href", "news.html#" + items[ix-i].dir);
    $("#news_a_" + i).attr("href", "news.html");
  }
}
