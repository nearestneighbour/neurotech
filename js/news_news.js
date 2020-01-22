const section = "<!-- Section --><section class='wrapper style_st_ news'><div class='inner'><div class='flex flex-2'>_ct_</div></div></section>";
const content = ["<div class='col col1 first'><div class='image round fit'><img src='newsitems/_dir_/picture.jpg'/></div></div><div class='col col2'><h3>_tt_</h3><p>_md_</p></div>",
"<div class='col col2 first'><h3>_tt_</h3><p>_md_</p></div><div class='col col1'><div class='image round fit'><img src='newsitems/_dir_/picture.jpg'/></div></div>"]

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
  var item, htmlContent;
  for (var i=0; i<items.length; i++) {
    item = items[items.length - 1 - i];
    htmlContent = section.replace(/_st_/g, (i % 2) + 1);
    htmlContent = htmlContent.replace(/_ct_/g, content[i % 2]);
    htmlContent = htmlContent.replace(/_dir_/g, item.dir);
    htmlContent = htmlContent.replace(/_tt_/g, item.title);
    htmlContent = htmlContent.replace(/_md_/g, item.content);
    $("div#main").append(htmlContent);
  }
}
