const x0 = [.5,.75,.875,.75,.5,.25,.125,.25], y0 = [.125,.25,.5,.75,.875,.75,.5,.25];
const pubdate = ' AND "2015/01/1"[Date - Publication]: "3000"[Date - Publication]';
const names = ["Radboud","UMH","Karolinska","Bonn","Bogazici","Oxford","Cluj-Napoca","Debrecen"];
var pubdata = [], eufdata = [], pubcvs, eufcvs, pubctx, eufctx, publogos, euflogos, x, y;

$(document).ready(function() {
  pubcvs = document.getElementById("pubfig_canvas");
  pubctx = pubcvs.getContext("2d");
  publogos = [$(".pubfig#ru_node"),$(".pubfig#umh_node"),$(".pubfig#ki_node"),$(".pubfig#ubo_node"),
           $(".pubfig#boun_node"),$(".pubfig#oxf_node"),$(".pubfig#umf_node"),$(".pubfig#ud_node")];
  eufcvs = document.getElementById("euffig_canvas");
  eufctx = eufcvs.getContext("2d");
  euflogos = [$(".euffig#ru_node"),$(".euffig#umh_node"),$(".euffig#ki_node"),$(".euffig#ubo_node"),
              $(".euffig#boun_node"),$(".euffig#oxf_node"),$(".euffig#umf_node"),$(".euffig#ud_node")];
  resizeCanvas();
  // Load data
  $.ajax({
    type: "GET",
    url: "assets/data/publications.csv?" + (new Date()).getTime(), // make sure URL is unique to prevent caching
    dataType: "text",
    success: function(data) {pubdata = processData(data, "pub"); updateNetwork_pub();}
  });
  $.ajax({
    type: "GET",
    url: "assets/data/funding.csv?" + (new Date()).getTime(), // make sure URL is unique to prevent caching
    dataType: "text",
    success: function(data) {eufdata = processData(data, "euf"); updateNetwork_euf();}
  });
  // Logo click events
  $(".nwfig img.pubfig").click(function() {
    if (!$(this).hasClass("hidden")) {
      $(this).toggleClass("selected");
      updateNetwork_pub();
    }
  });
  $(".nwfig img.euffig").click(function() {
    if (!$(this).hasClass("hidden")) {
      $(this).toggleClass("selected");
      updateNetwork_euf();
    }
  });
});

function updateNetwork_pub(cat) {
  var np = 0, term = '', collab = new Array(pubdata[0].length).fill(true);
  // Count joint projects, show/hide logos
  for (var i=0; i<8; i++) {
    if (publogos[i].hasClass("selected")) {
      np += 1;
      collab = collab.map((v,ix) => v && pubdata[i][ix]);
      term += (term == '' ? '"' : ' AND "') + names[i] + '"[Affiliation]';
    }
  }
  for (var i=0; i<8; i++) {
    if (collab.some((v,ix) => v && pubdata[i][ix])) {
      publogos[i].removeClass("hidden");
    } else {publogos[i].addClass("hidden");}
  }
  var nc = collab.filter((v) => v).length;
  // Draw lines
  drawNetwork("pub");
  // Update statistics and link
  writeStats_pub(nc, np);
  if (np == 0) {
    names.forEach(function(v, ix) {
      term += (term == "" ? "\"" : " OR \"") + names[ix] + "\"[Affiliation]";
    });
  }
  $("#pubfig_link").attr("href","https://www.ncbi.nlm.nih.gov/pubmed/?term=" + term + pubdate);
}

