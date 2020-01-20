const x0 = [.5,.75,.875,.75,.5,.25,.125,.25], y0 = [.125,.25,.5,.75,.875,.75,.5,.25];
const date = ' AND "2015/01/1"[Date - Publication]: "3000"[Date - Publication]';
var nwdata = [], cvs, ctx, logos, names, x, y;

$(document).ready(function() {
  cvs = document.getElementById("nwfig_canvas");
  ctx = cvs.getContext("2d");
  logos = [$("#radb_node"),$("#umh_node"),$("#karo_node"),$("#bonn_node"),
           $("#boga_node"),$("#oxfo_node"),$("#cluj_node"),$("#debr_node")];
  names = ["Radboud","UMH","Karolinska","Bonn","Bogazici","Oxford","Cluj-Napoca","Debrecen"];
  resizeCanvas();
  // Load data
  $.ajax({
      type: "GET",
      url: "data/publications.csv?" + (new Date()).getTime(), // make sure URL is unique to prevent caching
      dataType: "text",
      success: function(data) {processData(data); updateNetwork();}
   });
  // Logo click events
  $(".nwfig img").click(function() {
    if (!$(this).hasClass("hidden")) {
      $(this).toggleClass("selected");
      updateNetwork();
    }
  });
});

function updateNetwork() {
  // Count joint projects, show/hide logos
  var np = 0, collab = new Array(nwdata[0].length).fill(true), term = '';
  for (var i=0; i<8; i++) {
    if (logos[i].hasClass("selected")) {
      np += 1;
      collab = collab.map((v,ix) => v && nwdata[i][ix]);
      term += (term == '' ? '"' : ' AND "') + names[i] + '"[Affiliation]';
    }
  }
  for (var i=0; i<8; i++) {
    if (collab.some((v,ix) => v && nwdata[i][ix])) {
      logos[i].removeClass("hidden");
    } else {logos[i].addClass("hidden");}
  }
  var nc = collab.filter((v) => v > 0).length
  // Draw lines
  drawNetwork();
  // Update statistics
  writeStats(nc, np);
  // Update link
  if (np == 0) {
    names.forEach(function(v, ix) {
      term += (term == "" ? "\"" : " OR \"") + names[ix] + "\"[Affiliation]";
    });
  }
  $("#nwfig_link").attr("href","https://www.ncbi.nlm.nih.gov/pubmed/?term=" + term + date);
}

function drawNetwork() {
  ctx.clearRect(0,0,cvs.width,cvs.height);
  for (var i=0; i<8; i++) {
    for (var j=0; j<i; j++) {
      //if (shown[i] && shown[j]) {
      if (!(logos[i].hasClass("hidden") || logos[j].hasClass("hidden"))) {
        ctx.beginPath();
        ctx.moveTo(x[i],y[i]);
        ctx.lineTo(x[j],y[j]);
        ctx.stroke();
      }
    }
  }
}

function writeStats(nc, np) {
  var st = nc.toString();
  switch (np) {
    case 0: st += " publications by total network"; break;
    case 1:
      if (nc == 1) {st += " publication by partner";}
      else {st += " publications by partner";}
      break;
    default:
      if (nc == 1) {st += " joint publication by " + np.toString() + " partners"}
      else {st += " joint publications by " + np.toString() + " partners";}
      break;
  }
  $("#nwfig_stat").text(st);
}

$(window).on('resize', function() {
  resizeCanvas();
});

function resizeCanvas() {
  cvs.width = cvs.offsetWidth;
  cvs.height = cvs.offsetHeight;
  x = x0.map((v) => v*cvs.width);
  y = y0.map((v) => v*cvs.height);
  drawNetwork();
}

function processData(allText) {
  allTextLines = allText.split(/\r\n|\n/);
  for (var i=0; i<allTextLines.length; i++) {
    var line = allTextLines[i].split(",").map((el) => el == "1");
    nwdata.push(line);
  }
  nwdata = nwdata[0].map((col, i) => nwdata.map(row => row[i])); // transpose
}
