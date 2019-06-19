function search() {
  let query = document.getElementById("search_box").value;
  console.log("starting a search for:", query);
  isJapaneseBool = isJapanese(query);
  console.log("query is Japanese?", isJapaneseBool);
  let results = checkJSON(isJapaneseBool, fake_dictionary, query);
  console.log("found ", results.length, " results");
  let html = createHTML(results);
  console.log("html:", html);
  document.getElementById("results").innerHTML = html;
}

function createHTML(results) {
  let html = '<table><tbody>';
  for (var i = 0; i < results.length; i++) {
    let keb = "";
    let reb = "";
    let gloss = '';


    if (results[i]["k_ele"] != null) {
      let keb_list = results[i]["k_ele"][0]["keb"];
      if (keb_list != null) {
        for(j = 0; j < keb_list.length; j++) {
          keb += keb_list[j] + '; ';
        }
      }
    }


    let reb_list = results[i]["r_ele"][0]["reb"];
    if (reb_list != null) {
      for(var k = 0; k < reb_list.length; k++) {
        reb += reb_list[k] + '; ';
      }
    }


    let gloss_list = results[i]["sense"][0]["gloss"];
    if (gloss_list != null) {
      for(var m = 0; m < gloss_list.length; m++) {
        gloss += gloss_list[m]  + '; ';
      }
    }


    // console.log('LOTS', keb_list.length, keb_list, reb_list.length, reb_list, gloss_list.length, gloss_list);
    // console.log('LESS', keb, reb, gloss);




    html += '<tr class="one_word"><td class="keb"><span>'
    html += keb;
    html += '</span></td><td class="reb"><span>';
    html += reb;
    html += '</span></td><td class="gloss"><span>';
    html += gloss;
    html += '</span></td><td class=""><i class="fa fa-plus-circle plus_sign" href=""></i></td></tr>';
  }
  html += '</tbody></table>';
  // console.log(html);
  return html;
}

function checkJSON(isJapaneseBool, fake_dictionary, query) {
  // console.log(fake_dictionary);
  // console.log('checkJSON');
  var results = [];
  if (isJapaneseBool) {
    // console.log('is japanese', query);
    for (var word = 0; word < fake_dictionary.length; word++) {
      // check kanji
      let keb_list = results[i]["k_ele"][0]["keb"];
      for(j = 0; j < keb_list; j++) {
        if (keb_list[j].includes(query)) {
          results.push(keb_list[j]);
        }
      }
      //check reading (hiragana or katakana)
      let reb_list = results[i]["r_ele"][0]["reb"];
      for(var k = 0; k < reb_list; k++) {
        results.push(reb_list[k]);
      }
      // https://stackoverflow.com/questions/1789945/how-to-check-whether-a-string-contains-a-substring-in-javascript
    }
  } else {
    for (var word = 0; word < fake_dictionary.length; word++) {
      gloss = fake_dictionary[word]['sense'][0]['gloss'];
      // console.log(gloss);
      for (var definition = 0; definition < gloss.length; definition++) {
        if (gloss[definition].includes(query)) {
          results.push(fake_dictionary[word]);
        }
      }
    }
  }
  console.log("RESULTS", results, "QUERY", query);
  return results;
}

function isJapanese(query) {
  var regex = /[\u3000-\u303F]|[\u3040-\u309F]|[\u30A0-\u30FF]|[\uFF00-\uFFEF]|[\u4E00-\u9FAF]|[\u2605-\u2606]|[\u2190-\u2195]|\u203B/g;
  if (regex.test(query)) {
    return true;
  } else {
    return false;
  }
}