function updateNetwork_euf(cat) {
  var np = 0, collab = new Array(eufdata[0].length).fill(0);
  var filt = new Array(eufdata[0].length).fill(true);
  // Count joint projects, show/hide logos
  for (var i=0; i<8; i++) {
    if (euflogos[i].hasClass("selected")) {
      np += 1;
      filt = filt.map((v,ix) => v && eufdata[i][ix]>0);
      collab = collab.map((v,ix) => v + eufdata[i][ix]);
    }
  }
  if (np == 0) {
    for (var i=0; i<8; i++) {
      collab = collab.map((v,ix) => v + eufdata[i][ix]);
      euflogos[i].removeClass("hidden");
    }
  }
  else {
    collab = collab.map((v,ix) => v*filt[ix]);
    for (var i=0; i<8; i++) {
      if (collab.some((v,ix) => v>0 && eufdata[i][ix]>0)) {
        euflogos[i].removeClass("hidden");
      } else {euflogos[i].addClass("hidden");}
    }
  }
  var nc = collab.filter((v) => v > 0).length;
  var nf = collab.reduce((a, b) => a + b, 0);
  // Draw lines
  drawNetwork("euf");
  // Update statistics
  writeStats_euf(nc, nf, np);
}

function drawNetwork(cat) {
  var cvs = (cat == "pub" ? pubcvs : eufcvs);
  var ctx = (cat == "pub" ? pubctx : eufctx);
  var logos = (cat == "pub"? publogos : euflogos);
  ctx.clearRect(0,0,cvs.width,cvs.height);
  for (var i=0; i<8; i++) {
    for (var j=0; j<i; j++) {
      if (!(logos[i].hasClass("hidden") || logos[j].hasClass("hidden"))) {
        ctx.beginPath();
        ctx.moveTo(x[i],y[i]);
        ctx.lineTo(x[j],y[j]);
        ctx.stroke();
      }
    }
  }
}

function writeStats_pub(nc, np) {
  var st = nc.toString();
  switch (np) {
    case 0: st += " publications by partner universities"; break;
    case 1:
      if (nc == 1) {st += " publication by partner university";}
      else {st += " publications by partner university";}
      break;
    default:
      if (nc == 1) {st += " joint publication by " + np.toString() + " partner universities";}
      else {st += " joint publications by " + np.toString() + " partner universities";}
      break;
  }
  $("#pubfig_text").text(st);
}

function writeStats_euf(nc, nf, np) {
  var st = nc.toString();
  nf = num2curr(nf);
  switch (np) {
    case 0: st += " EU-funded projects by partner universities, raising €" + nf; break;
    case 1:
      if (nc == 1) {st += " EU-funded project by partner university, raising €" + nf;}
      else {st += " EU-funded projects by partner university, raising €" + nf;}
      break;
    default:
      if (nc == 1) {st += " EU-funded collaboration by " + np.toString() + " partner universities, raising €" + nf;}
      else {st += " EU-funded collaborations by " + np.toString() + " partner universities, raising €" + nf;}
      break;
  }
  $("#euffig_text").text(st);
}

$(window).on('resize', function() {
  resizeCanvas();
});

function resizeCanvas() {
  pubcvs.width = pubcvs.offsetWidth;
  pubcvs.height = pubcvs.offsetHeight;
  eufcvs.width = eufcvs.offsetWidth;
  eufcvs.height = eufcvs.offsetHeight;
  x = x0.map((v) => v*pubcvs.width); // euf figure coords should be the same
  y = y0.map((v) => v*pubcvs.height);
  drawNetwork("pub");
  drawNetwork("euf");
}

function processData(allText, cat) {
  var nwdata = [], line;
  allTextLines = allText.split(/\r\n|\n/);
  for (var i=0; i<allTextLines.length; i++) {
    if (cat == "pub") {
      line = allTextLines[i].split(",").map((el) => el == "1");
    } else {
      line = allTextLines[i].split(",").map((el) => parseInt(el));
    }
    nwdata.push(line);
  }
  nwdata = nwdata[0].map((col, i) => nwdata.map(row => row[i])); // transpose
  return nwdata;
}

function num2curr(num) {
  if (num < 1000) {return num.toString();}
  num = num.toString();
  var num1 = '', nx = num.length % 3;
  if (nx == 0) {nx = 3;}
  for (var i=0; i<num.length; i++) {
    num1 += num[i];
    nx -= 1;
    if (nx == 0 && i != num.length-1) {
      num1 += ',';
      nx = 3;
    }
  }
  return num1;
}
